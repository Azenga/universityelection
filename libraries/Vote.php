<?php 



/**
 * Voting Class
 */
class Vote
{

	private $dbh = null;
	
	function __construct(argument)
	{
		$this->dbh = Database::init();
	}

	public function canvote()
	{
		if(isset($_SESSION['user_id'])){
			$user_id = $_SESSION['user_id'];

			$query = "SELECT canvote FROM users WHERE id = :id";

			$this->dbh->query($query);

			$this->dbh->bind(":id", $user_id);

			$result = $this->dbh->single();

			if($result->canvote == 1){
				return true;
			}

		}

		return false;
	}

	public function hasvoted()
	{
		if(isset($_SESSION['user_id'])){
			$user_id = $_SESSION['user_id'];

			$query = "SELECT hasvoted FROM users WHERE id = :id";

			$this->dbh->query($query);

			$this->dbh->bind(":id", $user_id);

			$result = $this->dbh->single();

			if($result->hasvoted == 1){
				return true;
			}

		}

		return false;
	}
}