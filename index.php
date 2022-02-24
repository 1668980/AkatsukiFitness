<?php

$carousel=true;

require_once('includes/header.php');
?>
<!-- Corps de la page -->
   
    <!-- Container de cartes pour les articles, entrainemnts ou recettes (contenu) -->
    <?php require_once ('vue/plans.php'); ?>
    
    <div style="width:40%; margin: 0 auto;">
        <button class="btn btn-success" type="button" style="width:100%; font-size:200% "><?php __('index_btn'); ?></button>
</div>
        

<?php require_once('includes/footer.php');?>