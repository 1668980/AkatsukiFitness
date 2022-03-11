<?php
require_once('includes/header.php');
require_once('includes/auth_check.php')
//Rajouter une bar de progression avec bootstrap!!!!! Chaque exercice monte la bar

?>
<head>
<style>
.wrapper {
    text-align: center;
}
.button {
    position: absolute;
    top: 50%;
}
</style>
<main>
<?php

$idEntrainementChoisi = $_GET['id_training'];
$entrainement = $crud->getEntrainementByIdEntrainement($idEntrainementChoisi);

$exercice2 = $crud->getExercicesFromEntrainement($idEntrainementChoisi);
$idExercice2 = 0;


$text = '';
foreach($entrainement as $training){
    $idEntrainement = $training['identrainement'];
    $nom = $training['nom'];
    $status = $training['status'];
    $difficulte = $training['difficulte'];
    $type = $training['type'];
    //$duree = $training['duree'];
    
//function getEntrainements($nomEntrainement){
    $text .= '
                        <div class="card mb-3 card-perso d-flex p-2 bd-highlight" >
                            <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h2 class="card-title text-center mx-auto w-100"> '.$nom .' </h2>
                                    <button class="btn-primary">Modifier</button>
                                </div>
                                ';
                            }

                                echo $text;

                                $dureeEntrainement = $crud->getEntrainementDuration($idEntrainementChoisi);
                                
                                $text2 = '';
                                $text2 .='<h6 class="card-subtitle mb-2 text-muted">Durée de lentrainement: ' . $dureeEntrainement .  ' minute(s)<br /> Muscles visés: '.$type .' </br> Difficulté: '.$difficulte .' </h6>
                            
                    ';
            echo $text2;
?>


<div class="card-group">
<?php

$idEntrainementChoisi = $_GET['id_training'];
$exercice = $crud->getExercicesFromEntrainement($idEntrainementChoisi);
$details = '';
$idExercice = 0;

$details2 = '
        </div>  
        <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70
                aria-valuemin="0" aria-valuemax="100" style="width:70%">
                    70%
            </div>
        </div>
    </div>  ';
    echo $details2;

foreach($exercice as $training){
    $idExercice = $training['idexercice'];
    //$idCatalogue = $training['idcatalogue'];
    $statusExercice = $training['status'];
    $poids = $training['poids'];
    $reps = $training['repetitions'];
    $sets = $training['sets'];
    $duree = $training['duree'];
    $dureepause = $training['dureepause'];
    $nom = $training['nom'];
   // $idExercice++;

    $details .= '

    
                    <div class="col-md-4">
                        <div class="card">
                            <h4 class="card-header">
                                <div class="ChangeButtonC">
                                    <label>
                                        <h1> '.$nom .' </h1>    
                                        <form method="post">
                                        ';
                                        if($statusExercice==1){
                                            $details .='<button type="submit" class="btn-primary" name="btn'.$idExercice.''.$status.'" id="btn'.$idExercice.''.$status.'">
                                            <span class="seatButton"> Exercice complété </span>
                                        </button>';
                                        }else{
                                            $details .='<button type="submit"class="btn-primary" name="btn'.$idExercice.''.$status.'" id="btn'.$idExercice.''.$status.'">
                                            <span class="seatButton"> Exercice incomplete </span>
                                        </button>';
                                        }
                                        
                                        $details .= '
                                        </form>
                                    </label>
                                </div>
                            </h4>
                            <div class="card-body">Sets : '.$sets .' <br/> Répétitions : '.$reps .' </br> Repos entre sets : '.$dureepause .'  </div>
                            <div class="card-footer"> Poids : '.$poids .'</div>
                        </div>
                </div>
                ';

                
}
//TODO: Ameliorer avec getExerciceStatus et fix le bug qu'il faut cliquer 2 fois sur le bouton.
if(isset($_POST['btn'.$idExercice.'0']) || isset($_POST['btn'.$idExercice.'1'])){
    if($statusExercice==0){     
        $crud->setExerciceStatusComplete($idExercice);
    }else{
        $crud->setExerciceStatusIncomplete($idExercice);
    }

}
if($statusExercice == 1){
echo "statusExercice 1 ";
}
echo $details;


?>
</div>
    </main>

            <div class="card-group container-fluid">
            <div class="row">
            <div class="ChangeButtonC">
                            <label>

                            <?php 

                            $idEntrainementChoisi = $_GET['id_training'];

                            
                                if(isset($_POST['btn2'])){
                                    $crud->setEntrainementStatusComplete($idEntrainementChoisi);
                                    //echo "this button is selected";
                                }
                                if(isset($_POST['btn3'])){
                                    $crud->setEntrainementStatusIncomplete($idEntrainementChoisi);
                                    //echo "this button is selected";
                                }
                                if(isset($_POST['btn4'])){
                                    $crud->setEntrainementStatusIncomplete($idEntrainementChoisi);
                                    //echo "this button is selected";
                                    $exercice = $crud->getExercicesFromEntrainement($idEntrainementChoisi);
                                    foreach($exercice as $training){
                                        $status = $training['status'];
                                    }
                                    $status = 0;
                                }
                            
                                ?>
                                
                                <form method="post">
                                <button class="btn-success" name="btn2" id="btn2" onclick="document.getElementById('btn2').style.background='green'">
                                       
                                    <span class="seatButton"> Fini </span>
                                </button>
                                    </label>
                                </div>
                                <div class="ChangeButtonC">
                                    <label>
                                <button class="btn-primary" name="btn3" id="btn3" onclick="document.getElementById('btn3').style.background='blue'" href="/workouts.php">
                                    <span class="seatButton"> Pause </span>
                                </button>
                                    </label>
                                </div>
                                
                            </label>
                            </form>
                            </div>
                            </div>
                            </div>
                            <form method="post">
                            <div class="wrapper">
                                    <label>
                                <button class="btn-danger" name="btn4" id="btn4" onclick="document.getElementById('btn4').style.background='red'">
                                       
                                    <span class="seatButton"> Abandonner exercice</span>
                                </button>
                            </div>
                            </form>
    </div>
</main>


<?php
require_once('includes/footer.php');
?>