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
?>

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
                                $nom = $training['nom'];
                                $difficulte = $training['difficulte'];
                                $type = $training['type'];
                                // $duree = $training['duree'];
                                $rep .= '<div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;" onclick="workoutInProgress('.$idEntrainement.')">
                                            <div id="TCard'.$idEntrainement.'" class="card card-perso card-hover text-white border-0"  style="min-width:162px; min-height:185px;">
                                                <img src="images/training_bg/bg_2.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                                <div class="card-img-overlay bg-dark bg-opacity-25" >
                                                    <h4 class="card-title"> ' . $nom . '</h4>
                                                    <ul>
                                                        <li>' . $type . '</li>
                                                        <li>' . /*.$duree.*/ ' minutes </li>
                                                        <li>' . $difficulte. '</li>
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

                            $rep = '';
                            foreach ($listeEntrainement as $training) {
                                $idEntrainement = $training['identrainement'];
                                $nom = $training['nom'];
                                $difficulte = $training['difficulte'];
                                $type = $training['type'];
                                // $duree = $training['duree'];
                                $rep .= '<div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;" onclick="workoutInProgress('.$idEntrainement.')" >
                                            <div id="TCard'.$idEntrainement.'" class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                                <img src="images/training_bg/bg_2.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                                <div class="card-img-overlay bg-dark bg-opacity-25" >
                                                    <h4 class="card-title"> ' . $nom . '</h4>
                                                    <ul>
                                                        <li>' . $type . '</li>
                                                        <li>' . /*.$duree.*/ ' minutes </li>
                                                        <li>' . $difficulte. '</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>';
                            }
                            echo $rep;
                            ?>
                            <div class="col-md-4 mb-4" onclick="window.location.href='new_workout.php'" style="min-width:162px; min-height:185px;">
                                <div class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                    <img src="images/training_bg/bg_2.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                    <div class="card-img-overlay bg-dark bg-opacity-25 justify-content-center">
                                        <h4 class="card-title text-center"> <span class="badge badge-pill bg-black">Créer un entrainement</span></h4>
                                    </div>
                                </div>
                            </div>
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

                        <?php
                            $listeEntrainement = $crud->getEntrainementsCompletedByIdUser($_SESSION['userid']);

                            $rep = '';
                            foreach ($listeEntrainement as $training) {
                                $idEntrainement = $training['identrainement'];
                                $nom = $training['nom'];
                                $difficulte = $training['difficulte'];
                                $type = $training['type'];
                                // $duree = $training['duree'];
                                $rep .= '<div class="col-md-4 mb-4" style="min-width:162px; min-height:185px;">
                                            <div id="TCard'.$idEntrainement.'" class="card card-perso card-hover text-white border-0" style="min-width:162px; min-height:185px;">
                                                <img src="images/training_bg/bg_2.jpg" class="card-img" alt="..." style="min-width:162px; min-height:185px;">
                                                <div class="card-img-overlay bg-dark bg-opacity-25" >
                                                    <h4 class="card-title"> ' . $nom . '</h4>
                                                    <ul>
                                                        <li>' . $type . '</li>
                                                        <li>' . /*.$duree.*/ ' minutes </li>
                                                        <li>' . $difficulte. '</li>
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

<div id="toastTrainingOptions" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-body">
    Hello, world! This is a toast message.
    <div class="mt-2 pt-2 border-top">
      <button type="button" class="btn btn-primary btn-sm">Take action</button>
      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
    </div>
  </div>
</div>


<?php
require_once 'includes/footer.php';
?>