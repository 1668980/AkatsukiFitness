<?php
$carousel = true;
$skip_container = true;
require_once('includes/header.php');
?>
<div class="container-welcome">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1><?php __('index_welcome_title'); ?></h1>
                <p><?php __('index_welcome_text'); ?></p>
            </div>
            <div class="col-lg-4 align-self-center">
                <button class="btn btn-success" type="button" style="width:100%;" onclick="window.location.href='signup.php'"><?php __('index_btn'); ?></button>
            </div>
        </div>

    </div>
</div>

<div class="container-our-plans">
    <div class="container">

        <h1>Découvrez nos plans</h1>
        <p>Choisissez le plan qui vous convient le mieux.</p>
        <div class="row mt-3">
            <div class="col-12 col-sm-6 mb-2">
                <div class="card align-items-center card-perso">
                    <div class="card-body">
                        <h5 class="card-title">Abonnement Gratuit</h5>
                        <ul>
                            <li>Accès à l'achats de produits Akatsuki Fitness</li>
                            <li>Accédez à nos plans d'entraînements</li>
                            <li>Créez jusqu'à <?php echo Crud::MAX_WORKOUT_FREE ?> plans d'entraînements personnalisés</li>
                            <li>Toujours gratuit :)</li>
                        </ul>
                        <button class="btn btn-success" type="button" style="width:100%;" onclick="window.location.href='signup.php?membership=free'"><?php __('index_btn_free'); ?></button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <div class="card align-items-center card-perso card-premium">
                    <div class="card-body">
                        <h5 class="card-title">Abonnement Premium</h5>
                        <ul>
                            <li>Tous les avantages de l'abonnement gratuit</li>
                            <li>Un suivis de vos buts et objectifs </li>
                            <li>Sans limite de plans d'entraînements personnalisés</li>
                            <li>À partir de 6.99$</li>
                        </ul>
                        <button class="btn btn-success" type="button" style="width:100%;" onclick="window.location.href='signup.php?membership=premium'"><?php __('index_btn_premium'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <p>Vous hésitez entre nos plans? <a href="membership_plans.php">Voir nos plans en détail</a>.</p>
        </div>

    </div>

</div>




<?php
require_once('includes/footer.php');

?>