<?php
require_once('includes/header.php');
require_once 'includes/auth_check.php';

$userid = $_SESSION['userid'];
$userInfo = $crud->getUser($userid);

$firstname = $userInfo['prenom'];
$lastname = $userInfo['nom'];
$email = $userInfo['email'];
$dob = $userInfo['date_de_naissance'];
$weight = $userInfo['poids'];

// var_export($userInfo);
// die();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    var_export($_POST);

    //TODO: le code qui update la DB;
    return;
}

?>

<main class="bg-dark">


    <div class="container w-50 ">
        <div class="card-group container-fluid ">

            <div class="card" style="width:500px;">
                <div class="card-body">
                    <h5 class="card-title">Modification de profil </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $firstname . ' ' . $lastname ?></h6>
                    <p class="card-text">
                    <ul style="list-style-type:none;">

                        <form autocomplete="off" method="POST" action="profile_edit.php">

                            <div class="row mb-3">
                                <label for="prenom" class="col-md-2 col-form-label">Prénom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="prenom" required="" value="<?php echo $firstname ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nom" class="col-md-2 col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nom" required="" value="<?php echo $lastname ?>">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label">Courriel</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" required="" value="<?php echo $email ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_de_naissance" class="col-md-2 col-form-label">Date de naissance</label>
                                <div class="col-sm-9">
                                    <input type="date"  class="form-control" name="date_de_naissance" required="" value="<?php echo $dob ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="poids" class="col-md-2 col-form-label">Poids</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="poid en lbs." class="form-control" name="date_de_naissance" required="" value="<?php echo $weight ?>">
                                </div>
                            </div>

                            <input type="button" value="Annuler" onclick="window.location.href='profile.php'">
                            <input type="submit" value="Sauvegarder">

                        </form>



                        <!--<li>Sexe :</li>-->

                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
require_once('includes/footer.php');
?>