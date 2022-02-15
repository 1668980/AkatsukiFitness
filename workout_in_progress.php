<?php
require_once('includes/header.php');
require_once('includes/auth_check.php')
?>

<?php
//TODO: avoir le type de muscle ou entrainement de plus et duree entrainement
function getEntrainementInfo($nomEntrainement){
    $details = "";
    return '<div class="container w-100 ">
                <div class="col-sm-4">
                        <div class="card mb-3 card-perso" style="max-width: auto; max-height: 100% " href="#">
                            <div class="card-body">
                                <h4 class="card-title"> '.$nomEntrainement .' </h4>
                                <h6 class="card-subtitle mb-2 text-muted">Durée de lentrainement: <br /> Muscles visés </h6>
                            </div>
                        </div>
                    </div>
                </div>';
}

?>

<head>
    
    <link rel="stylesheet" href="style-workoutprogress.css">
</head>
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
 $exerciseList= $crud->getExercicesFromEntrainement(1);
 $entainementList = $crud->getEntrainementByIdUser($_SESSION['userid']);
 for( $i =0;$i<1;$i++){
    echo getEntrainementInfo($entainementList[$i]['nom']);
 }

?>


<?php

$link = mysqli_connect("sql5.freesqldatabase.com", "sql5472123", "kkplchz5zV", "sql5472123");

$query = mysqli_query($link, "select * from exercice where idexercice=1");
while ( $row = mysqli_fetch_array($query) ) :

?>


    <?php //for ($x = 1; $x <= 4; $x++) : ?>
         <div class ="row">
             <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header">
                        <div class="ChangeButtonC">
                            <label>
                                <button class="btn-primary" id="btn1" onclick="document.getElementById('btn1').style.background='green'">
                                        <!--     <span class="seatButton">
                                                Exercice complété
                                            <a href="show.php" class="btn btn-primary">Exercice complété</a>

                                            </span>-->
                                    <span class="seatButton"> Exercice complété </span>
                                </button>
                            </label>
                        </div>
                    </h4>
                    <div class="card-body">Sets : <?php echo $row['sets']?> <br/> Répétitions : <?php echo $row['repetitions'] ?> </br> Repos entre sets : <?php echo $row['dureepause'] ?> </div>
                    <div class="card-footer"> Poids : <?php echo $row['poids']?></div>
                </div>
            </div>
         </div>
    <?php //endfor; ?>
    </main>

<?php
endwhile;
?>
        <div class="card-group container-fluid">
        <div class="row">

</div>
</div>
    </div>
</main>


<?php
require_once('includes/footer.php');
?>