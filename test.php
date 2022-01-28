<?php
include 'includes/header.php';
include 'db/conn.php';

$result = $crud->login();
echo $result;

?>