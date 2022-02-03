<?php
include 'includes/header.php';
include 'db/conn.php';

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
echo $crud->AjouterExercises($exercisesList,1);


?>