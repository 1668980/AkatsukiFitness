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

$user = new Utilisateur(0, $lastname, $firstname, $email, $dob, $gender);
$user->setPassword($pass);

$result = $crud->createUtilisateur($user);

$_SESSION['userid'] = $result;
$_SESSION['email'] = $email;
header('Location: index.php');
?>