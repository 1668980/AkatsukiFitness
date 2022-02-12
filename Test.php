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

$exercice = new Exercise(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);

// fonctionnel
//var_dump($exercice);
echo $crud->AjouterUnExercice($exercice);

$exercicesList = array();

array_push($exercicesList,$exercice);
echo $crud->AjouterExercices($exercicesList,1);*/
/*$idUser =2 ;
$email="03@gmail.com"  ;
$firstName="03";
$lastName="03";
$date='2022-02-22';
$user = new Utilisateur($idUser,$lastName,$firstName,$email,$date);
$user->setPassword("dasd12asd");


echo "dasds";
echo $crud->VerifierSiEmailDejaUtilise($email);
echo $crud->creeUnCompte($user);*/
/*

$idexercicecatalogue =1;
$poids = 100;
$repetitions=6;
$sets=3;
$duree=0;
$dureePause=60;

$exercice = new Exercise(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);
$exercise2 = new Exercise(0,2,$poids,$repetitions,$sets,$duree,$dureePause);

$exercicesList = array();

array_push($exercicesList,$exercice);
array_push($exercicesList,$exercise2);


$nomDeLentrainement ="Entrainemnt du lundi";
$idUserAajouter = 1;
// Entrainement
//Dabord cree l'entrainement
echo"<br><br> cree entrainement :<br>";
echo $crud->CreeUnNouveauEntrainement($nomDeLentrainement,$idUserAajouter);
echo"<br><br> ajouter exercice :<br>";
echo $crud->AjouterExercices($exercicesList,$idUserAajouter);



*/
/*
$result =$crud->GetExercisesFromAnEntrainement(1);
var_dump($result[0]);
echo "<br>";
echo $result[0]['poids'];
/*$result =$crud->GetEntrainementByIdUser(1);
var_dump($result);*/
/*
$result =$crud->AddsubscriptionToUser(1,"+1 month");
var_dump($result);*/

$result =$crud->IsUserSubscibed(1);
var_dump($result);




?>