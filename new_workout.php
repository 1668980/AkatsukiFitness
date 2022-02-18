<?php
//Registers signup
require_once 'includes/session.php';
require_once 'db/conn.php';
$name = $_POST['name'];


$result = $crud->createNewEntrainement($name, $_SESSION['userid']);


//$_SESSION['userid'] = $result;
//$_SESSION['email'] = $email;
header('Location: workouts.php?id=' . $result );
?>