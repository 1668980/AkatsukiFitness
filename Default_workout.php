<?php 
include 'db/conn.php';
include 'includes/header.php';

$idexercicecatalogue =2;
$poids = 50;
$repetitions=5;
$sets=2;
$duree=0;
$dureePause=60;

$exercice01 = new Exercice(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);
$exercice01 = new Exercice(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);
$exercice01 = new Exercice(0,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureePause);


$exercicesList01 = array();
array_push($exercicesList01,$exercice01);


$exercicesList02;
$idUser  = $_SESSION['userid'];


 
$name = "Par defaut01";
$difficulte=1;
$type="Bas du corp";
$workout01= new Entrainement(0,$idUser,$name,$difficulte,$type);

$idWorkout01 = $crud->createNewEntrainement($workout01);
$crud->addExercices($exercicesList01,$idWorkout01);


$name = "Par defaut02";
$difficulte=1;
$type="haut1 du corp";
$workout02= new Entrainement(0,$idUser,$name,$difficulte,$type);

$idWorkout02 = $crud->createNewEntrainement($workout02);
$crud->addExercices($exercicesList01,$idWorkout02);


session_destroy();
header('Location: login.php');

?>