<?php

class crud
{
    // private database object
    private $db;

    //constructor to initialize private variable to the database connection
    public function __construct($conn)
    {
        $this->db = $conn;
    }

    // to do
    // public function insertUser()
    // {
    //     // verif
    //     $result = $this->getUserbyUsername($username);

    //     $sql = "INSERT INTO users (username,password) VALUES(:username,:password)";
    //     return true;
    // }



    // to excecute b4 inserting a new user
    public function userExists()
    {
        return false;
    }
    // User

    //login retourne l'id du membre
    public function login($email, $password)
    {

        try {

            $sql = "SELECT * FROM connexion WHERE email ='$email' AND password = '$password' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();

            return  $result["idutilisateur"];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //getUser prennd l'id d'un utilisateur retourne le info du l'utilisateur
    public function getUser($id)
    {

        try {

            $sql = "SELECT * FROM utilisateur WHERE iduser = '$id' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();

            return  $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Sign up
    //add user ajouter une class user
    public function creeUnCompte($user)
    {
        $last_id = $this->addUser($user);
        return    $this->addConnexion($user, $last_id);
    }
    private function addUser($user)
    {
        try {
            /*$email="test@gmail.com";
           $prenom="test";
           $nom="test1";
           $date='2022-01-04';*/

            $sql = "INSERT INTO `utilisateur` ( `nom`, `prenom`, `email`, `date_de_naissance`)  VALUES(:nom,:prenom,:email,:date)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':nom',  $user->lastName);
            $stmt->bindparam(':prenom', $user->firstName);
            $stmt->bindparam(':email', $user->email);
            $stmt->bindparam(':date', $user->date);

            $stmt->execute();
            //$result = $stmt->fetch();     

            return $this->db->lastInsertId();;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    private function addConnexion($user, $id)
    {
        try {
            $status = 1;
            $sql = "INSERT INTO `connexion` ( `idutilisateur`, `status`, `email`, `password`)  VALUES(:idutilisateur,:status,:email,:password)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':idutilisateur', $id);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':email', $user->email);
            $stmt->bindparam(':password', $user->password);

            $stmt->execute();

            return $id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
