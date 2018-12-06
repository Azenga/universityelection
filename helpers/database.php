<?php

/*h
 *General requests from the database
 * */

 function getFaculties(){

	$dbh = Database::init();

    $query = "SELECT * FROM faculties";

    $dbh->execute($query);

 }


function canvote()
{
	$dbh = Database::init();

	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];

		$query = "SELECT canvote FROM users WHERE id = :id";

		$dbh->query($query);

		$dbh->bind(":id", $user_id);

		$result = $dbh->single();

		if($result->canvote == 1){
			return true;
		}

	}

	return false;
}

function hasvoted()
{
	$dbh = Database::init();

	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];

		$query = "SELECT hasvoted FROM users WHERE id = :id";

		$dbh->query($query);

		$dbh->bind(":id", $user_id);

		$result = $dbh->single();

		if($result->hasvoted == 1){
			return true;
		}

	}

	return false;
}
