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
<div id="containerSignup" class="container mt-2">

    <h1 class="h1 text-center textLogin mt-5"> <span class="badge  bg-danger bg-gradiant badge-pill"> Créer un entrainement </span> </h1>

    <form class="needs-validation mt-4" name="newWorkoutForm" id="newWorkoutForm" method="POST" action="new_workout_action.php">
        <!-- row 1 -->
        <div class="row">
                <label for="trainingName" class="form-label">Nom de l'entrainement</label>
                <input type="text" class="form-control" id="trainingName" name="trainingName" required>
        </div>
        <!-- row 4 -->
        <div class="form-group col-12 mt-3  " id="confimTraining">
            <button type="submit" id="btnSignup" class="btn btn-success" onclick="afficherBtnAjout()">Confirmer</button>
        </div>
        <div class="form-group col-12 mt-3 " id="addExercice">
            <button type="button" id="btnAddExercice" class="btn btn-danger" onclick="lister()">Ajouter un exercice</button>
        </div>    
        <div id="donneesExo" class="form group col-12 mt-3 d-none">

        </div>
    </form>

    <div class="row mt-3" style="display:none" id="divTriage">
            
    </div>
    <div class="row mt-1"  id="div_exercices">
            
    </div>
</div>


<?php
require_once('includes/footer.php');
?>