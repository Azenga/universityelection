<?php

/*
 *
 * Deals with 
 *  - Registering students
 *  - Logging the students
 */

 class User
 {
     private $dbh = null;

     public function __construct()
     {
         $this->dbh = Database::init();
     }

     public function getFaculties(Type $var = null)
     {
         $query = "SELECT * FROM faculties";

         $this->dbh->query($query);

         return $this->dbh->resultSet();
     }

     public function register($data)
     {
         $query = "INSERT INTO `users`(first_name, last_name, regno, faculty_id, email, avatar, pwd, token) VALUES (:first_name, :last_name, :regno, :faculty_id, :email, :avatar, :pwd, :token)";

         $this->dbh->query($query);

         $this->dbh->bind(':first_name', $data['fname']);
         $this->dbh->bind(':last_name', $data['lname']);
         $this->dbh->bind(':regno', $data['regno']);
         $this->dbh->bind(':faculty_id', $data['faculty']);
         $this->dbh->bind(':email', $data['email']);
         $this->dbh->bind(':avatar', $data['avatar']);
         $this->dbh->bind(':pwd', $data['pwd']);
         $this->dbh->bind(':token', $data['token']);

         if($this->dbh->execute()){
             return true;
         }else{
             return false;
         }

     }

     public function login($regno, $pwd)
     {
         $query = "SELECT * FROM users WHERE regno = :regno AND pwd = :pwd";
         $this->dbh->query($query);

         $this->dbh->bind(':regno', $regno);
         $this->dbh->bind(':pwd', $pwd);

         $result = $this->dbh->single();

         if($this->dbh->rowCount() == 1){
            $this->set_session_vars($result);
            return true;
         }else{
            return false;
         }
     }

     public function set_session_vars($result)
     {
         $_SESSION['logged_in'] = true;
         $_SESSION['user_id'] = $result->id;
         $_SESSION['group_id'] = $result->group_id;
         $_SESSION['user'] = $result->first_name . ' ' . $result->last_name;
     }
     
 }
 