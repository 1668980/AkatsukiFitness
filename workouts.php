<?php


$breadcrumb = [
    ["index.php", "Accueil"],
    ["", "Entraînements"],
];

require_once 'includes/header.php';
require_once 'includes/auth_check.php';
$isCreated = false;
if (isset($_GET['id'])) {
    echo '<script>
    $(document).ready(function(){
            $("#exerciceModal").modal(\'show\');
    });
    </script>';
}
$userid = $_SESSION['userid'];
$membership_details = $crud->membershipDetail($userid);

$entrainemnt_count = count($crud->getEntrainementsByIdUser($userid));

$new_workout_possible = '';
if ($membership_details['membership'] == 'free' && $entrainemnt_count >= Crud::MAX_WORKOUT_FREE) {
    $new_workout_possible = 'disabled';
}

?>

<div class="container workout-intro">
    <h1>Entraînements</h1>
    <h5>Passez à l'action!</h5>

    <div class="mt-5 text-center">
        <p>Découvrez nos entraînements fait sur mesure, modifiez-les à votre goût ou créez votre propre entraînement personnalisé.</p>

    </div>
    <hr>

    <div class="mx-auto" style="max-width: 800px;">


        <div class="row">
            <div class="col-md-6 text-center align-self-center">

                <?php
                if ($membership_details['membership'] == 'premium') {
                ?>
                    <p> En tant que membre premium vous pouvez créer autant d'entraînement personnalisé que vous voulez.</p>
                <?php
                } else {
                ?>
                    <p> En tant que membre gratuit vous pouvez créer jusqu'à un maximum de <?php echo  Crud::MAX_WORKOUT_FREE ?> entraînements personnalisé.</p>
                <?php
                }
                ?>

            </div>

            <div class="col-md-6 text-center align-self-center">

                <a href="new_workout.php" class="btn btn-success <?php echo $new_workout_possible ?> ">Créer un entrainement</a>

                <?php
                if ($new_workout_possible == 'disabled') {
                ?>
                    <p><small>Votre limite est atteinte.</small></p>
                <?php
                }
                ?>

            </div>
        </div>

    </div>




</div>

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
                            <?php
                            $listeEntrainement = $crud->getEntrainementsInProgressByIdUser($_SESSION['userid']);

                            $rep = '';
                            foreach ($listeEntrainement as $training) {
                                $idEntrainement = $training['identrainement'];
                                // $duree = $training['duree'];
                                $rep .= '<div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;" onclick="workoutInProgress(' . $idEntrainement . ')">
                                            <div id="TCard' . $idEntrainement . '" class="card card-perso card-hover text-white border-0"  style="min-width:162px; min-height:185px;">
                                                <img src="images/training_bg/bg_1.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                                <div class="card-img-overlay bg-dark bg-opacity-25 justify-content-center" >
                                                    <h4 class="card-title"> ' . $training['nom'] . '</h4>
                                                    <ul>
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
    <div class="accordion-item border-0">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button bg-danger bg-gradient text-white " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                Mes entrainements
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show bg-dark" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <div class="container">
                    <div class="card-group container-fluid ">
                        <div class="row">
                            <?php
                            $listeEntrainement = $crud->getEntrainementsByIdUser($_SESSION['userid']);
                            $listeExercice = array();
                            $rep = '';


                            foreach ($listeEntrainement as $training) {
                                $idEntrainement = $training['identrainement'];
                                $nom = $training['nom'];
                                $listeExercice = $crud->getExercicesFromEntrainement($training['identrainement']);
                                $exo1 = array('Exercice1', 'Exercice2', 'Exercice3');

                                // $duree = $training['duree'];
                                $rep .= '<div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;" onclick="workoutInProgress(' . $idEntrainement . ')" >
                                            <div id="TCard' . $idEntrainement . '" class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                                <img src="images/training_bg/bg_1.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                                <div class="card-img-overlay bg-dark bg-opacity-25 justify-content-center" >
                                                    <div class="row">
                                                    <h4 class="card-title text-center"> <span class="badge badge-pill bg-danger">' . $nom . '</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                            }
                            echo $rep;
                            ?>
                        </div>
                    </div>

                    <a href="new_workout.php" class="btn btn-success <?php echo $new_workout_possible ?>" style="min-width:100%">Créer un entraînement</a>
                    <?php
                    if ($new_workout_possible == 'disabled') {
                    ?>
                        <p class="text-center" style="color:#fff"><small>Votre limite est atteinte.</small></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item border-0 ">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button id="completedshow" class="accordion-button bg-danger bg-gradient text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Complétés
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse bg-dark" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
                <div class="container">
                    <div class="card-group container-fluid ">
                        <div class="row">
                            <?php
                            $listeEntrainement = $crud->getEntrainementsCompletedByIdUser($_SESSION['userid']);

                            $rep = '';
                            foreach ($listeEntrainement as $training) {
                                $idEntrainement = $training['identrainement'];
                                $nom = $training['nom'];
                                $difficulte = $training['difficulte'];
                                $type = $training['type'];
                                // $duree = $training['duree'];
                                $rep .= '<div class="col-md-4 mb-4" style="min-width:162px; min-height:185px; onclick="workoutInProgress(' . $idEntrainement . ')"> 
                                            <div id="TCard' . $idEntrainement . '" class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                                <img src="images/training_bg/bg_2.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                                <div class="card-img-overlay bg-dark bg-opacity-25" >
                                                    <h4 class="card-title"> ' . $nom . '</h4>
                                                    <ul>
                                                        <li>' . $type . '</li>
                                                        <li>' . /*.$duree.*/ ' minutes </li>
                                                        <li>' . $difficulte . '</li>
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
    <a id="completed"></a>

</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form action="new_workout.php" method="POST">
                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group col-12 mt-1">
                                <label for="name" class="form-label">Nom de l'entrainement</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->


<!-- Modal -->
<div class="modal fade" id="exerciceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden='true'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form action="new_workout.php" method="POST">
                    <?php
                    $exercices = $crud->getExercicesCatalogue();
                    foreach ($exercices as $ex) {
                        $nom = $ex['nom'];
                    ?>
                        <div class="container flex-row">
                            <p><?php echo $nom ?></p>
                            <button type="button" class="btn btn-success">Ajouter</button>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    if (window.location.hash == '#completed') {
        $("#panelsStayOpen-collapseOne").removeClass('show');
        $("#panelsStayOpen-collapseTwo").removeClass('show');
        $("#panelsStayOpen-collapseThree").addClass('show');
    }
</script>

<?php
require_once 'includes/footer.php';
?>