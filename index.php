<?php
require_once('includes/header.php');
?>
<!-- Corps de la page -->
<main class="bg-dark">

    <p style="width:100%; color:WHITE; text-align:center; font-size:500%; font-family:Stencil Std, fantasy; padding-top:2%;">Pourquoi choisir Akatsuki Fitness ?</p>

    <!-- Caroussel faisant défiler différents articles ou entrainemnts (peut être amélioré)-->        
    <?php require_once ('vue/carrousel.php'); ?>   
    
    <!-- Container de cartes pour les articles, entrainemnts ou recettes (contenu) -->
    <?php require_once ('vue/forfait.php'); ?>
    
    <div style="width:40%; margin: 0 auto;">
        <button class="btn btn-success" type="button" style="width:100%; font-size:200% ">INSCRIVEZ-VOUS!</button>
    </div>
        
<main> 

<?php require_once('includes/footer.php');?>