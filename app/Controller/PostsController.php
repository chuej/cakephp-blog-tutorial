<?php
class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session','AuthorizeNet');
	private $uploaddir = '/var/www/uploads/';

	private $loginid = '92bWp7QP', $transkey = '42pV89bv9VG5F2wA';

	public function index() {
		$this->set('posts',$this->Post->find('all'));	
	}

	public function view($id=null) {
		$this->Post->id = $id;
		$this->set('post',$this->Post->read());
	}

	public function add() {
		if($this->request->is('post')) {
			$this->Post->create();
			$this->savePost();
		}
	}

	public function edit($id = null) {
		$this->Post->id = $id;
		if($this->request->is('get')) {
			$this->request->data = $this->Post->read();	
		}
		else {
			$this->savePost();
		}
	}
	
	public function delete($id) {
		if($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if($this->Post->delete($id)) {
			$this->Post->query('ALTER TABLE posts AUTO_INCREMENT = 1');
			$this->message('Post #' . $id . ' deleted.');
		}
	}

	public function authorize() {
		$this->AuthorizeNet->merchant($this->loginid,$this->transkey);
		$response = $this->AuthorizeNet->transaction('9.99','4007000000027', '10/16');
		if($response->approved) {
			$this->message('Test credit card has been charged.');
		} else {
			$this->message($response->error_message);
		}
	}
	// Helper functions

	private function message($text){
		$this->Session->setFlash($text);
		$this->redirect(array('action' => 'index'));
	}

	private function savePost(){
		$id = 0;
		if($this->request->data['Post']['file']['name']!=''){
			$uploadfile = basename($this->request->data['Post']['file']['name']);

			$this->request->data['Post']['filename'] = basename($uploadfile);
		}
		if($this->Post->save($this->request->data)) {
			$id = $this->Post->id;
		
			move_uploaded_file($this->request->data['Post']['file']['tmp_name'], 
				$this->uploaddir . $id);

			$this->message('Post saved!');
		}
		else {
			$this->Session->setFlash('Unable to save post!');
		}
	}
}
?>
