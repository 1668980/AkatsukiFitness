<?php
//Registers signup
require_once 'db/conn.php';
require_once 'includes/session.php';
require_once 'db/Exercice.php';




$poids= $_POST['poids'];
$sets=  $_POST['sets'];
$repetitions= $_POST['reps'];
$duree= $_POST['duree'];
$dureePause= $_POST['dureePause'];
$idEntrainement = $_POST['idEntrainement'];
$idExercice = $_POST['idExercice'];
//var_dump($_POST['idEntrainement']);

$exercice = new Exercice($idExercice,0,$poids,$repetitions,$sets,$duree,$dureePause);

$crud->updateExercice($exercice);
header('Location: workout_in_progress.php?id_training='.$idEntrainement);







?>