
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
        
    $aResult['articleUpdated']['prixArticle'] = round($prixArticle,2);
    $aResult['articleUpdated']['prixRabaisArticle'] = round($prixArticle-$rabais,2);
    $aResult['isPremium']= $crud->isUserPremium($idUser);

    $POURCENTAGE_DE_RABAIS = 0.05;
    $POURCENTAGE_DE_TAXES = 0.15;

    $sousTotal =round($crud->getTotalPrixPanier($idUser),2);
    if($aResult['isPremium']){

        $aResult['sousTotal'] = $sousTotal;
        $aResult['rabaisTotal'] =round($sousTotal *($POURCENTAGE_DE_RABAIS),2);
       $pTotal=$sousTotal -$aResult['rabaisTotal']+ $sousTotal*($POURCENTAGE_DE_TAXES);
       $aResult['PrixTotal'] =round($pTotal, 2) ;

    }else{
        $aResult['sousTotal'] = $sousTotal;
        $aResult['rabaisTotal'] =0;
        $pTotal=$sousTotal+ $sousTotal*($POURCENTAGE_DE_TAXES);
        $aResult['PrixTotal'] =round($pTotal, 2) ;
    }

   



   
    echo json_encode($aResult);

?>