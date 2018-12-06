<?php include('core/init.php'); ?>

<?php 

$template = new Template('thecandidate');
$candidate = new Candidate;

$template->candidate = $candidate->getCandidateById($_GET['candidate_id']);
$template->positions = $candidate->getPositions();

echo $template;