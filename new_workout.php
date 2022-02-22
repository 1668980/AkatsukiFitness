<?php
//Registers signup
require_once('includes/header.php');
require_once 'includes/session.php';
require_once 'db/conn.php';
$name = $_POST['name'];
$idUser = $_SESSION['userid'];
$difficulte="dificile";
$type="haut1 du corp";
$workout= new Entrainement(0,$idUser,$name,$difficulte,$type);

$result = $crud->createNewEntrainement($workout );


//$_SESSION['userid'] = $result;
//$_SESSION['email'] = $email;
header('Location: workouts.php?id=' . $result );
?>