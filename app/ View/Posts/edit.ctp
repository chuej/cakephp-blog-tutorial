<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h>
<?php
	echo $this->Form->create('Post', array('action' => 'edit'));
	echo $this->Form->input('title');
	echo $this->Form->checkbox('category', array('hiddenField' => false));
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden'));

	echo $this->Form->end('Save');
?>
