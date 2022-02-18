<?php
$breadcrumb =[
    ["index.php", "Accueil"],
    ["", "Entraînements"]
];

require_once('includes/header.php');
require_once 'includes/auth_check.php';

// function getFlipBox($nomEntrainement, $listExercise, $lienImage, $buttonText, $color) {
//     $details = "";
//     foreach($listExercise as $value) { $details .= '<li>'.$value .' </li>';  }
//     return '<div class="workout flip-box-container" style="--hue: '.$color.'">
//                 <div class="workout flip-box">

//                     <div class="workout box-front">
//                         <figure>
//                         <div class="workout img-bg"></div>
//                         <img src="'.$lienImage .'" alt="'.$nomEntrainement .'">
//                         <figcaption>'.$nomEntrainement .'</figcaption>
//                         </figure>            
//                         <ul>'.$details.'</ul>
//                     </div>

//                     <div class="workout box-back">
//                         <figure>
//                         <div class="workout img-bg"></div>
//                         <img src="'.$lienImage .'" alt="'.$nomEntrainement .'">
//                         </figure>

//                         <button>'.$buttonText.'</button>

//                         <div class="workout design-container">
//                         <span class="workout design design--1"></span>
//                         <span class="workout design design--2"></span>
//                         <span class="workout design design--3"></span>
//                         <span class="workout design design--4"></span>
//                         <span class="workout design design--5"></span>
//                         <span class="workout design design--6"></span>
//                         <span class="workout design design--7"></span>
//                         <span class="workout design design--8"></span>
//                         </div>
//                     </div>        
//                 </div>
//             </div>'; 
// }


?>



<!-- <div class="workout">
    
        <div class="workoutInProgress">        
            <div class="card align-items-center mt-5 mb-5 bg-dark" style="display:inline-flex; border-radius: 25px;">
                <div class="row row-cols-1" style="width:100%;">
                    <div class="col panel" style="width:100%;align-items: center;background-color:gray;font-size: 24px; padding:15px; border-radius: 25px 25px 0px 0px;">En Progression</div>                    
                    <?php
                    // $exerciseList= $crud->getExercicesFromEntrainement(1);
                    // $entainementList = $crud->getEntrainementByIdUser($_SESSION['userid']);
                    // for( $i =0;$i<count($entainementList);$i++){
                    //     echo getFlipBox($entainementList[$i]['nom'], array($exerciseList[0]['nom'],"100 pushups","100 squats", "10km de course"), "images/workouts/OnePunchMan.jpg", "Completer", 200);
                    // }
                    ?>
                   
                   
                    <?php //echo getFlipBox($exerciseList[0]['poids'], array("100 situps","100 pushups","100 squats", "10km de course"), "images/workouts/OnePunchMan.jpg", "Completer", 200); 
                    ?> 
                    <?php //echo getFlipBox("One Punch Man", array("100 situps","100 pushups","100 squats", "10km de course"), "images/workouts/OnePunchMan.jpg", "Completer", 100); 
                    ?>                                                            
                </div>             
            </div>
        </div>

        <div class="workoutChoix">
            <div class="card align-items-center mt-5 mb-5 bg-dark" style="display:inline-flex; border-radius: 25px;">
                <div class="row row-cols-1" style="width:100%;">
                    <div class="col-1" style="width:50%;display:inline-flex;background-color:gray;font-size: 24px; padding:15px; border-radius: 25px 0px 0px 0px;">
                        Entrainements Disponibles
                    </div>                    
                    <div class="col-1" style="width:50%;display:inline-flex;background-color:gray;font-size: 24px; padding:15px; border-radius: 0px 25px 0px 0px;justify-content: right;">
                        <button type="button" id="btnAjouterEntrainement" class="btn btn-success" style="background-color:green;" onclick="">Ajouter</button>
                    </div>
                    <?php
                    // $exerciseList= $crud->getExercicesFromEntrainement(1);
                    // $entainementList = $crud->getEntrainementByIdUser($_SESSION['userid']);
                    // for( $i =0;$i<count($entainementList);$i++){
                    //     echo getFlipBox($entainementList[$i]['nom'], array("100 situps","100 pushups","100 squats", "10km de course"), "images/workouts/OnePunchMan.jpg", "Completer", 200);
                    // }
                    ?>
                       
                </div>             
            </div>
        </div>

        <div class="workoutCompleter">
            <div class="card align-items-center mt-5 mb-5 bg-dark" style="display:inline-flex; border-radius: 25px;">
                <div class="row row-cols-1" style="width:100%;">
                    <div class="col panel" style="width:100%;background-color:gray;font-size: 24px; padding:15px; border-radius: 25px 25px 0px 0px;">Compléter</div>                    
                   </div>             
            </div>
        </div>
        
        </div> -->

<div class="accordion mt-5" id="accordionPanelsStayOpenExample">
    <div class="accordion-item border-0">
        <h2 class="accordion-header text-white" id="panelsStayOpen-headingOne">
            <button class="accordion-button bg-danger bg-gradient text-white " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                En cours
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show bg-dark" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <div class="container">
                    <div class="card-group container-fluid ">
                        <div class="row">
                            <div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                    <img src="images/training_bg/bg_1.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                    <div class="card-img-overlay bg-white bg-opacity-25">
                                        <h4 class="card-title"> Training complet </h4>
                                        <ul>
                                            <li>Tout le corps</li>
                                            <li>30 minutes</li>
                                            <li>Débutant </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                    <img src="images/training_bg/bg_1.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                    <div class="card-img-overlay bg-white bg-opacity-25">
                                        <h4 class="card-title"> Training complet </h4>
                                        <ul>
                                            <li>Tout le corps</li>
                                            <li>30 minutes</li>
                                            <li>Débutant </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                    <img src="images/training_bg/bg_1.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                    <div class="card-img-overlay bg-white bg-opacity-25">
                                        <h4 class="card-title"> Training complet </h4>
                                        <ul>
                                            <li>Tout le corps</li>
                                            <li>30 minutes</li>
                                            <li>Débutant </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item border-0">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button bg-danger bg-gradient text-white " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                Suggestions
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show bg-dark" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <div class="container">
                    <div class="card-group container-fluid ">
                        <div class="row">
                            <?php
                            $listeEntrainement= $crud->getEntrainements();
                            $rep = '';
                            foreach($listeEntrainement as $training){
                                $idEntrainement = $training['identrainement'];
                                $nom = $training['nom'];
                                $difficulte = $training['difficulte'];
                                $type = $training['type'];
                                $duree = $training['duree'];

                                $rep .= '<div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                            <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                                <img src="images/training_bg/bg_2.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                                <div class="card-img-overlay bg-dark bg-opacity-25">
                                                    <h4 class="card-title"> '.$nom .' </h4>
                                                    <ul>
                                                        <li>'.$type .'</li>
                                                        <li>'.$duree.' minutes </li>
                                                        <li>'.$difficulte.'</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>';
                            }
                            
                            echo $rep;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item border-0 ">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button bg-danger bg-gradient text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Complétés
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse bg-dark" aria-labelledby="panelsStayOpen-headingThree">
        <div class="accordion-body">
                <div class="container">
                    <div class="card-group container-fluid ">
                        <div class="row">
                            <div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                    <img src="images/training_bg/bg_3.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                    <div class="card-img-overlay bg-dark bg-opacity-25">
                                        <h4 class="card-title"> Training complet </h4>
                                        <ul>
                                            <li>Tout le corps</li>
                                            <li>30 minutes</li>
                                            <li>Débutant </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                    <img src="images/training_bg/bg_3.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                    <div class="card-img-overlay bg-dark bg-opacity-25">
                                        <h4 class="card-title"> Training complet </h4>
                                        <ul>
                                            <li>Tout le corps</li>
                                            <li>30 minutes</li>
                                            <li>Débutant </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                    <img src="images/training_bg/bg_3.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                    <div class="card-img-overlay bg-dark bg-opacity-25">
                                        <h4 class="card-title"> Training complet </h4>
                                        <ul>
                                            <li>Tout le corps</li>
                                            <li>30 minutes</li>
                                            <li>Débutant </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<?php
require_once('includes/footer.php');
?>