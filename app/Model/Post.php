<?php
class Post extends AppModel {
	var $name = 'Post';

	public $validate = array(
		'title' => array(
			'between' => array(
				'rule' => array('between',1,50),
				'message' => 'Title must have 1 to 50 characters!'),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Title can only contain alphanumeric characters!')
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Posts must contain 1 to 2000 characters!'
		)
	);
	
	public function isUploadedFile($params) {
		$val = array_shift($params);
		if( (isset($val['error']) && $val['error'] == 0) ||
			(!empty($val['tmp_name']) && $val['tmp_name'] != 'none') ){
			return is_uploaded_file($val['tmp_name']);
		}
		return false;
	}
}
?>
