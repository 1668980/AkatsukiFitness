<?php
    require_once 'includes/session.php';
    require_once 'db/Utilisateur.php';
    require_once 'db/conn.php';
    require_once 'db/Entrainement.php';
    $id = $_POST['trainingID'];
    
    $result = $crud->deleteEntrainementById($id);
  //  header('Location: workouts.php');

?>