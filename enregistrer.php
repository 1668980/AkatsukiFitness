
<?php
require_once 'includes/session.php';
require_once 'db/Utilisateur.php';
require_once 'db/conn.php';
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$sexe = $_POST['radioSexe'];
$naissance = $_POST['birthDate'];
$courriel = strtolower(trim($_POST['courriel']));
$pass = $_POST['passInsc'];
$passConf = $_POST['passConf'];

$user = new Utilisateur(0, $nom, $prenom, $courriel, $naissance);
$user->setPassword($pass);

    $result = $crud->creeUnCompte($user);
        $_SESSION['userid'] = $result;
        $_SESSION['email'] = $username;
        header('Location: index.php');
?>
