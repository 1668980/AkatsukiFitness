<?php

$breadcrumb =[
    ["index.php", "Accueil"],
    ["profile.php", "Mon profil"],
    ["", "Modification de profil"]
];
require_once('includes/header.php');
require_once 'includes/auth_check.php';

$userid = $_SESSION['userid'];
$userInfo = $crud->getUser($userid);

$firstname = $userInfo['prenom'];
$lastname = $userInfo['nom'];
$email = $userInfo['email'];
$dob = $userInfo['date_de_naissance'];
$weight = $userInfo['poids'];
$gender = $userInfo['sexe'];

// var_export($userInfo);
// die();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

   $user = new Utilisateur($_SESSION["userid"], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['dob'], $_POST['gender'],$_POST['weight']);
   $r= $crud->updateUserUtilisateurTableSansEmail($user);
  
   header('Location: profile.php');
   
    
    return;
}

?>

<main class="bg-dark">


    <div class="container w-50 text">
        <div class="card-group container-fluid ">

            <div class="card" style="width:500px;">
                <div class="card-body">
                    <h5 class="card-title"><?php __('profile_edit_title'); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $firstname . ' ' . $lastname ?></h6>
                    <p class="card-text">
                    <ul style="list-style-type:none;">

                        <form autocomplete="off" method="POST" action="profile_edit.php">

                            <div class="row mb-3">
                                <label for="prenom" class="col-md-2 col-form-label"><?php __('profile_edit_label_1'); ?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="firstname" required="" value="<?php echo $firstname ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nom" class="col-md-2 col-form-label"><?php __('profile_edit_label_2'); ?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lastname" required="" value="<?php echo $lastname ?>">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-2 col-form-label"><?php __('profile_edit_label_3'); ?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" required="" value="<?php echo $email ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_de_naissance" class="col-md-2 col-form-label"><?php __('profile_edit_label_4'); ?></label>
                                <div class="col-sm-9">
                                    <input type="date"  class="form-control" name="dob" required="" value="<?php echo $dob ?>">
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0"><?php __('profile_edit_label_5'); ?></legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="0" <?php if ($gender == 0) { echo 'checked'; } ?>>
                                <label class="form-check-label" for="radioMale">
                                    <?php __('profile_gender_male'); ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender"  value="1" <?php if ($gender == 1) { echo 'checked'; } ?>>
                                <label class="form-check-label" for="radioFemelle">
                                    <?php __('profile_gender_female'); ?>
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gender"  value="2"  <?php if ($gender == 2) { echo 'checked'; } ?>>
                                <label class="form-check-label" for="radioAutre">
                                    <?php __('profile_gender_other'); ?>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                            <div class="row mb-3">
                                <label for="poids" class="col-md-2 col-form-label">Poids</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="poid en lbs." class="form-control" name="weight" required="" value="<?php echo $weight ?>">
                                </div>
                            </div>

                            <div class="align-right mt-4">
                                <input type="button" class="btn" value="<?php __('profile_edit_btn_cancel'); ?>" onclick="window.location.href='profile.php'">
                                <input type="submit" class="btn btn-success" value="<?php __('profile_edit_btn_save'); ?>">
                            </div>



                        </form>



                  

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