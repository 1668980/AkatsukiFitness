<?php

class crud
{
//Class  
    // private database object
    private $db;

   //constructor to initialize private variable to the database  connection
    public function __construct($conn)
    {
        $this->db = $conn;
    }

// User

    //CreateUser
    public function creeUnCompte($user){
        $doNotExist = $this->VerifierSiEmailDejaUtilise($user->email);
        if($doNotExist){
            $last_id = $this->addUser($user);
            $this->addConnexion($user, $last_id);
            $this->CreeUnContenu($last_id);         
            return  $last_id;
            
        }else{
            return false;
        }
    
    }
    private function addUser($user){
        try {  
            $sql = "INSERT INTO `utilisateur` ( `nom`, `prenom`, `email`, `date_de_naissance`, `sexe`)  VALUES(:nom,:prenom,:email,:date,:sexe)";
        
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':nom',  $user->lastName);
            $stmt->bindparam(':prenom', $user->firstName);
            $stmt->bindparam(':email', $user->email);
            $stmt->bindparam(':date', $user->date);
            $stmt->bindparam(':sexe', $user->sexe);
        
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
    public function UpdateUserUtilisateurTableSansEmail($user){
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
    public function UpdateUserEmail($user){
        $this->UpdateEmailUtilisateurTable($user);
        $this->UpdateUserConnexionTable($user);
    }    
    private function UpdateEmailUtilisateurTable($user){
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
    private function UpdateUserConnexionTable($user){
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
    public function VerifierSiEmailDejaUtilise($email){
        try {
            $sql = "SELECT * FROM `connexion` WHERE email = '$email' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->rowCount();
            if($result>0){
                return false;
            }else {
                return true;
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    //Abonement
    public function AddsubscriptionToUser($idUser,$duree){
        $dt1 = new DateTime();
        $today = $dt1->format("Y-m-d");
        $endDate =$this->CalculateEndDate($duree);
        return $this->AddsubscriptionToUserTable($today,$endDate,$idUser);
    }
    private function CalculateEndDate($duree){
        
        $dt2 = new DateTime($duree);
       
        return  $dt2->format("Y-m-d");
    }
    private function AddsubscriptionToUserTable($today,$endDate,$idUser){
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
    public function IsUserSubscibed($idUser){
        $user =$this->getUser($idUser);

        $dateStartSub= new DateTime($user['datedebutabonnement']);
        $dateEndSub= new DateTime($user['datefinabonnement']);
               
        return $dateStartSub < $dateEndSub;
    }
    
    
   

//Contenu 

    //Create
    public function CreeUnContenu($idUser){
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
    private function GetUnContenuAvecId($idUser){
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
    public function CreeUnNouveauEntrainement($nom,$idUser){
       $idEntainement= $this->CreeEntrainement($nom);
       $idContenu = $this->GetUnContenuAvecId($idUser);
       $this->LierEntrainementContenu($idContenu,$idEntainement);
       return true;
    }
    private function CreeEntrainement($nom){
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
    public function GetEntrainementByIdUser($idUser){
        
        $idContenu =$this->GetUnContenuAvecId($idUser);
        return $this->GetEntrainementsByContenu($idContenu);
    }
    private function GetEntrainementsByContenu($idContenu){
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
    public function AjouterExercices($listExercises,$idEntainement){
        foreach($listExercises as $ex){
            $idExercise = $this->AjouterUnExercice($ex);           
            $this->LierEntrainementExercice($idExercise,$idEntainement);
        }
        
    }
    private function AjouterUnExercice($exercice){

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
    public function GetExercisesFromAnEntrainement($idEntrainement){
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

    private function LierEntrainementExercice($idExercise,$idEntainement){
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
    private function LierEntrainementContenu($idContenu,$idEntainement){
        try {  
            $sql = "INSERT INTO `entrainementcontenu` (`idcontenu`, `identrainement`) VALUES 
            ($idContenu,$idEntainement)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        return true;

        }catch (PDOException $e) {
             echo $e->getMessage();
        return false;
        }
    }




}
