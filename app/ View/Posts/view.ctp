<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>
<p><small>Created: <?php echo $post['Post']['created']; ?></small>
<t><small>Modified: <?php echo $post['Post']['updated']; ?></small></p>
<p><small>Filename: <?php echo $post['Post']['filename']; ?></small></p>
<p><?php echo h($post['Post']['body']); ?></p>


