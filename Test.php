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

$exercise = new Exercise(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);

// fonctionnel
//var_dump($exercise);
echo $crud->AjouterUnExercise($exercise);

$exercisesList = array();

array_push($exercisesList,$exercise);
echo $crud->AjouterExercises($exercisesList,1);*/
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

$exercise = new Exercise(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);
$exercise2 = new Exercise(0,2,$poids,$repetitions,$sets,$duree,$dureePause);

$exercisesList = array();

array_push($exercisesList,$exercise);
array_push($exercisesList,$exercise2);


$nomDeLentrainement ="Entrainemnt du lundi";
$idUserAajouter = 1;
// Entrainement
//Dabord cree l'entrainement
echo"<br><br> cree entrainement :<br>";
echo $crud->CreeUnNouveauEntrainement($nomDeLentrainement,$idUserAajouter);
echo"<br><br> ajouter exercise :<br>";
echo $crud->AjouterExercises($exercisesList,$idUserAajouter);



*/
/*$result =$crud->GetExercisesFromAnEntrainement(1);
var_dump($result);
echo "<br>";
echo $result[0]['poids'];*/
$result =$crud->GetEntrainementByIdUser(1);
var_dump($result);

?>