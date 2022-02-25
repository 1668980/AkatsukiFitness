<?php
require_once('includes/header.php');
require_once('includes/auth_check.php')
?>

<?php
//TODO: avoir le type de muscle ou entrainement de plus et duree entrainement
//$var_value = $_POST['identrainement'];
$entrainement = $crud->getEntrainementByIdEntrainement('1');
$text = '';
foreach($entrainement as $training){
    $idEntrainement = $training['identrainement'];
    $nom = $training['nom'];
    $status = $training['status'];
    $difficulte = $training['difficulte'];
    $type = $training['type'];
    //$duree = $training['duree'];
    
//function getEntrainements($nomEntrainement){
    $text .= '<div class="container w-100 ">
                <div class="col-sm-4">
                        <div class="card mb-3 card-perso" style="max-width: auto; max-height: 100% " href="#">
                            <div class="card-body">
                                <h4 class="card-title"> '.$nom .' </h4>


                                ';
                            }

                                echo $text;

                                $dureeEntrainement = $crud->getEntrainementDuration('1');
                                $text2 = '';
                                $text2 .='<h6 class="card-subtitle mb-2 text-muted">Durée de lentrainement: ' . $dureeEntrainement .  ' minute(s)<br /> Muscles visés: '.$type .' </br> Difficulté: '.$difficulte .' </h6>
                            </div>
                        </div>
                    </div>
                </div>';
            echo $text2;
?>

<main >
<!--
    <div class="container w-100 ">
        <div class="col-sm-4">
                <div class="card mb-3 card-perso" style="max-width: auto; max-height: 100% " href="#">
                    <div class="card-body">
                        <h4 class="card-title"> Titre exercice <?php // echo $row['nom'] ?> </h4>
                        <h6 class="card-subtitle mb-2 text-muted">Durée de l'entrainement: <?php // echo $row['duree'] ?> <br /> Muscles visés </h6>
                    </div>
                </div>
            </div>
        </div>
-->

<?php 
 //$exerciseList= $crud->getExercicesFromEntrainement(1);
 //$entainementList = $crud->getEntrainementsByIdUser($_SESSION['userid']);
 //for( $i =0;$i<1;$i++){
 //   echo getEntrainementByIdEntrainement($entainementList[$i]['nom']);
 //}

 //$result = $crud->getExercicesFromEntrainement(1);

 //echo $result[0]["nom"];
 

?>


<?php

//$link = mysqli_connect("sql5.freesqldatabase.com", "sql5472123", "kkplchz5zV", "sql5472123");

//$query = mysqli_query($link,"SELECT * FROM `entrainementexercice` INNER JOIN exercice ON entrainementexercice.idexercice = exercice.idexercice 
//INNER JOIN `exercicecatalogue` ON `exercice`.`idexercicecatalogue` =`exercicecatalogue`.`idexercicecatalogue` ");// "select * from exercice");
//while ( $row = mysqli_fetch_array($query) ) :
//$query = mysqli_query($link, "select idexercice from entrainementexercice where identrainement = 1");
$exercice = $crud->getExercicesFromEntrainement('1');
$details = '';
foreach($exercice as $training){
    $idExercice = $training['idexercice'];
    //$idCatalogue = $training['idcatalogue'];
    $status = $training['status'];
    $poids = $training['poids'];
    $reps = $training['repetitions'];
    $sets = $training['sets'];
    $duree = $training['duree'];
    $dureepause = $training['dureepause'];
    $nom = $training['nom'];

    $details .= '<div class ="row">
                    <div class="col-md-4">
                        <div class="card">
                            <h4 class="card-header">
                                <div class="ChangeButtonC">
                                    <label>
                                        <h1> '.$nom .' </h1>    
                                        <button class="btn-primary" >
                                            <span class="seatButton"> Exercice complété </span>
                                        </button>
                                    </label>
                                </div>
                            </h4>
                            <div class="card-body">Sets : '.$sets .' <br/> Répétitions : '.$reps .' </br> Repos entre sets : '.$dureepause .'  </div>
                            <div class="card-footer"> Poids : '.$poids .'</div>
                        </div>
                    </div>
                </div>
                ';
}
echo $details;
?>


   <!--
         <div class ="row">
             <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header">
                        <div class="ChangeButtonC">
                            <label>
                                <button class="btn-primary" id="btn1" href='" . $GET["id"] . "' onclick="document.getElementById('btn1').style.background='green'">
                                        
                                            <?php
                                            //$crud->setExerciceStatusComplete("")
                                            ?>
                                    <span class="seatButton"> Exercice complété </span>
                                </button>
                            </label>
                        </div>
                    </h4>
                    <div class="card-body">Sets : <?php //echo $row['sets']?> <br/> Répétitions : <?php //echo $row['repetitions'] ?> </br> Repos entre sets : <?php //echo $row['dureepause'] ?> </div>
                    <div class="card-footer"> Poids : <?php //echo $row['poids']?></div>
                </div>
            </div>
         </div> -->
    </main>

<?php
//endforeach;
?>
            <div class="card-group container-fluid">
            <div class="row">
            <div class="ChangeButtonC">
                            <label>

                            <?php 
                                if(isset($_POST['btn2'])){
                                    $crud->setEntrainementStatusComplete('1');
                                    //echo "this button is selected";
                                }
                                if(isset($_POST['btn3'])){
                                    $crud->setEntrainementStatusComplete('1');
                                    //echo "this button is selected";
                                }
                                if(isset($_POST['btn3'])){
                                    $crud->setEntrainementStatusComplete('1');
                                    //echo "this button is selected";
                                }
                            
                                ?>
                                <form method="post">

                                <button class="btn-success" name="btn2" id="btn2" onclick="document.getElementById('btn2').style.background='green'">
                                       
                                    <span class="seatButton"> Fini </span>
                            </button>
                                    </label>
                                </div><div class="ChangeButtonC">
                                    <label>
                                <button class="btn-primary" id="btn3" onclick="document.getElementById('btn3').style.background='blue'">
                                        
                                    <span class="seatButton"> Pause </span>
                                </button>
                                    </label>
                                </div><div class="ChangeButtonC">
                                    <label>
                                <button class="btn-danger" id="btn4" onclick="document.getElementById('btn4').style.background='red'">
                                       
                                    <span class="seatButton"> Abandonner </span>
                                </button>
                            </label>
                            </form>
                        </div>
            </div>
        </div>
    </div>
</main>


<?php
require_once('includes/footer.php');
?>