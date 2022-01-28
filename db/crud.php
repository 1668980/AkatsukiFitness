<?php

class crud implements user{
    // private database object
    private $db;

    //constructor to initialize private variable to the database connection
    public function __construct($conn)
    {
        $this->db = $conn;
    }

    // to do
    public function insertUser(){
        // verif
        $result = $this->getUserbyUsername($username);

        $sql = "INSERT INTO users (username,password) VALUES(:username,:password)";
        return true;
    }

    // for login
    public function getUser(){
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        return $result;
    }

    // to excecute b4 inserting a new user
    public function userExists(){
        return false;
    }
}


?>