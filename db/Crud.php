<?php

class Crud
{
//Class  
    // private database object
    private $db;

   //constructor to initialize private variable to the database connection
    public function __construct($conn)
    {
        $this->db = $conn;
    }

// User

    //createUtilisateur
    public function createUtilisateur($user){

        $used = $this->isEmailUsed($user->email);

        if($used){
            return false;
        }

        $last_id = $this->addUtilisateur($user);

        $this->addConnexion($user, $last_id);
        $this->createContenu($last_id);         
        return  $last_id;

    }

    private function addUtilisateur($user){
        try {  
            $sql = "INSERT INTO `utilisateur` ( `nom`, `prenom`, `email`, `date_de_naissance`, `sexe`)  VALUES(:lastname,:firstname,:email,:dob,:gender)";
        
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':lastname',  $user->lastname);
            $stmt->bindparam(':firstname', $user->firstname);
            $stmt->bindparam(':email', $user->email);
            $stmt->bindparam(':dob', $user->dob);
            $stmt->bindparam(':gender', $user->gender);
        
            $stmt->execute();
            //$result = $stmt->fetch();     
        
            return $this->db->lastInsertId();;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    private function addConnexion($user, $id){
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

    //UpdateUser
    public function updateUserUtilisateurTableSansEmail($user){
        try {  
            $sql = "UPDATE `utilisateur` SET `nom` =  $user->lastName, `prenom` =  $user->firstName,`date_de_naissance` = '$user->date' WHERE `utilisateur`.`iduser` =  $user->idUser";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }    
    public function updateUserEmail($user){
        $this->updateEmailUtilisateurTable($user);
        $this->updateUserConnexionTable($user);
    }    
    private function updateEmailUtilisateurTable($user){
        try {  
            $sql = "UPDATE `utilisateur` SET `email` =  '$user->email' WHERE `utilisateur`.`iduser` =  $user->idUser";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }    
    private function updateUserConnexionTable($user){
        try {  
            $sql = "UPDATE `connexion` SET `email` =  '$user->email' WHERE `connexion`.`idUtilisateur` =  $user->idUser";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //manque update password

    //GetUser
    public function login($email, $password){

        try {

            $sql = "SELECT * FROM connexion WHERE email ='$email' AND password = '$password' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            if($result){
                return  $result["idutilisateur"];
            }else return false;
           
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUser($id){

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
    public function getAllUsers(){

        try {

            $sql = "SELECT * FROM utilisateur ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return  $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserStatus($email){
        try {

            $sql = "SELECT * FROM connexion WHERE email ='$email' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return  $result['status'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //Verification
    public function isEmailUsed($email){
        try {
            $sql = "SELECT * FROM `connexion` WHERE email = '$email' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->rowCount();
            return ($result>0); 
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    //Abonement
    public function addSubscriptionToUser($idUser,$duree){
        $dt1 = new DateTime();
        $today = $dt1->format("Y-m-d");
        $endDate =$this->calculateEndDate($duree);
        return $this->addSubscriptionToUserTable($today,$endDate,$idUser);
    }
    private function calculateEndDate($duree){
        
        $dt2 = new DateTime($duree);
       
        return  $dt2->format("Y-m-d");
    }
    private function addSubscriptionToUserTable($today,$endDate,$idUser){
        try {  
            $sql = "UPDATE `utilisateur` SET `datedebutabonnement` = '$today',`datefinabonnement` = '$endDate' WHERE `utilisateur`.`iduser` =  $idUser";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }    
    public function isUserSubscibed($idUser){
        $user =$this->getUser($idUser);

        $dateStartSub= new DateTime($user['datedebutabonnement']);
        $dateEndSub= new DateTime($user['datefinabonnement']);
               
        return $dateStartSub < $dateEndSub;
    }
    
    
   

//Contenu 

    //Create
    public function createContenu($idUser){
        try{
            $sql = " INSERT INTO `contenu` (`iduser`) VALUES ($idUser)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }

    //get
    private function getContenuId($idUser){
        try{
            $sql = "SELECT * FROM  `contenu` WHERE iduser = '$idUser' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return  $result['idcontenu'];
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
        
    }
   
//Entrainement

    //Create
    public function createNewEntrainement($nom,$idUser){
       $idEntrainement= $this->createEntrainement($nom);
       $idContenu = $this->getContenuId($idUser);
       $this->linkEntrainementContenu($idContenu,$idEntrainement);
       return true;
    }
    private function createEntrainement($nom){
        try{    
            $sql = " INSERT INTO `entrainement` (`nom`) VALUES ( '$nom')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }

    //Get
    public function getEntrainementByIdUser($idUser){
        
        $idContenu =$this->getContenuId($idUser);
        return $this->getEntrainementsByContenu($idContenu);
    }
    private function getEntrainementsByContenu($idContenu){
        try{
            $sql = "SELECT * FROM `entrainementcontenu` INNER JOIN entrainement ON `entrainementcontenu`.`identrainement`  = `entrainement`.`identrainement`  WHERE `entrainementcontenu`.`idcontenu` = '$idContenu' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
        
    }
    //Update
    //Delete
   
//Exercise 
    
    //create
    public function addExercices($listExercices,$idEntrainement){
        foreach($listExercices as $ex){
            $idExercise = $this->addExercice($ex);           
            $this->linkEntrainementExercice($idExercise,$idEntrainement);
        }
        
    }
    private function addExercice($exercice){

        try { 
            $sql = "INSERT INTO `exercice` (`idexercicecatalogue`, `poids`, `repetitions`, `sets`, `duree`, `dureepause`)  VALUES 
            (:idexercicecatalogue, :poids, :repetitions, :sets, :duree, :dureepause)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':idexercicecatalogue',  $exercice->idexercicecatalogue);
            $stmt->bindparam(':poids', $exercice->poids);
            $stmt->bindparam(':repetitions', $exercice->repetitions);
            $stmt->bindparam(':duree', $exercice->duree);
            $stmt->bindparam(':sets', $exercice->sets);
            $stmt->bindparam(':dureepause', $exercice->dureepause);

           
            $stmt->execute();
            
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $sql.$e->getMessage();
       return false;
        }
    }
    //Get
    public function getExercicesFromEntrainement($idEntrainement){
        try{
            $sql = "SELECT * FROM `entrainementexercice` INNER JOIN exercice ON entrainementexercice.idexercice = exercice.idexercice 
            INNER JOIN `exercicecatalogue` ON `exercice`.`idexercicecatalogue` =`exercicecatalogue`.`idexercicecatalogue` ";
            
          //  $sql = "SELECT * FROM `entrainementexercice` INNER JOIN exercice ON entrainementexercice.idexercice = exercice.idexercice WHERE identrainement = '$idEntrainement'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }
    //Update
    //Delete
   

   

    //GetEntrainement
    //CreeLexercie et ajouter A l'entreinement

    private function linkEntrainementExercice($idExercise,$idEntrainement){
        try {  
            $sql = "INSERT INTO `entrainementexercice` (`identrainement`, `idexercice`) VALUES 
            ($idEntrainement,$idExercise)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        return true;

        }catch (PDOException $e) {
             echo $e->getMessage();
        return false;
        }
    }
    private function linkEntrainementContenu($idContenu,$idEntrainement){
        try {  
            $sql = "INSERT INTO `entrainementcontenu` (`idcontenu`, `identrainement`) VALUES 
            ($idContenu,$idEntrainement)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        return true;

        }catch (PDOException $e) {
             echo $e->getMessage();
        return false;
        }
    }




}