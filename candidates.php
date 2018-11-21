<?php include_once('core/init.php'); ?>

<?php

$template = new Template('candidates');
$candidate = new Candidate;

$template->candidates = $candidate->getAllCandidates();
$template->positions = $candidate->getPositions();

echo $template;