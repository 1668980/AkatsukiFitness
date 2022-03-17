<?php
//ajoute un entrainement 
require_once 'includes/session.php';
require_once 'db/Utilisateur.php';
require_once 'db/conn.php';
require_once 'db/Entrainement.php';
$name = $_POST['trainingName'];
$user = $_SESSION['userid'];
$exoChoisis = $_POST['exo'];
$listeExo = array();

$training = new Entrainement(0, $user, $name, 0, 0);
$result = $crud->createNewEntrainement($training);
foreach($exoChoisis as $exo){
    $ex = new Exercice(0, $exo['id'], 0, 0, 0, 0, 0);
    $listeExo[] = $ex;
}
$result = $crud->addExercices($listeExo, $result);
header('Location: workouts.php');

?>