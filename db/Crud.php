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
        $idContenu= $this->createContenu($last_id);  
        $this->linkEntrainementContenu($idContenu,1);
        $this->linkEntrainementContenu($idContenu,2);
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
            $sql = "UPDATE `utilisateur` SET `nom` =  '$user->lastname' , `prenom` =  '$user->firstname',`date_de_naissance` = '$user->dob',`sexe` = '$user->gender',`poids`= '$user->weight' WHERE `utilisateur`.`iduser` =  $user->id_user";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage()."<br>".$sql;
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
        $d = "+".$duree."month";


        $dt2 = new DateTime($d);
       
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
    public function isUserSubscribed($idUser){
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
    public function createNewEntrainement($entrainement){
       $idEntrainement= $this->createEntrainement($entrainement);
       $idContenu = $this->getContenuId($entrainement->idUser);
       $this->linkEntrainementContenu($idContenu,$idEntrainement);
       return $idEntrainement;   
    }
    private function createEntrainement($entrainement){
        try{    
            $sql = " INSERT INTO `entrainement` (`nom`,`status`,`type`,`difficulte`) VALUES ( '$entrainement->name',0,'$entrainement->type','$entrainement->difficulte')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }

    //Get
    public function getEntrainementsByIdUser($idUser){
        
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
    public function getEntrainements(){
        try{
            $sql = "SELECT * FROM `entrainement`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }    
    public function getEntrainementByIdEntrainement($idEntrainement){
      //Récupérer un entrainement (Mathieu)
        try{
            $sql = "SELECT * FROM `entrainement` where `identrainement`= $idEntrainement";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }
        //get entrainement completed or incompleted
    public function getEntrainementsCompletedByIdUser($idUser){
        $idContenu =$this->getContenuId($idUser);
        return $this->getEntrainementsCompletedOrIncompletedByContenu($idContenu,1);
    }
    public function getEntrainementsIncompletedByIdUser($idUser){
        $idContenu =$this->getContenuId($idUser);
        return $this->getEntrainementsCompletedOrIncompletedByContenu($idContenu,0);
    }
    private function getEntrainementsCompletedOrIncompletedByContenu($idContenu,$wantedStatus){
        try{
            $sql = "SELECT * FROM `entrainementcontenu` INNER JOIN entrainement ON `entrainementcontenu`.`identrainement`  = `entrainement`.`identrainement`  
            WHERE `entrainementcontenu`.`idcontenu` = '$idContenu' AND `entrainement`.`status` = $wantedStatus";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
        
    }   
        //get %completed
    
    public function getPercentageOfExercicesCompletedInEntrainement($idEntrainement){
        $exercices=  $this->getExercicesFromEntrainement($idEntrainement);
        $exerciceCompleted=0;
        foreach($exercices as $ex){
            if($ex['status']==1 ){
                $exerciceCompleted++;
            }
        }
        return $exerciceCompleted/count($exercices)*100;
    }
    public function getEntrainementDuration($idEntrainement){
        $exercices=  $this->getExercicesFromEntrainement($idEntrainement);
        $exerciceLenght=0;
        foreach($exercices as $ex){
            $exerciceLenght += $ex['duree'] ;
        }
        return $exerciceLenght;
    }

    //Update
    public function updateEntrainement($entrainement){
        try {  
         
            $sql = "UPDATE `entrainement` SET `nom` =  '$entrainement->name',`type` =  '$entrainement->type', `difficulte`= '$entrainement->difficulte' WHERE `identrainement` =  $entrainement->id";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function setEntrainementStatusComplete($idEntrainement){
        try {  
            $sql = "UPDATE `entrainement` SET `status` =  1 WHERE `identrainement` =  $idEntrainement";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function setEntrainementStatusIncomplete($idEntrainement){
        try {  
            $sql = "UPDATE `entrainement` SET `status` =  0 WHERE `identrainement` =  $idEntrainement";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //Delete
        
    public function deleteEntrainementById($idEntrainement){
        $this->deleteExerciceFromEntrainement($idEntrainement);
        return   $this->deleteEntrainement($idEntrainement);
     

    }
    private function deleteEntrainement($idEntrainement){
        try {  
            $sql = "DELETE FROM `entrainement` WHERE `identrainement` =  $idEntrainement";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    private function deleteExerciceFromEntrainement($idEntrainement){
      
        $exercices = $this->getExercicesFromEntrainement($idEntrainement);
        foreach($exercices as $ex){
            $this->deleteExercice($ex['idexercice']);
        }      
      return true;
      
    
    }

//Exercice 
    
    //create
    public function addExercices($listExercices,$idEntrainement){
        foreach($listExercices as $ex){
            $idexercice = $this->addExercice($ex);           
            $this->linkEntrainementExercice($idexercice,$idEntrainement);
        }
        
    }
    private function addExercice($exercice){

        try { 
            $sql = "INSERT INTO `exercice` (`idexercicecatalogue`,`status`, `poids`, `repetitions`, `sets`, `duree`, `dureepause`)  VALUES 
            (:idexercicecatalogue, 0, :poids, :repetitions, :sets, :duree, :dureepause)";
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
            INNER JOIN `exercicecatalogue` ON `exercice`.`idexercicecatalogue` =`exercicecatalogue`.`idexercicecatalogue`  WHERE `identrainement` = '$idEntrainement' ";
            
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
    public function updateExercice($exercice){
        try {  
            $sql = "UPDATE `exercice` SET `poids` =  '$exercice->poids', `repetitions` =  '$exercice->repetitions',
             `sets` =  '$exercice->sets', `duree` =  '$exercice->duree',  `dureepause` =  '$exercice->dureepause'   
            WHERE `idexercice` =  $exercice->idexercice";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //Delete
    public function deleteExercice($idexercice){
        try {  
            // ON DELETE CASCADE
            $sql = "DELETE FROM `exercice` WHERE `idexercice` = $idexercice";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //Historique And STATUS

    public function getExerciceStatus($idExercice){
        try{
            $sql = "SELECT * FROM `exercice` WHERE `idexercice` = $idExercice ";           
      
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetch();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }


    }
    public function setExerciceStatusComplete($idExercice){
        try {  
            $sql = "UPDATE `exercice` SET `status` =  1 WHERE `idexercice` =  $idExercice";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function setExerciceStatusIncomplete($idExercice){
        try {  
            $sql = "UPDATE `exercice` SET `status` =  0 WHERE `idexercice` =  $idExercice";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getExercicesCatalogue(){
        try { 
            $sql = "SELECT * FROM `exercicecatalogue` LIMIT 25";
            $stmt = $this->db->prepare($sql); 
            $stmt->execute();
            $result = $stmt->fetchAll();
        return $result;
        }catch (PDOException $e) {
            echo $sql.$e->getMessage();
        return false;
        }
    }

    

//lier les diferente table

    private function linkEntrainementExercice($idexercice,$idEntrainement){
        try {  
            $sql = "INSERT INTO `entrainementexercice` (`identrainement`, `idexercice`) VALUES 
            ($idEntrainement,$idexercice)";
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

//json Cattegorie
    public function addJsonCategorieAndExercice($name,$img,$cat){
        if(!$this->isJsonCategorieExist($cat)){
          $idCat= $this->addNewExerciceCategorie($cat);
        }
        $idCat= $this->getExerciseCategorie($cat);
        return $this->addExerciceCatalogue($name,$img,$idCat);
    }
    private function addNewExerciceCategorie($cat){
        try { 
            $sql = "INSERT INTO `categories` (`nom`)  VALUES 
            ('$cat')";
            $stmt = $this->db->prepare($sql); 
            $stmt->execute();
            
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $sql.$e->getMessage();
        return false;
        }
    }
    private function isJsonCategorieExist($cat){
        try { 
            $sql = "SELECT * FROM `categories` WHERE `nom`= '$cat' ";
            $stmt = $this->db->prepare($sql);   
            $stmt->execute();
            $result = $stmt->rowCount();
            
            if($result>0){
                return true;
            }else{
                return false;
            }

        }catch (PDOException $e) {
            echo $sql.$e->getMessage();
        return false;
        }
    }
    public function getExerciseCategorie($cat){
        try { 
            $sql = "SELECT * FROM  `categories` WHERE `nom`= '$cat' ";
            $stmt = $this->db->prepare($sql);   
            $stmt->execute();
            $result = $stmt->fetch();
       
         
            return $result['idcategorie'];
        }catch (PDOException $e) {
            echo $sql.$e->getMessage();        
        return false;
        }
    }

    public function addExerciceCatalogue($name,$img,$idCat){
        try { 
            $sql = "INSERT INTO `exercicecatalogue` (`nom`,`image`,`idcategorie`)  VALUES 
            ('$name','$img',$idCat)";
            $stmt = $this->db->prepare($sql); 
            $stmt->execute();
            
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $sql.$e->getMessage();
        return false;
        }
    }
//Blogs

    public function getAllBlogs(){
        try {  
            $sql = "SELECT * FROM `blog`";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllBlogsWithCategorie($idCategorie){
        try {  
            $sql = "SELECT * FROM `blog` WHERE `idcategorie`= $idCategorie";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getBlogByTitleSearch($txt){
        try {  
            $search = "%".$txt."%";
            $sql = "SELECT * FROM `blog` WHERE `titre` LIKE '$search' ";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
//Produits

    public function getAllProduits(){
        try {  
            $sql = "SELECT * FROM `produits`";
            
            $stmt = $this->db->prepare($sql);            
            $stmt->execute();
            $result = $stmt->fetchAll();
            
        return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }
    public function getAllProduitWithCategorie($idCategorie){
        try {  
            $sql = "SELECT * FROM `produits` WHERE `idcategorie`= $idCategorie";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }   
    }
    public function getProduitByTitleSearch($txt){
        try {  
            $search = "%".$txt."%";
            $sql = "SELECT * FROM `produits` WHERE `nom` LIKE '$search' ";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
        }
    }
    

}
