<?php

class Crud
{

    const STATUS_INCOMPLETE = 0;
    const STATUS_COMPLETED = 1;
    const STATUS_INPROGRESS = 2;


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

            $sql = "UPDATE `utilisateur` SET `nom` =  '$user->lastname' , `prenom` =  '$user->firstname',`date_de_naissance` = '$user->dob',`sexe` = '$user->gender'
            ,`poids`= '$user->weight'";
            
            if ($user->weight_goal != null) { 
                $sql .= ",`poids_desire`= '$user->weight_goal'";
            }
            $sql .= ",`avatar`= '$user->avatar' WHERE `utilisateur`.`iduser` =  $user->id_user";
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
            $sql = "UPDATE `utilisateur` SET `email` =  '$user->email' WHERE `utilisateur`.`iduser` =  $user->id_user";
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
            $sql = "UPDATE `connexion` SET `email` =  '$user->email' WHERE `connexion`.`idUtilisateur` =  $user->id_user";
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

    public function isUserPremium($idUser){
        $user =$this->getUser($idUser);

        if ($user['datedebutabonnement'] == NULL) { 
            return false;
        }
        
        $dateStartSub= new DateTime($user['datedebutabonnement']);
        $dateEndSub= new DateTime($user['datefinabonnement']);

        return $dateStartSub < $dateEndSub;
    }
    
    public function membershipDetail($idUser) {
       
        $user = $this->getUser($idUser);
       
        $details = [];

        if ($this->isUserPremium($idUser)) { 
            $details['membership'] = 'premium';
            $details['startdate'] = $user['datedebutabonnement'];
            $details['enddate'] = $user['datefinabonnement'];
        } else { 
            $details['membership'] = 'free';
        }

        return $details;

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

//Image
    public function getLienImage($imageID) {
        try{
            $sql = "SELECT * FROM `lienimage` WHERE `imageID` = '$imageID' ";            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }

//Entrainement

    //Create
    public function createNewEntrainement($entrainement){
       if($this->isUserPremium($entrainement->idUser) ||count( $this->getEntrainementsByIdUser($entrainement->idUser)) <3  ){
      
       
       $idEntrainement= $this->createEntrainement($entrainement);
       $idContenu = $this->getContenuId($entrainement->idUser);
       $this->linkEntrainementContenu($idContenu,$idEntrainement);
       return $idEntrainement;   
       }else
       return false;


    }

    private function createEntrainement($entrainement){
        try{    

            $sql = "INSERT INTO `entrainement` (`nom`,`status`,`type`,`difficulte`) VALUES (:name,:status,:type,:difficulte)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name', $entrainement->name);
            $stmt->bindValue(':status', self::STATUS_INCOMPLETE);
            $stmt->bindparam(':type', $entrainement->type);
            $stmt->bindparam(':difficulte', $entrainement->difficulte);

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
        return $this->getEntrainementsCompletedOrIncompletedByContenu($idContenu,self::STATUS_COMPLETED);
    }
    public function getEntrainementsIncompletedByIdUser($idUser){
        $idContenu =$this->getContenuId($idUser);
        return $this->getEntrainementsCompletedOrIncompletedByContenu($idContenu,self::STATUS_INCOMPLETE);
    }
    public function getEntrainementsInProgressByIdUser($idUser){
        $idContenu =$this->getContenuId($idUser);
        return $this->getEntrainementsCompletedOrIncompletedByContenu($idContenu,self::STATUS_INPROGRESS);
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

            //TODO :  utiliser la constante self::STATUS_COMPLETED ici mais il faut la passer par value;
            // $s = self::STATUS_COMPLETED;
            //$sql = "UPDATE `entrainement` SET `status` = $s  WHERE `identrainement` =  $idEntrainement";
            // ou avec un prepared statement. il faut utiliser un bindvalue au lieu d'un bindparam;


            $sql = "UPDATE `entrainement` SET `status` = 1  WHERE `identrainement` =  $idEntrainement";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();   

            $listExercices =$this->getExercicesFromEntrainement($idEntrainement);
            $this->addHistoriqueOfExerciceList($listExercices);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function setEntrainementStatusIncomplete($idEntrainement){
        try {  

            //TODO :  utiliser la constante self::STATUS_INCOMPLETE ici mais il faut la passer par value;
            // $s = self::STATUS_INCOMPLETE;
            //$sql = "UPDATE `entrainement` SET `status` = $s  WHERE `identrainement` =  $idEntrainement";
            // ou avec un prepared statement. il faut utiliser un bindvalue au lieu d'un bindparam;

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

    public function getLastCreatedIdEntrainement(){
        try {  
            $sql = "SELECT MAX(identrainement) FROM  `entrainement`";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
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

    //Lister catégories des exercices 
    public function ListExercicesCategories()
    {
        try {
            $sql = "SELECT * FROM `categories`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
            return false;
        }
    }
    //Lister catégories des exercices 
    public function ListExercicesParCategories($cat)
    {
        try {
            $sql = "SELECT * FROM `exercicecatalogue` Where `idcategorie`= '$cat' LIMIT 25";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
            return false;
        }
    }

    //selectioner une fonction par son id
    public function getCatbyId($idCat){
        try {
            $sql = "SELECT * FROM `categories` Where `idcategorie`= '$idCat' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
            return false;
        }
    }
    public function getNameOfCat($idCat){
        $idCategorie = $this->getCatbyId($idCat);
        return $idCategorie[0]['nom'];
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
    private function linkHistoriqueExercice($idExercice,$idHistorique){
        try {  
            $sql = "INSERT INTO `historiquedexercice` (`idexercice`, `idhistorique`) VALUES 
            ($idExercice,$idHistorique)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        return true;

        }catch (PDOException $e) {
             echo $e->getMessage();
        return false;
        }
    }
    private function linkPanier($idUser,$idArticle){
        try {  
            $sql = "INSERT INTO `panier` (`iduser`, `idarticle`) VALUES 
            ($idUser,$idArticle)";
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
    public function getBlogByID($id){
        try {  
            $sql = "SELECT * FROM  `blog` WHERE `idblog`= '$id' ";        
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
    public function getCategoriesBlog($idcategorie){
        try {  
            $sql = "SELECT * FROM `categoriesblog` WHERE `idcategorie` = '$idcategorie' ";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllCategoriesBlog(){
        try {  
            $sql = "SELECT * FROM `categoriesblog` ";
        
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
    public function getCategoriesProduit(){
        try {  
            $sql = "SELECT * FROM `categoriesproduit`";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }   
    }

//Historique
    //Exercice

    public function addHistoriqueOfExerciceList($listExercices){
        foreach($listExercices as $ex){
            $idHistorique = $this->addHistoriqueOfExercice($ex);           
            $this->linkHistoriqueExercice($ex['idexercice'],$idHistorique);
        }
    }
    private function addHistoriqueOfExercice($exercice){
   
        try { 
            $dt1 = new DateTime();
            $today = $dt1->format("Y-m-d");

            $sql = "INSERT INTO `historiqueexerciceprecedent` (`date`, `poids`, `repetitions`, `sets`, `duree`)  VALUES 
            (:date, :poids, :repetitions, :sets, :duree)";
            $stmt = $this->db->prepare($sql);
            
        
            $stmt->bindparam(':date', $today);
            $stmt->bindparam(':poids', $exercice['poids']);
            $stmt->bindparam(':repetitions', $exercice['repetitions']);
            $stmt->bindparam(':duree', $exercice['duree']);
            $stmt->bindparam(':sets', $exercice['sets']);
           

           
            $stmt->execute();
            
        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $sql.$e->getMessage();
        return false;
        }
    }

//Panier    

    //get
    public function getPanierByidUser($idUser){
        try{
            $sql = "SELECT * FROM `panier` INNER JOIN `articlepanier` ON `panier`.`idarticle`  = `articlepanier`.`idarticle`  INNER JOIN `produits` ON `produits`.`idproduit`  = `articlepanier`.`idproduit`  WHERE `panier`.`iduser` = '$idUser' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }
    public function getArticleByID($idArticle){
        try{
            $sql = "SELECT * FROM `panier` INNER JOIN `articlepanier` ON `panier`.`idarticle`  = `articlepanier`.`idarticle`  INNER JOIN `produits` ON `produits`.`idproduit`  = `articlepanier`.`idproduit`  WHERE `panier`.`idarticle` = '$idArticle' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }



    public function getNombreOfProductInPanierByidUser($idUser){
        try{
            $sql = "SELECT * FROM `panier`  WHERE `panier`.`iduser` = '$idUser' ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->rowCount();
            return  $result;
        }catch  (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }
    public function isArticleInPanierOfTheUser($idUser,$idProduct){
        $listArticle = $this->getPanierByidUser($idUser);
        foreach($listArticle as $art){
            if($art["idproduit"] == $idProduct) {
                return [$art['idarticle'],$art['quantite']];
            }
        }
        return -1;
    }
    //add
    public function AddArticleToUserPanier($idUser,$idProduct,$quantite){
        $req = $this->isArticleInPanierOfTheUser($idUser,$idProduct);  
        
        
        if($req == -1){
            $idArticle=$this->AddArticleToPanier($idProduct,$quantite);
            $this->linkPanier($idUser, $idArticle);
            return $idArticle;

        }else{
            $idArticle= $req[0];
            $quantite= $req[1]+1;
            $this->UpdateQuantiteArticlePanier($idArticle, $quantite);
        }
    
       
    }
    private function AddArticleToPanier($idProduct,$quantite){
        try{    

            $sql = "INSERT INTO `articlepanier` (`idproduit`,`quantite`) VALUES ($idProduct,$quantite)";

            $stmt = $this->db->prepare($sql);      
            $stmt->execute();

        return $this->db->lastInsertId();
        }catch (PDOException $e) {
            echo $e->getMessage();
        return false;
        }
    }

    //Update
    public function UpdateQuantiteArticlePanier($idArticle,$quantite){
        try {  
            $sql = "UPDATE  `articlepanier`  SET `quantite` =  '$quantite'  WHERE `idarticle` =  $idArticle";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //Delete
    public function deleteArticlePanierByIdArticle($idArticle){
        try {  
            $sql = "DELETE FROM `articlepanier` WHERE `idarticle` =  $idArticle";
            $stmt = $this->db->prepare($sql);  
            $stmt->execute();            
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function deleteArticlePanierByIdProduct($idUser,$idProduct){
        $listArticle = $this->getPanierByidUser($idUser);
        foreach($listArticle as $art){
            if($art["idproduit"] == $idProduct) {
                return $this->deleteArticlePanierByIdArticle($art['idarticle']);
            }
        }
     

    }
    public function getTotalPrixPanier($idUser){
        $listArticle = $this->getPanierByidUser($idUser);
        $total = 0;
        foreach($listArticle as $art){
           $total+= $art['prix']*$art['quantite'];
        }
        return  $total;
    }
    public function clearPanier($idUser){
        $listArticle = $this->getPanierByidUser($idUser);
        foreach($listArticle as $art){            
             $this->deleteArticlePanierByIdArticle($art['idarticle']);            
        }
        return true;    
    }
    //Link











 

}
