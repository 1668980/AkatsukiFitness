<?php

class crud{
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

    // test orlando
    public function getUser($username, $password){
        try {
            $sql = "SELECT * FROM utilisateurs WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // to excecute b4 inserting a new user
    public function userExists(){
        return false;
    }

    public function login(/*$email,$password */){
        $email = "test@gmail.com";
        $password = "test";
/*
      $sql = "SELECT * FROM connexion WHERE email = :email ";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':email', $email);
      $stmt->execute();
      $result =  $stmt->fetch();
      return $result["idutilisateur"];

      */
      $sql = "SELECT * FROM connexion WHERE email ='$email' ";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetch();     
        
      return  $result["idutilisateur"];
    }




}


?>