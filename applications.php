<?php include('core/init.php'); ?>

<?php 

$candidate = new Candidate;

if (isset($_POST['apply-candidature'])) {
	if(empty($_POST['position_id'])){
		redirect('applications.php', 'Select a valid position', 'error');
	}else{

		$data = array();

		$data['position_id'] = trim($_POST['position_id']);
		$data['manifesto'] = trim($_POST['manifesto']);

		if($candidate->apply($data)){
			redirect('candidates.php', 'Application successfully', 'success');
		}else{
			redirect('applications.php', 'A fatal Error Ocurred', 'error');
		}
	}
}else{
	$template = new Template('applications');
	
	$template->positions = $candidate->getPositions();

	echo $template;
}

