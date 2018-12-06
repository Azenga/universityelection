<?php

/*
 *
 * Connection to the database and the execution of queries
 * A nd retrieving data from the database
 *
 * */

 class Database{
     private $dbhost = DB_HOST;
     private $dbuser = DB_USER;
     private $dbpass = DB_PASS;
     private $dbname = DB_NAME;

     private $conn = null;
     private $error = null;
     private $stmt = null;

     private static $_instance = null;

     public static function init()
     {
         try{
            if(is_null(self::$_instance) || empty(self::$_instance)){
                self::$_instance = new self();
            }
            return self::$_instance;
         }catch(Exception $e){
             $this->error = $e->getMessage();
         }
     }//THE INITIALIZER

     function __construct()
     {
        $dsn = 'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . ';charset=utf8';

        $options = array(
             PDO::ATTR_PERSISTENT => true,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ 
        );

        try {
            if (is_null($this->conn) || empty($this->conn)) {
                $this->conn = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
            }
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

     }//END OF THE CONSTRUCTOR

     public function query($query)
     {
         $this->stmt = $this->conn->prepare($query);
     }//END OF THE query() METHOD

     public function bind($param, $value, $type = NULL)
     {
         if (is_null($type)) {
             switch (true) {
                 case is_int($value):
                     $type = PDO::PARAM_INT;
                     break;
                 case is_bool($value):
                     $type = PDO::PARAM_BOOL;
                     break;
                 case is_null($value):
                     $type = PDO::PARAM_NULL;
                     break;

                 default:
                     $type = PDO::PARAM_STR;
                     break;
             }
         }

         $this->stmt->bindParam($param, $value, $type);

     }//END OF THE bind() METHOD
    
    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();

        return $this->stmt->fetchAll();
    }

    public function single()
    {
        $this->execute();

        return $this->stmt->fetch();
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
 }