
<?php
  
    require_once 'db/conn.php';
    require_once 'includes/session.php';
    header('Content-Type: application/json'); 



    $idproduct= $_POST['arguments'][0];
    $quantite= $_POST['arguments'][1];
    $idUser = $_SESSION['userid'];
    
    $crud->AddArticleToUserPanier($idUser,$idproduct,$quantite);
    $aResult =$crud->getNombreOfProductInPanierByidUser($idUser);

    
    
   
    echo json_encode($aResult);

?>