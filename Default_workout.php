<?php 
include 'db/conn.php';
include 'includes/header.php';

$idUser  = $_SESSION['userid'];


$name = "Défaut 01 - Abdominaux";
$difficulte=1;
$type="Haut du corps";
$workout= new Entrainement(0,$idUser,$name,$difficulte,$type);

$id_workout = $crud->createNewEntrainement($workout);
$poids=0;
$repetitions=15;
$sets=3;
$duree=15;
$dureePause=15;

$exercicesList = array();
foreach( [3,4,5,7,12] as $exercice_id ) { 
    $e = new Exercice(0,$exercice_id,$poids,$repetitions,$sets,$duree,$dureePause);
    array_push($exercicesList,$e);
}

$crud->addExercices($exercicesList,$id_workout);





$name = "Défaut 02 - Jambes";
$difficulte=1;
$type="Bas du corps";
$workout= new Entrainement(0,$idUser,$name,$difficulte,$type);

$id_workout = $crud->createNewEntrainement($workout);
$poids=0;
$repetitions=15;
$sets=3;
$duree=15;
$dureePause=15;

$exercicesList = array();
foreach( [463,944,441,1028,872] as $exercice_id ) { 
    $e = new Exercice(0,$exercice_id,$poids,$repetitions,$sets,$duree,$dureePause);
    array_push($exercicesList,$e);
}

$crud->addExercices($exercicesList,$id_workout);


session_destroy();
header('Location: login.php');

?>