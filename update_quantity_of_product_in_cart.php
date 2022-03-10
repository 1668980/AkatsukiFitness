
<?php
  
    require_once 'db/conn.php';
    require_once 'includes/session.php';
    header('Content-Type: application/json'); 



    $idArticle= $_POST['arguments'][0];
    $quantite= $_POST['arguments'][1];
    $idUser = $_SESSION['userid'];
    
    $crud->UpdateQuantiteArticlePanier($idArticle,$quantite);
    $aResult =$crud->getArticleByID($idArticle);

    
    
   
    echo json_encode($aResult);

?>