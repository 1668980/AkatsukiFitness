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
    //$duree = $training['duree'];
    
//function getEntrainements($nomEntrainement){
    $text .= '
                <div class="card mb-3 card-perso d-flex p-2 bd-highlight" >
                            <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h2 class="card-title text-center mx-auto w-100"> '.$nom .' </h2>
                                    <form method="post">
                                        <ul>
                                            <button class="btn-primary">Modifier</button>
                                            <button class="btn-primary" name="commencerButton">Commencer</button>
                                        </ul>
                                    </form>

                <div class="stopwatch">
                <div class="circle">
                    <span class="time" id="display">00:00:00</span>
                </div>

                    <div class="controls">
                        <button class="buttonPlay">
                            <img id="playButton" src="https://res.cloudinary.com/https-tinloof-com/image/upload/v1593360448/blog/time-in-js/play-button_opkxmt.svg"/>

                            <img  id="pauseButton" src="https://res.cloudinary.com/https-tinloof-com/image/upload/v1593360448/blog/time-in-js/pause-button_pinhpy.svg"/>
                        </button>
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
                                        
                                        ';
                                        if($statusExercice==1){

                                            $details .='
                                            <form method="post" action="workout_in_progress_action.php">
                                            <input hidden name="idExercice" value="'.$idExercice.'"> 
                                            <input hidden name="idEntrainement" value="'.$idEntrainementChoisi.'"> 
                                            <input hidden name="action" value="0"> 
                                            <button type="submit" class="btn-primary" name="btn'.$idExercice.''.$statusExercice.'" id="btn'.$idExercice.''.$statusExercice.'">
                                            <span class="seatButton"> Incomplété Exercice </span>
                                        </button>';
                                        }else{
                                            $details .='
                                            <form method="post" action="workout_in_progress_action.php">
                                            <input hidden name="idExercice" value="'.$idExercice.'"> 
                                            <input hidden name="idEntrainement" value="'.$idEntrainementChoisi.'"> 
                                            <input hidden name="action" value="1"> 
                                            <button type="submit" class="btn-primary" name="btn'.$idExercice.''.$statusExercice.'" id="btn'.$idExercice.''.$statusExercice.'">
                                            <span class="seatButton"> Complété Exercice </span>
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
// if(isset($_POST['btn'.$idExercice.'0']) || isset($_POST['btn'.$idExercice.'1'])){
//     if($statusExercice==0){     
//         $crud->setExerciceStatusComplete($idExercice);
//     }else{
//         $crud->setExerciceStatusIncomplete($idExercice);
        
//     }

//}
// if($statusExercice == 1){
// echo "statusExercice 1 ";
// }
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
    
</div>
<!-- <script src="js/script.js"></script> -->

<script type="text/javascript"> 
function timeToString(time) {
   
    let diffInHrs = time / 3600000;
    let hh = Math.floor(diffInHrs);
  
    let diffInMin = (diffInHrs - hh) * 60;
    let mm = Math.floor(diffInMin);
  
    let diffInSec = (diffInMin - mm) * 60;
    let ss = Math.floor(diffInSec);
  
    let diffInMs = (diffInSec - ss) * 100;
    let ms = Math.floor(diffInMs);
  
    let formattedMM = mm.toString().padStart(2, "0");
    let formattedSS = ss.toString().padStart(2, "0");
    let formattedMS = ms.toString().padStart(2, "0");
  
    return `${formattedMM}:${formattedSS}:${formattedMS}`;
  }
  
  // Declare variables to use in our functions below
  
  let startTime;
  let elapsedTime = 0;
  let timerInterval;
  
  // Create function to modify innerHTML
  
  function print(txt) {
    document.getElementById("display").innerHTML = txt;
  }
  
  // Create "start", "pause" and "reset" functions
  
  function start() {
    startTime = Date.now() - elapsedTime;
    timerInterval = setInterval(function printTime() {
      elapsedTime = Date.now() - startTime;
      print(timeToString(elapsedTime));
    }, 10);
    showButton("PAUSE");
  }
  
  function pause() {
    clearInterval(timerInterval);
    showButton("PLAY");
  }
  
  function reset() {
    clearInterval(timerInterval);
    print("00:00:00");
    elapsedTime = 0;
    showButton("PLAY");
  }
  
  // Create function to display buttons
  
  function showButton(buttonKey) {
    const buttonToShow = buttonKey === "PLAY" ? playButton : pauseButton;
    const buttonToHide = buttonKey === "PLAY" ? pauseButton : playButton;
    buttonToShow.style.display = "block";
    buttonToHide.style.display = "none";
  }
  // Create event listeners
  
  let playButton = document.getElementById("playButton");
  let pauseButton = document.getElementById("pauseButton");
  let resetButton = document.getElementById("resetButton");
  
  playButton.addEventListener("click", start);
  pauseButton.addEventListener("click", pause);
  resetButton.addEventListener("click", reset);
</script>
</main>


<?php
require_once('includes/footer.php');
?>