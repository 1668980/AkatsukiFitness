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


$exercicesList01 = array();
array_push($exercicesList01,$exercice01);


$exercicesList02;
$idUser  = $_SESSION['userid'];

$idWorkout01 = $crud->createNewEntrainement("Par Defaut 01",$idUser);
echo $crud->addExercices($exercicesList01,$idWorkout01);
session_destroy();
header('Location: login.php');

?>