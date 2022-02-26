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
    
    <h1 class="h1 text-center textLogin mt-5">  <span class="badge  bg-danger bg-gradiant badge-pill"> Créer un entrainement </span> </h1>

    <form class="needs-validation mt-4" name="newWorkoutForm" id="newWorkoutForm" method="POST" action="new_workout_action.php">
        <!-- row 1 -->
        <div class="row mt-1">
            <div class="form-group col-12">
                <label for="trainingName" class="form-label">Nom de l'entrainement</label>
                <input type="text" class="form-control" id="trainingName" name="trainingName" required>
            </div>
        </div>
        <!-- row 4 -->
        <div class="row mt-1">
            <div class="form-group col-6">
                <label for="trainingType" class="form-label">Type </label>
                <input type="text" class="form-control" id="trainingType" name="trainingType" required>
            </div>
            <div class="form-group col-6">
                <label for="trainingDifficulty" class="form-label">Difficulté </label>
                <input type="text" class="form-control" id="trainingDifficulty" name="trainingDifficulty" required>
            </div>
        </div>
        <div class="form-group col-12 mt-3  " id="confimTraining">
            <button type="submit" id="btnSignup" class="btn btn-success">Confirmer</button>
        </div>
        <div class="form-group col-12 mt-3 d-none" id="addExercice">
            <button type="button" id="btnSignup"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exercicesModal">Ajouter un exercice</button>
        </div>
        <div class="row mt-1" id="div_exercices" style="display:none">

        </div>
    </form>
</div>

<div class="modal fade" id="exercicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden='true'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exercices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow-y:inherit !important;">
                <form action="sortCategorie.php" class="form-inline my-2 my-lg-0" id="formTrierCatEx">
                    <select name="exerciceCat" id="exerciceCat" class="btn btn-outline-black my-2 my-sm-0 mb-3">
                        <?php

                        $liste = $crud->ListExercicesCategories();
                        $rep = '';
                        // if (count($liste) > 0) {
                        foreach ($liste as $row) {
                            $rep .= '<option value="' . ($row["idcategorie"]) . '">' . ($row["nom"]) . '</option>';
                        }
                        // }
                        echo $rep;
                        ?>
                    </select>
                    <input type="submit" class="btn btn-outline-danger my-2 my-sm-0" id="Cat" value="Trier">
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Image</th>
                            <th scope="col">Image</th>
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
                        foreach ($listExercises as $ex) {
                            $rep .= '<tr>';
                            $rep .= '<td>' . $ex['nom'] . '</td>';
                            $rep .= '<td>' . $crud->getNameOfCat($ex['idcategorie']) . '</td>';
                            $rep .= '<td> <img src="' . $ex['image'] . '" alt="..." class="img-thumbnail"> </img> </td>';
                            $rep .= '<td> <form action="ajoutExerciceforNewWorkout.php" method="POST"> 
                                            <input type="text" name="exerciceID" id="exerciceID" style="display:none" readonly> </input>
                                            <button type="submit" id="btnAjoutEx" class="btn btn-success">Ajouter</button>
                                    </td>';
                            $rep .= '</tr>';
                        }
                        // foreach ($listeVoyages as $voyage) {
                        //     $rep .= '<tr>';
                        //     $rep .= '<td>' . $voyage['code'] . '</td>';
                        //     $rep .= '<td>' . $voyage['depart'] . '</td>';
                        //     $rep .= '<td>' . $voyage['destination'] . '</td>';
                        //     $rep .= '<td>' . $voyage['transporteur'] . '</td>';
                        //     $rep .= '</tr>';
                        // }
                        echo $rep;
                        ?>

                    </tbody>
                </table>
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