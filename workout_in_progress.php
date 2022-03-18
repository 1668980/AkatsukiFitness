<?php
require_once('includes/header.php');
require_once('includes/auth_check.php')

?>
<head>
<style>
.wrapper {
    text-align: center;
    position: relative;
}
.button {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 70% 
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
button{
    border-radius: 10px; 
}

.flex-parent {
  display: flex;
}

.jc-center {
  justify-content: center;
}

button.margin-right {
  margin-right: 100px;
}

.buttonPlay, .buttonReset {
  cursor: pointer;
  background: transparent;
  padding: 0;
  border: none;
  margin: 0;
  outline: none;
}

#playButton {
  display: block;
}

#pauseButton {
  display: none;
}
</style>
<main>
<?php

$idEntrainementChoisi = $_GET['id_training'];
$entrainement = $crud->getEntrainementByIdEntrainement($idEntrainementChoisi);

$exercice2 = $crud->getExercicesFromEntrainement($idEntrainementChoisi);


$text = '';
foreach($entrainement as $training){
    $idEntrainement = $training['identrainement'];
    $nom = $training['nom'];
    $status = $training['status'];
    $difficulte = $training['difficulte'];
    $type = $training['type'];

    $text .= '
                <div class="card mb-3 card-perso d-flex p-2 bd-highlight" style="margin-top:60px">
                            <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h1 class="card-title text-center mx-auto w-100"> '.$nom .' </h1>
                                    

                <div class="stopwatch">
                <div class="circle">
                    <span class="time" id="display">00:00:00</span>
                </div>

                    <div class="controls">
                        <button class="buttonPlay">
                            <img id="playButton" src="https://res.cloudinary.com/https-tinloof-com/image/upload/v1593360448/blog/time-in-js/play-button_opkxmt.svg"/>

                            <img  id="pauseButton" src="https://res.cloudinary.com/https-tinloof-com/image/upload/v1593360448/blog/time-in-js/pause-button_pinhpy.svg"/>
                        </button>
                        </br>
                        <button class="buttonReset">
                            <img id="resetButton" src="https://res.cloudinary.com/https-tinloof-com/image/upload/v1593360448/blog/time-in-js/reset-button_mdv6wf.svg"/>
                        </button>
                        </div>
                    </div>
                </div>

                
                                ';
                            }

                                echo $text;

                                $dureeEntrainement = $crud->getEntrainementDuration($idEntrainementChoisi);
                                
                                $text2 = '';
                                $text2 .='<h6 class="card-subtitle mb-2 text-muted">Durée de lentrainement: ' . $dureeEntrainement .  ' minute(s)<br /> Muscles visés: '.$type .' </br> Difficulté: '.$difficulte .' </h6>
                            
                    ';
                    if(isset($_POST['commencerButton'])){
                        $crud->setEntrainementStatusInProgress($idEntrainementChoisi);
                        //echo "this button is selected";
                    }
            echo $text2;
?>


<div class="card-group">
<?php

$idEntrainementChoisi = $_GET['id_training'];
$exercice = $crud->getExercicesFromEntrainement($idEntrainementChoisi);
$details = '';
$idExercice = 0;
$nbExercice = COUNT($exercice);
$nbExerciceComplete = 0;

foreach($exercice as $training1){
    $statusEx = $training1['status'];
    if($statusEx == 1){
        $nbExerciceComplete++;
    }
}

$count1 = $nbExerciceComplete / $nbExercice;
$count2 = $count1 * 100;
$count = number_format($count2, 0);

$details2 = '

        </div>  
        <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="'.$nbExerciceComplete.'
                aria-valuemin="0" aria-valuemax="'.$nbExercice.'" style="width:'.$count.'%">
                '
                .$count.'%
            </div>
        </div>

        
    </div>  
    <form method="post">
    
    <div class="flex-parent jc-center">
            <button class="btn-primary" name="commencerButton">Commencer l\'exercice</button>

            
           
    ';
    echo $details2;
?>
</br>
        <div class="ChangeButtonC">
                <button class="btn-primary" name="btn3" id="btn3" onclick=workoutPause(); href="workouts.php">
                    <span class="seatButton"> Pause </span>
                </button>
        </div>
</div>
        <!-- <button class="btn-primary">Modifier</button> -->
    </form>

<?php
foreach($exercice as $training){
    $idExercice = $training['idexercice'];
    $statusExercice = $training['status'];
    $poids = $training['poids'];
    $reps = $training['repetitions'];
    $sets = $training['sets'];
    $duree = $training['duree'];
    $dureepause = $training['dureepause'];
    $nom = $training['nom'];
    $image = $training['image'];

    $details .= '

    
                    <div class="col-md-4">
                        <div class="card mb-3 card-perso d-flex p-2 bd-highlight" style="margin-top:15px">
                            <h4 class="card-header">
                                <div class="ChangeButtonC">
                                    <label>
                                        <h1> '.$nom .' </h1>    
                                    </label>
                                </div>
                            </h4>
                            <div class="card-body">Sets : '.$sets .' <br/> Répétitions : '.$reps .' </br> Repos entre sets : '.$dureepause .' sec. </br> Poids : '.$poids .' lbs.  <img src="'.$image.' "alt="..." class="card-img-bottom"> </img> </div>
                            <div class="card-footer">
                            
                            
                            <form action="update_exercice.php" method="POST">
                           
                           <input hidden name="idExercice" value="'. $idExercice.'">
                           <input hidden name="idEntrainement" value="'.$idEntrainementChoisi.'">
                           <input hidden name="poids" value="'. $poids.'">
                           <input hidden name="reps" value="'. $reps.'">
                           <input hidden name="sets" value="'. $sets.'">
                           <input hidden name="duree" value="'. $duree.'">
                           <input hidden name="dureepause" value="'. $dureepause.'">
                            <button typde="submit">Modifier</button>
                            
                            </form>';
                                if($statusExercice==1){

                                    $details .='
                                    <form method="post" action="workout_in_progress_action.php">
                                    <input hidden name="idExercice" value="'.$idExercice.'"> 
                                    <input hidden name="idEntrainement" value="'.$idEntrainementChoisi.'"> 
                                    <input hidden name="action" value="0"> 
                                    <button type="submit" class="btn-primary" name="btn'.$idExercice.''.$statusExercice.'" id="btn'.$idExercice.''.$statusExercice.'">
                                    <span class="seatButton"> Incompléter Exercice </span>
                                </button>';
                                }else{
                                    $details .='
                                    <form method="post" action="workout_in_progress_action.php">
                                    <input hidden name="idExercice" value="'.$idExercice.'"> 
                                    <input hidden name="idEntrainement" value="'.$idEntrainementChoisi.'"> 
                                    <input hidden name="action" value="1"> 
                                    <button type="submit" class="btn-primary" name="btn'.$idExercice.''.$statusExercice.'" id="btn'.$idExercice.''.$statusExercice.'">
                                    <span class="seatButton"> Compléter Exercice </span>
                                </button>';
                                }
                                
                                $details .= '
                                </form>
                            </div>
                        </div>
                </div>
                ';

                
}

echo $details;


?>

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
                                
                                
                                </div>
                                
                                
                            </label>
                            </form>
                            </div>
                            </div>
                            </div>
                            <form method="post">
                                <div class="wrapper">
                                <button class="btn-success" name="btn2" id="btn2" onclick="document.getElementById('btn2').style.background='green'">
                                       
                                    <span class="seatButton" > Finir l'exercice </span>
                                </button>
                                    </label>
                            </div>
                            <form method="post">
                                <form action="workouts.php" >
                                    <div class="wrapper">
                                            <label>
                                        <button class="btn-danger" name="btn4" id="btn4">
                                            
                                            <span class="seatButton"> Abandonner exercice</span>
                                        </button>
                                </form>
                            </form>
                                </div>
    </div>
    
</div>
<script src="js/script.js"></script>
</main>


<?php
require_once('includes/footer.php');
include('includes/modal_update_exercice.php')
?>