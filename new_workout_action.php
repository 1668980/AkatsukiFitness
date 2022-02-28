<?php
//ajoute un entrainement 
require_once 'includes/session.php';
require_once 'db/Utilisateur.php';
require_once 'db/conn.php';
require_once 'db/Entrainement.php';
$name = $_POST['trainingName'];
$type = $_POST['trainingType'];
$difficulty = $_POST['trainingDifficulty'];
$user = $_SESSION['userid'];


$training = new Entrainement(0, $user, $name, $difficulty, $type);
$result = $crud->createNewEntrainement($training, $user);
header('Location: workouts.php');
?>