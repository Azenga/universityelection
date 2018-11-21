<?php 

/**
 * Handle candidate Infromation and Utilities
 * Also handles applications to be a candidate
 */
class Candidate
{
	private $dbh = null;
	
	function __construct()
	{
		$this->dbh = Database::init();
	}

	public function getPositions()
	{
		$query = "SELECT * FROM positions";

		$this->dbh->query($query);

		return $this->dbh->resultSet();
	}

	public function apply($data)
	{
		$query = "INSERT INTO candidates(user_id, position_id, manifesto)
		VALUES(:user_id, :position_id, :manifesto)";

		$this->dbh->query($query);

		$this->dbh->bind(":user_id", $_SESSION['user_id']);
		$this->dbh->bind(":position_id", $data['position_id']);
		$this->dbh->bind(":manifesto", $data['manifesto']);

		return $this->dbh->execute();
	}

	public function getAllCandidates()
	{
		$query = "SELECT candidates.*, users.avatar, users.first_name FROM candidates
		INNER JOIN users ON candidates.user_id = users.id";

		$this->dbh->query($query);

		return $this->dbh->resultSet();
	}
}