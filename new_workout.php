<?php
$breadcrumb = [
    ["index.php", "Accueil"],
    ["", "Nouvel entrainement"],
];

require_once('includes/header.php');
require_once 'includes/session.php';
require_once 'db/Entrainement.php';
require_once 'db/Exercice.php';
require_once 'db/conn.php';
?>
<!-- Corps de la page -->
<!-- Container du formulaire d'incription-->
<div id="containerSignup" class="container mt-5 pt-5">

    <div class="card align-items-center mb-5 card-perso bg-danger bg-opacity-75 bg-gradiant">
        <p class="fs-1 fw-bold mt-5">Créer un entrainement </p>
        <form class="w-75 mt-4 mb-4 needs-validation ">
            <div style="display:block" id="div_trainingName">
                <div class="row mb-3">
                    <label for="trainingName" class="col-md-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="trainingName" name="trainingName" required>
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <button type="button" class="btn bg-success mt-4 mb-4 " onclick="lister()">Confirmer</button>
                </div>
            </div>
            <div style="display:none" id="div_exercices">
                
            </div>
        </form>
    </div>

    <!-- <h1 class="h1 text-center textLogin mt-5"> <span class="badge  bg-danger bg-gradiant badge-pill"> Créer un entrainement </span> </h1>

    <form class="needs-validation mt-4" name="newWorkoutForm" id="newWorkoutForm" method="POST" action="new_workout_action.php">
        row 1 -->
    <!-- <div class="row">
                <label for="trainingName" class="form-label">Nom de l'entrainement</label>
                <input type="text" class="form-control" id="trainingName" name="trainingName" required>
        </div> -->
    <!-- row 4 -->
    <!-- <div class="form-group col-12 mt-3  " id="confimTraining">
            <button type="submit" id="btnSignup" class="btn btn-success" onclick="afficherBtnAjout()">Confirmer</button>
        </div>
        <div class="form-group col-12 mt-3 " id="addExercice">
            <button type="button" id="btnAddExercice" class="btn btn-danger" onclick="lister()">Ajouter un exercice</button>
        </div>    
        <div id="donneesExo" class="form group col-12 mt-3">

        </div>
    </form>

    <div class="row mt-3" style="display:none" id="divTriage">
            
    </div>
    <div class="row mt-1"  id="div_exercices">
            
    </div> -->
</div>


<?php
require_once('includes/footer.php');
?>