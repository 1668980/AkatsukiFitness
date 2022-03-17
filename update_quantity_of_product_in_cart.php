
<?php
  
    require_once 'db/conn.php';
    require_once 'includes/session.php';
    header('Content-Type: application/json'); 



    $idArticle= $_POST['arguments'][0];
    $quantite= $_POST['arguments'][1];
    $idUser = $_SESSION['userid'];
    
    $crud->UpdateQuantiteArticlePanier($idArticle,$quantite);

    $article= $crud->getArticleByID($idArticle);

    $prixArticle =$article['prix']*$article['quantite'];
    $rabais = $prixArticle * 0.05;
        
    $aResult['articleUpdated']['prixArticle'] = $prixArticle;
    $aResult['articleUpdated']['prixRabaisArticle'] = $prixArticle-$rabais;
    $aResult['isPremium']= $crud->isUserPremium($idUser);

    $POURCENTAGE_DE_RABAIS = 0.05;
    $POURCENTAGE_DE_TAXES = 0.15;

    $sousTotal =$crud->getTotalPrixPanier($idUser);
    if($aResult['isPremium']){

        $aResult['sousTotal'] = $sousTotal;
        $aResult['rabaisTotal'] =$sousTotal *($POURCENTAGE_DE_RABAIS);
        $aResult['PrixTotal'] = $sousTotal + $sousTotal*($POURCENTAGE_DE_TAXES) ;


    }else{
        $aResult['sousTotal'] = $sousTotal;
        $aResult['rabaisTotal'] =0;
        $aResult['PrixTotal'] = $sousTotal+ $sousTotal*($POURCENTAGE_DE_TAXES);
    }

   



   
    echo json_encode($aResult);

?>