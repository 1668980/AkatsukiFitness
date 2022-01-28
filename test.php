<?php
include 'includes/header.php';
include 'db/conn.php';

$email = "test@gmail.com";
$password = "test";
$result = $crud->login($email,$password);
//$result = $crud->login();
echo $result;
 echo"<br>"
var_dump($crud->getUser(2);)
?>