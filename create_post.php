<?php include('core/init.php') ?>
<?php 

if(isset($_POST['post'])){
	$data = array();
	$data['title'] = trim($_POST['title']);
	$data['body'] = trim($_POST['body']);

	if(empty($data['title']) || empty($data['body'])){
		redirect('create_post.php', 'Fill in all the fields', 'error');
	}else{
		$topic = new Topic;

		if($topic->sendPost($data)){
			redirect('posts.php', 'Post Sent', 'success');
		}else{
			redirect('create_post.php', 'A Fatal Error Ocurred', 'error');
		}

	}

}

$candidate = new Candidate;

$template = new Template('create_post');

echo $template;