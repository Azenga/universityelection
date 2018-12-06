<?php include('core/init.php') ?>
<?php 

if(isset($_POST['reply'])){

	$dtat = array();

	$topic = new Topic;

	$data['post_id'] = trim($_POST['post_id']);
	$data['body'] = trim($_POST['body']);

	if(empty($data['body'])){
		redirect('post.php?post_id='.$data['post_id'],'Fill in the reply body', 'error');
	}else{
		if($topic->sendReply($data)){
			redirect('post.php?post_id='.$data['post_id'],'Reply Submitted', 'success');
		}else{
			redirect('post.php?post_id='.$data['post_id'],'Reply Submission Failed', 'error');
		}
	}

	echo $template;
}
