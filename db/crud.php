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

   //Contenu 

    //premiere fois

    //Cree unContenu
    //Cree unEntrainement
    //Cree liste dexercise
    
    public function CreeUnContenu($nom){
        try{
            $sql = " INSERT INTO `contenu` (`nom`) VALUES ( $nom)";
            $stmt->execute();
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }
    public function CreeUnNouveauEntrainement($nom){
        try{    
            $sql = " INSERT INTO `entrainement` (`nom`) VALUES ( $nom)";
            $stmt->execute();
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }
    public function AjouterExercises($listExercises,$idEntainement){
        foreach($listExercises as $ex){
            $idExercise = $this->AjouterUnExercise($ex);
           // $this->LierEntrainementExercise($idExercise,$idEntainement);
            $this->LierEntrainementExercise($idExercise,$idEntainement);
        }
        
    }

   

    //ajouter entrainement 

    //getContenu
    //GetEntrainement
    //CreeLexercie et ajouter A l'entreinement



    /*
    public function CreeUnTemplateentrainement($nom){
        $this->CreeUnNouveauEntrainement("test");
        // MEthode pour list d'exercise
    }*/


    
    public function LierEntrainementExercise($idExercise,$idEntainement){
        try {  
            $sql = "INSERT INTO `entrainementexercice` (`identrainement`, `idexercice`) VALUES 
            ($idEntainement,$idExercise)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        return true;

        }catch (PDOException $e) {
             echo $e->getMessage();
        return false;
        }
    }
  
    public function AjouterUnExercise($exercise){

        try { 
            $sql = "INSERT INTO `exercice` (`idexercicecatalogue`, `poids`, `repetitions`, `sets`, `duree`, `dureepause`)  VALUES 
            (:idexercicecatalogue, :poids, :repetitions, :sets, :duree, :dureepause)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':idexercicecatalogue',  $exercise->idexercicecatalogue);
            $stmt->bindparam(':poids', $exercise->poids);
            $stmt->bindparam(':repetitions', $exercise->repetitions);
            $stmt->bindparam(':duree', $exercise->duree);
            $stmt->bindparam(':sets', $exercise->sets);
            $stmt->bindparam(':dureepause', $exercise->dureepause);

           
            $stmt->execute();
            
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $sql.$e->getMessage();
       return false;
        }
   }



}
