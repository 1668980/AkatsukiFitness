<?php 

//ajoute un entrainement 
require_once 'includes/header.php';
$action = $_POST['action'];
$idExercice = $_POST['idExercice'];
$idEntrainement = $_POST['idEntrainement'];

if($action == 1){
    $crud->setExerciceStatusComplete($idExercice);
}else if($action == 0){
    $crud->setExerciceStatusIncomplete($idExercice);
}

header('Location: workout_in_progress.php?id_training='.$idEntrainement);

?>

