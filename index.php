<?php

$carousel=true;

require_once('includes/header.php');
// if(isset($_GET['loggedin'])){
//     echo '<script> alert("need to be logged in!") </script>';
// }
?>

<div class="container">
    <div class="row mt-3">
                <div class="col-12 col-sm-6 mb-2">
                    <div class="card align-items-center card-perso card-hover card-selectable ">
                        <div class="card-body">
                            <h5 class="card-title"> Abonnement Gratuit </h5>
                            <ul>
                                <li>Blogs créés par des passionés du fitness</li>
                                <li>Des entrainements préselectionés </li>
                                <li>Des produits pour faciliter la #fitnessLife</li>
                            </ul>
                            <button class="btn btn-success" type="button" style="width:100%;" onclick="window.location.href='signup.php?membership=free'"><?php __('index_btn'); ?></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mb-2">
                    <div class="card align-items-center card-perso card-hover card-selectable">
                        <div class="card-body">
                            <h5 class="card-title"> Abonnement Premium </h5>
                            <ul>
                                <li>Tous les avantages de l'abonnement gratuit</li>
                                <li>Un suivis de vos buts et objectifs </li>
                                <li>La possibilité de personnaliser vos entrainements</li>
                            </ul>
                            <button class="btn btn-success" type="button" style="width:100%;" onclick="window.location.href='signup.php?membership=premium'"><?php __('index_btn'); ?></button>
                        </div>
                    </div>
                </div>
            </div>

</div>

    
    <div style="width:40%; margin: 0 auto;">
        <button class="btn btn-success" type="button" style="width:100%;" onclick="window.location.href='signup.php'"><?php __('index_btn'); ?></button>
</div>
        

<?php 
require_once('includes/footer.php');

?>