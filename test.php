<div class="text-light">

<?php

include 'includes/header.php';
include 'db/conn.php';

/*
$idexercicecatalogue =1;
$poids = 100;
$repetitions=6;
$sets=3;
$duree=0;
$dureePause=60;

$exercice = new Exercice(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);

// fonctionnel
//var_dump($exercice);


$exercicesList = array();

array_push($exercicesList,$exercice);
echo $crud->addExercices($exercicesList,1);*/

/*$idUser =2 ;
$email="03@gmail.com"  ;
$firstName="03";
$lastName="03";
$date='2022-02-22';
$user = new Utilisateur($idUser,$lastName,$firstName,$email,$date);
$user->setPassword("dasd12asd");


echo "dasds";
echo $crud->isEmailUsed($email);
echo $crud->createUtilisateur($user);*/
/*

$idexercicecatalogue =1;
$poids = 100;
$repetitions=6;
$sets=3;
$duree=0;
$dureePause=60;

$exercice = new Exercice(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);
$exercise2 = new Exercice(0,2,$poids,$repetitions,$sets,$duree,$dureePause);

$exercicesList = array();

array_push($exercicesList,$exercice);
array_push($exercicesList,$exercise2);


$nomDeLentrainement ="Entrainemnt du lundi";
$idUserAajouter = 1;
// Entrainement
//Dabord cree l'entrainement
echo"<br><br> cree entrainement :<br>";
echo $crud->createNewWorkout($nomDeLentrainement,$idUserAajouter);
echo"<br><br> ajouter exercice :<br>";
echo $crud->addExercices($exercicesList,$idUserAajouter);



*/

// $result =$crud->getExercicesCatalogue();
// echo $result[0]['nom'];


//var_dump($result);
/*
$result =$crud->getExercicesFromEntrainement(1);
//var_dump($result);
echo $result[0]["nom"];
echo "<br>";*/
//echo $result[0]['poids'];
/*$result =$crud->getEntrainementsByIdUser(1);
var_dump($result);*/
/*
*/
/*
$result =$crud->isUserSubscibed(1);
var_dump($result);
*/


/*
//$result =$crud->updateExercice($exercice);
//$result =$crud->deleteExercice(2);
$result =$crud->deleteEntrainement(2);

echo "<br> test <br>";
var_dump($result);*/

// $crud->setExerciceStatusComplete(1);
// $email="03@gmail.com"  ;
// $firstName="03";
// $lastName="03";
// $date='2022-02-22';
// $user = new Utilisateur($_SESSION['userid'],$lastName,$firstName,$email,$date,1,0);

// $r= $crud->updateUserUtilisateurTableSansEmail($user);

// var_dump( $r);

/*
$r= $crud->getEntrainementsIncompletedByIdUser($_SESSION['userid']);

 var_dump( $r);
*/
/*
$r =$crud->deleteEntrainementById(42);

var_dump($r);
*/
// $r =$crud->getBlogByTitleSearch("com");
// var_dump ($r);

/*$result =$crud->addSubscriptionToUser(2,2);
var_dump($result);*/
// $idexercicecatalogue =1;
// $poids = 100;
// $repetitions=6;
// $sets=3;
// $duree=0;
// $dureePause=60;

// $exercice = new Exercice(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);
// $exercise2 = new Exercice(0,2,$poids,$repetitions,$sets,$duree,$dureePause);

// $exercicesList = array();

// array_push($exercicesList,$exercice);
// array_push($exercicesList,$exercise2);

 //$r =$crud->setEntrainementStatusComplete(3);


// $result =$crud->addHistoriqueOfExerciceList($r);
// var_dump($result);

/*
* Panier
*/
//Add
$idUser= $_SESSION['userid'];
$idProduit=3;
$idQantite=1;

// $result =$crud->AddArticleToUserPanier($idUser,$idProduit,$idQantite);
// var_dump($result);
//Delete

// $idUser= $_SESSION['userid'];
// $idArticle=1;


//  $result =$crud->deleteArticlePanierByIdArticle($idArticle);
//  var_dump($result);

//Update

// $idUser= $_SESSION['userid'];
// $idArticle=2;
// $idQuantite=10;

//  $result =$crud->UpdateQuantiteArticlePanier($idArticle,$idQuantite);
//  var_dump($result);


//Get
$idUser= $_SESSION['userid'];
$idProduit=3;
$idQantite=1;

// $result =$crud->getPanierByidUser($idUser);
// var_dump($result);

/*
  $result =$crud->deleteArticlePanierByIdProduct($idUser, 2);
 var_dump($result);*/

 $result =$crud->clearPanier($idUser);
var_dump($result);

?>
</div>