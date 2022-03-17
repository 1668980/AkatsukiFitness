<?php
//Registers signup
require_once 'includes/session.php';
require_once 'db/Utilisateur.php';
require_once 'db/conn.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = strtolower(trim($_POST['email']));
$pass = $_POST['passInsc'];
$passConf = $_POST['passConf'];
//type abonnement

$user = new Utilisateur(0, $lastname, $firstname, $email, $dob, $gender,0,null, 1);
$user->setPassword($pass);

$userId = $crud->createUtilisateur($user);

$membership_months = $_POST['membership_months'];

if (! in_array( $membership_months, [0,1,3,6])) { 
    return 'gtfo';
}


if ($membership_months > 0 ) { 
    $crud->addSubscriptionToUser($userId, $membership_months);
}



//$_SESSION['email'] = $email;
header('Location: login.php');

?>