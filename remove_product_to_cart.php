
<?php
  
    require_once 'db/conn.php';
    require_once 'includes/session.php';
    header('Content-Type: application/json'); 



    $idproduct= $_POST['idproduct'];   
    $idUser = $_SESSION['userid'];
    

    $crud->deleteArticlePanierByIdProduct($idUser,$idproduct);
    $aResult =$crud->getNombreOfProductInPanierByidUser($idUser);
    
    
   
    echo json_encode($aResult);
    header('Location: shop_cart.php');
?>