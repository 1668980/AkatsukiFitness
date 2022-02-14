<?php
require_once('includes/header.php');
require_once 'includes/auth_check.php';


$userid = $_SESSION['userid'];
$userInfo = $crud->getUser($userid);

$firstname = $userInfo['prenom'];
$lastname = $userInfo['nom'];
$email = $userInfo['email'];
$dob = $userInfo['date_de_naissance'];
$sexe = $userInfo['sexe'];
$weight = $userInfo['poids'];
$weight_goal = "123";

// var_export($userInfo);
// die();

?>

<main class="bg-dark">

    <div class="container w-50 ">
        <div class="card-group container-fluid ">

            <div class="card align-items-center mt-5 mb-5">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profil</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="goals-tab" data-bs-toggle="tab" data-bs-target="#goals" type="button" role="tab" aria-controls="home" aria-selected="true">Mes objectifs</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <?php require_once('vue/profile_tab.php'); ?>
                    <?php require_once('vue/profile_goals_tab.php'); ?>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
require_once('includes/footer.php');
?>