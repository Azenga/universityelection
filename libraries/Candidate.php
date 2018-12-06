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
		$query = "SELECT  candidates.*, users.avatar, users.first_name, users.last_name, faculties.name AS faculty, positions.name AS position FROM candidates
		INNER JOIN users ON candidates.user_id = users.id
		INNER JOIN positions ON candidates.position_id = positions.id
		INNER JOIN faculties ON users.faculty_id = faculties.id";

		$this->dbh->query($query);

		return $this->dbh->resultSet();
	}

	public function getCandidateById($candidate_id)
	{
		$query = "SELECT candidates.*, users.avatar, users.first_name, users.last_name, faculties.acronym, positions.name FROM candidates
		INNER JOIN users ON candidates.user_id = users.id
		INNER JOIN positions ON candidates.position_id = positions.id
		INNER JOIN faculties ON users.faculty_id = faculties.id
		WHERE candidates.id = :id";

		$this->dbh->query($query);

		$this->dbh->bind(':id', $candidate_id);

		return $this->dbh->single();
	}

	public function getCandidatesByPositionId($position_id)
	{
		$query = "SELECT candidates.id, users.first_name, users.last_name FROM candidates
		INNER JOIN users ON candidates.user_id = users.id
		 WHERE position_id = :position_id AND nominated = 1";

		$this->dbh->query($query);
		$this->dbh->bind(":position_id", $position_id);

		return $this->dbh->resultSet();
	}
}