<!-- This session file contains code that starts/resumes a session -->
<!-- In the header so it is included on every page, allowing session capability to be used on every page -->
<?php 

    // pour display les erreurs.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    require_once 'includes/session.php';
    require_once 'includes/helpers.php';
    require_once 'db/Utilisateur.php';
    require_once 'db/Exercice.php';
    require_once 'db/conn.php';
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


<body class="bg-dark">
    <!-- pour des la couleur du text blanche : navbar-dark / noir : navbar-light -->
    <nav id="myNav" class="navbar navbar-expand-md navbar-dark bg-danger bg-gradient">
        <div class="container-fluid">
            <a class="logo navbar-brand" href="index.php">Akatsuki Fitness</a>
            <button id="toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="toggler" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav me-auto">
                    <a id="btnHome" href="index.php" class="nav-item nav-link">Accueil</a>
                    <a id="btnTrain" href="workouts.php" class="nav-item nav-link">Entraînements</a>
                    <a id="btnStore" href="shop_index.php" class="nav-item nav-link">Boutique</a>
                    <a id="btnAbout" href="about.php" class="nav-item nav-link">À propos de nous</a>
                    <a id="btnBlog" href="blog.php" class="nav-item nav-link">Blog</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <?php if(!isset($_SESSION['userid'])) { ?>
                    <a href="login.php" class="nav-item nav-link">Se connecter</a>
                    <?php } else {
                        $userid = $_SESSION['userid'];
                        $userInfo = $crud->getUser($userid); ?>
                    <a id="btnBlog" href="profile.php" class="nav-item nav-link active">Bienvenue, <?php echo $userInfo['prenom']?>!</a>
                    <a href="logout.php" class="nav-item nav-link">Se déconnecter</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php// require_once ('vue/nav.php'); ?>