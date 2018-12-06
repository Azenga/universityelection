<?php include('core/init.php') ?>
<?php 

$template = new Template('castvote');
$candidate = new Candidate;

$data = array();

$positions = $candidate->getPositions();
foreach ($positions as $position) {
	$data[$position->name] = $candidate->getCandidatesByPositionId($position->id);
}

$template->data = $data;


echo $template;


