<?php
require_once('includes/header.php');
require_once 'includes/auth_check.php';

function getFlipBox($nomEntrainement, $listExercise, $lienImage, $buttonText, $color) {
    $details = "";
    foreach($listExercise as $value) { $details .= '<li>'.$value .' </li>';  }
    return '<div class="entrainement flip-box-container" style="--hue: '.$color.'">
                <div class="entrainement flip-box">

                    <div class="entrainement box-front">
                        <figure>
                        <div class="entrainement img-bg"></div>
                        <img src="'.$lienImage .'" alt="'.$nomEntrainement .'">
                        <figcaption>'.$nomEntrainement .'</figcaption>
                        </figure>            
                        <ul>'.$details.'</ul>
                    </div>
    
                    <div class="entrainement box-back">
                        <figure>
                        <div class="entrainement img-bg"></div>
                        <img src="'.$lienImage .'" alt="'.$nomEntrainement .'">
                        </figure>
                
                        <button>'.$buttonText.'</button>
                
                        <div class="entrainement design-container">
                        <span class="entrainement design design--1"></span>
                        <span class="entrainement design design--2"></span>
                        <span class="entrainement design design--3"></span>
                        <span class="entrainement design design--4"></span>
                        <span class="entrainement design design--5"></span>
                        <span class="entrainement design design--6"></span>
                        <span class="entrainement design design--7"></span>
                        <span class="entrainement design design--8"></span>
                        </div>
                    </div>        
                </div>
            </div>'; 
}


?>
<!-- ajouter un form si pour te guider vers une creation de compte ou log in -->
<main class="bg-dark">

<div class="container">
    <div class="entrainement">
    
        <div class="entrainementInProgress">        
            <div class="card align-items-center mt-5 mb-5 bg-dark" style="display:inline-flex; border-radius: 25px;">
                <div class="row row-cols-1" style="width:100%;">
                    <div class="col panel" style="width:100%;align-items: center;background-color:gray;font-size: 24px; padding:15px; border-radius: 25px 25px 0px 0px;">En Progression</div>                    
                    <?php
                   // $exerciseList= $crud->GetExercisesFromAnEntrainement(1);
                    $entainementList = $crud->GetEntrainementByIdUser($_SESSION['userid']);
                    for( $i =0;$i<count($entainementList);$i++){
                        $exerciseList= $crud->GetExercisesFromAnEntrainement($entainementList[$i]["idenidentrainementtra"]);
                        echo getFlipBox($entainementList[$i]['nom'], array($exerciseList[0]['nom'],"100 pushups","100 squats", "10km de course"), "images/entrainement/OnePunchMan.jpg", "Completer", 200);
                    }
                   ?>
                   
                   
                    <?php //echo getFlipBox($exerciseList[0]['poids'], array("100 situps","100 pushups","100 squats", "10km de course"), "images/entrainement/OnePunchMan.jpg", "Completer", 200); ?> 
                    <?php //echo getFlipBox("One Punch Man", array("100 situps","100 pushups","100 squats", "10km de course"), "images/entrainement/OnePunchMan.jpg", "Completer", 100); ?>                                                            
                </div>             
            </div>
        </div>

        <div class="entrainementChoix">
            <div class="card align-items-center mt-5 mb-5 bg-dark" style="display:inline-flex; border-radius: 25px;">
                <div class="row row-cols-1" style="width:100%;">
                    <div class="col-1" style="width:50%;display:inline-flex;background-color:gray;font-size: 24px; padding:15px; border-radius: 25px 0px 0px 0px;">
                        Entrainements Disponibles
                    </div>                    
                    <div class="col-1" style="width:50%;display:inline-flex;background-color:gray;font-size: 24px; padding:15px; border-radius: 0px 25px 0px 0px;justify-content: right;">
                        <button type="button" id="btnAjouterEntrainement" class="btn btn-success" style="background-color:green;" onclick="">Ajouter</button>
                    </div>
                    <?php
                    $exerciseList= $crud->GetExercisesFromAnEntrainement(1);
                    $entainementList = $crud->GetEntrainementByIdUser($_SESSION['userid']);
                    for( $i =0;$i<count($entainementList);$i++){
                        echo getFlipBox($entainementList[$i]['nom'], array("100 situps","100 pushups","100 squats", "10km de course"), "images/entrainement/OnePunchMan.jpg", "Completer", 200);
                    }
                   ?>
                       
                </div>             
            </div>
        </div>

        <div class="entrainementCompleter">
            <div class="card align-items-center mt-5 mb-5 bg-dark" style="display:inline-flex; border-radius: 25px;">
                <div class="row row-cols-1" style="width:100%;">
                    <div class="col panel" style="width:100%;background-color:gray;font-size: 24px; padding:15px; border-radius: 25px 25px 0px 0px;">Compléter</div>                    
                   </div>             
            </div>
        </div>
        
    </div>
</div>




<?php
require_once('includes/footer.php');
?>

</main>