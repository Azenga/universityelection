<?php 

/**
 * Deals with sending the post and replys to the database
 * Also Retrieving posts and Replys from the database
 *
 */
class Topic
{
	private $dbh = null;
	
	function __construct()
	{
		$this->dbh = Database::init();
	}

	public function sendPost($data)
	{
		$query = "INSERT INTO posts(user_id, group_id, title, body) 
		VALUES(:user_id, :group_id, :title, :body)";

		$this->dbh->query($query);

		$this->dbh->bind(":user_id", $_SESSION['user_id']);
		$this->dbh->bind(":group_id", $_SESSION['group_id']);
		$this->dbh->bind(":title", $data['title']);
		$this->dbh->bind(":body", $data['body']);

		if($this->dbh->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function sendReply($data)
	{
		$query = "INSERT INTO replies(user_id, post_id, body) VALUES(:user_id, :post_id, :body)";

		$this->dbh->query($query);

		$this->dbh->bind(":user_id", $_SESSION['user_id']);
		$this->dbh->bind(":post_id", $data['post_id']);
		$this->dbh->bind(":body", $data['body']);

		return $this->dbh->execute();
	}

	public function getGroups()
	{
		$query = "SELECT * FROM groups";
		$this->dbh->query($query);

		return $this->dbh->resultSet();
	}

	public function getAllPosts()
	{
		$query = 'SELECT posts.*, users.avatar, users.first_name FROM posts
		INNER JOIN users ON posts.user_id = users.id';

		$this->dbh->query($query);

		return $this->dbh->resultSet();
	}

	public function getPostById($id){
		$query = "SELECT posts.*, users.avatar, users.first_name FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = :id";

		$this->dbh->query($query);

		$this->dbh->bind(':id', $id);

		return $this->dbh->single();
	}

	public function getRepliesByPostId($post_id)
	{
		$query = "SELECT replies.*, users.avatar, users.first_name FROM replies
		INNER JOIN users ON replies.user_id = users.id WHERE replies.post_id = :post_id";

		$this->dbh->query($query);

		$this->dbh->bind(":post_id", $post_id);

		return $this->dbh->resultSet();
	}
}