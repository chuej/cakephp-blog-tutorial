<!-- File: /app/View/Posts/index.ctp -->

<h1>Posts</h1>
<p><?php echo $this->Html->link("Add Post", array('action' => 'add')); ?></p>
<table>
	<tr>
		<th>Title</th>
		<th>Category</th>
		<th>Edit/Delete</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Filename</th>
	</tr>
	
	<?php foreach ($posts as $post): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($post['Post']['title'],
				array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
		</td>
		<td><?php echo $post['Post']['category']; ?></td>
		<td>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>

			<?php echo $this->Form->postLink('Delete', 
				array('action' => 'delete', $post['Post']['id']),
				array('confirm' => 'Deleted posts cannot be recovered. Continue?'));
			?>
		</td>
		<td><?php echo $post['Post']['created']; ?></td>
		<td><?php echo $post['Post']['updated']; ?></td>
		<td><?php echo $post['Post']['filename']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>
