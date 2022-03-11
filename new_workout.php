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
        <div class="row mt-1">
            <div class="form-group col-12">
                <label for="trainingName" class="form-label">Nom de l'entrainement</label>
                <input type="text" class="form-control" id="trainingName" name="trainingName" required>
            </div>
        </div>
        <!-- row 4 -->
        <div class="form-group col-12 mt-3  " id="confimTraining">
            <button type="button" id="btnSignup" onclick="afficherBtnAjout()" class="btn btn-success">Ajouter exercices</button>
        </div>
        <div class="form-group col-12 mt-3 " id="addExercice">
            <button type="submit" id="btnAddExercice" class="btn btn-danger" disabled="true">Confirmer</button>
        </div>
    </form>
</div>
<div class="row mt-3" style="display:none" id="divTriage">
    
</div>
<div class="row mt-1" id="div_exercices">

</div>
<div class="container mt-2 bg-white w-50 d-none" id="listExerciceChoisis">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rep = "";
            $listExercises;
            if (isset($_GET['sortCatId'])) {
                $listExercises = $crud->ListExercicesParCategories($_GET['sortCatId']);
            } else {
                $listExercises = $crud->getExercicesCatalogue();
            }
            ?>

        </tbody>
    </table>
</div>

<div class="modal fade" id="exercicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden='true'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exercices choisis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow-y:inherit !important;">
                <div id="listeExercices" name="listeExercices">

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
require_once('includes/footer.php');
?>