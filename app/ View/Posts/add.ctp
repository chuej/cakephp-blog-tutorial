<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
	$options = array(1 => 'A','B','C','D','E','F');

	echo $this->Form->create('Post', array('enctype' => 'multipart/form-data'));
	echo $this->Form->input('title');

	echo $this->Form->checkbox($selected,array('mulitple'=>true, 
		'options'=>$options, 'selected'=>array_values($options)));
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->file('file');

	echo $this->Form->end('Save');
?>
