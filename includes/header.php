<!-- This session file contains code that starts/resumes a session -->
<!-- In the header so it is included on every page, allowing session capability to be used on every page -->
<?php 
    include_once 'includes/session.php' ;
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
        $email =  $_SESSION['email'];
        echo "<script>alert('(TEST) connecté :  utilisateur $userid ($email)');</script>";
    }
    
?>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akatuski : Fitness Manager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="utilitaires/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css" />
    <!-- Javascript -->
    <script src="utilitaires/popper.min.js"></script>
    <script src="utilitaires/jquery-3.6.0.min.js"></script>
    <script src="utilitaires/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="js/app.js"></script>
</head>


<body>
<?php require_once ('vue/nav.php'); ?>
