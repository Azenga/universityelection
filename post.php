<?php include('core/init.php') ?>
<?php 

if(isset($_GET['post_id'])){

	$template = new Template('post');
	$topic = new Topic;

	$post_id =  $_GET['post_id'];

	$template->post = $topic->getPostById($post_id);

	$template->replies = $topic->getRepliesByPostId($post_id);

	echo $template;
}
