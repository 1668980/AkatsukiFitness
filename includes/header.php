<?php 

    // pour display les erreurs.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    require_once 'includes/session.php';
    require_once 'includes/helpers.php';
    require_once 'db/Utilisateur.php';
    require_once 'db/Exercice.php';
    require_once 'db/Entrainement.php';
    require_once 'db/conn.php';
    require_once 'includes/Lang.php';
    // if(isset($_SESSION['userid'])){
    //     $userid = $_SESSION['userid'];
    //     $email =  $_SESSION['email'];
    //     echo "<script>alert('(TEST) connecté :  utilisateur $userid ($email)');</script>";
    // }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akatuski : Fitness Manager</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="utilitaires/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font aweson icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Javascript -->
    <script src="utilitaires/popper.min.js"></script>
    <script src="utilitaires/jquery-3.6.0.min.js"></script>
    <script src="utilitaires/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="js/app.js"></script>
    <script language="javascript" src="exercices/exercicesRequettes.js"></script>
    <script language="javascript" src="exercices/exercicesVue.js"></script>
</head>


<?php include ('vue/nav.php'); ?>


<body class="bg-dark">
    <?php
    if (isset($breadcrumb)){
        echo '<div class="container">';
        breadcrumb($breadcrumb);
    echo '</div>';
    }
    ?>
    <?php
        if (isset($landing_img)){
            echo '<div class="landing mb-5" style="background-image:url(\''.$landing_img.'\')">
            <div id="landing-text-box">';

            if (isset($landing_title)) {
                echo '<h1 class="title ">'.$landing_title.'</h1>';
            }
            echo '</div></div>';   
            }
    ?>
    <?php
        if (isset($carousel)) { 
            include ('vue/carrousel.php');
        }
    ?>

    <?php
         if (! isset($skip_container) || !$skip_container) {
    ?>
    <div class="container">
    <?php } ?>

    
    