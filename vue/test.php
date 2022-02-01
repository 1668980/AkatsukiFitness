<?php
include '../includes/header.php';
include '../db/conn.php';

    $email = "test@gmail.com";
    $password = "test";


// crud pour se connecter
    $result = $crud->login($email,$password);
//$result = $crud->login();
    echo"<br><br> Login: ";
    echo $result;
  

 // crud pour avoir un utilisateur avec son id
    echo"<br><br> getUser: ";
    var_dump($crud->getUser(2));
    echo"<br><br> Cree un Compte:";

//Cree un utilisateur
$idUser  ;
$email="01@gmail.com"  ;
$firstName="01";
$lastName="01";
$date='2022-01-04';
$user = new Utilisateur($email,$firstName,$lastName,$date);




   echo $crud->creeUnCompte($user);

?>