<?php
include 'includes/header.php';
include 'db/conn.php';

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

   echo $crud->creeUnCompte();

?>