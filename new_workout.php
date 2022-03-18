<?php
$breadcrumb = [
    ["index.php", "Accueil"],
    ["workouts.php", "Entraînements"],
    ["", "Nouvel entrainement"],
];

require_once('includes/header.php');
require_once 'includes/session.php';
require_once 'db/Entrainement.php';
require_once 'db/Exercice.php';
require_once 'db/conn.php';
?>

<div id="containerSignup" class="container mt-2 ">

    <div class="card align-items-center card-perso bg-danger bg-opacity-75 bg-gradiant">
        <p class="fs-1 fw-bold mt-2" id="titreF">Créer un entrainement </p>
        <form class="w-75 mt-2 mb-4 needs-validation " method="POST" action="new_workout_action.php" onsubmit='return validateExo()'>
            <div style="display:block" id="div_trainingName">
                <div class="row mb-3">
                    <label for="trainingName" class="text-center">Nommez votre entrainement</label>
                    <input type="text" class="form-control mt-2" id="trainingName" name="trainingName" required>
                    <div class="valid-feedback">
                        Jolie nom!
                    </div>
                </div>
                <div class="row mb-3" id="btn_lister">
                    <button type="button" class="btn btn-success mt-2 align-items-center" onclick="afficherListeExo()">Suivant</button>
                    <a href="workouts.php" class="btn btn-secondary mt-2 align-items-center">Annuler</a>
                </div>
            </div>
            <div style="display:none" id="div_exercicesglob">
                <div class=" row  ">
                    <small id="confirm_workout_creation_notice" class="text-center"> Veuillez ajouter au moins 1 exercice</small>
                        <button type="submit" id="confirm_workout_creation"  class="btn btn-success align-items-center mt-2">Confirmer</button>
                        <a href="workouts.php" class="btn btn-secondary align-items-center mt-2">Annuler</a>
                </div>
                <div class=" row m-2 align-items-center">
                    <div class="col-sm-4">
                        <div class="dropdown">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="max-width:80px">
                                Trier
                            </a>
                            <?php
                            $listeCat = $crud->ListExercicesCategories();
                            $rep = '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                            foreach ($listeCat as $cat) {
                                $rep .= '<li><a class="dropdown-item" onclick="listerParCat(' . $cat['idcategorie'] . ')">' . $cat['nom'] . '</a></li>';
                            }
                            echo $rep;
                            ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <input type="text" class="form-control " id="rcText">
                    </div>
                    <div class="col-sm-4 justify-content-end">
                        <button type="button" class="btn btn-success ms-3" onclick="rechercher(document.getElementById('rcText').value)">Rechercher</button>
                    </div>
                </div>
                <div class="container row m-2" id="div_exercices">

                </div>



            </div>
            <div id="donneesExo" class="form group col-12 mt-3 d-none"></div>
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