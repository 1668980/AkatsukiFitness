<?php
include 'includes/header.php';
include 'db/conn.php';

$email = "test@gmail.com";
$password = "test";


// crud pour se connecter
$result = $crud->login($email,$password);
//$result = $crud->login();
echo $result;
 echo"<br>";

 // crud pour avoir un utilisateur avec son id
var_dump($crud->getUser(2));


?>