<?php


$landing_img = "images/about/guy-red-gloves-cropped.jpg";
$landing_title = "Forfaits d'abonnement";
$skip_container = true;
$breadcrumb = [
    ["index.php", "Accueil"],
    ["", "Forfaits d'abonnement"]
];

require_once('includes/header.php');
?>

<div class="membership-intro">
    <h1>Trouvez votre forfait parfait</h1>
    <p>Nous offrons multiples choix d'abonnement selon vos besoins</p>

</div>

<div class="membership-container">
    <div class="row mt-3">
        <div class="col-12 col-sm-6 mb-2">
            <div class="card align-items-center card-perso">
                <div class="card-body">
                    <h5 class="card-title">Abonnement Gratuit</h5>
                    <p>Le plan d'abonnement idéal pour avoir accès à nos entraînements sur mesure. Vous aurez accès à nos services de base et <strong>vous pourriez créer et personnaliser
                            jusqu'à <?php echo Crud::MAX_WORKOUT_FREE ?> plans d'entraînements</strong>. Visitez notre blog pour des trucs et astuces.</p>
                    <p>Ce plan est toujours <strong>gratuit</strong>!</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 mb-2">
            <div class="card align-items-center card-perso card-premium">
                <div class="card-body">
                    <h5 class="card-title">Abonnement Premium</h5>
                    <p>Le plan premium vous donne accès à <strong>tous</strong> les services d'Akatsuki Fitness! Ce plan vous permet de créer et
                        personnaliser un <strong>nombre illimité de templates d'entraînements</strong> et de faire un <strong>suivit de vos buts et objectifs</strong>. Aussi, profitez de <strong>5% de rabais sur tous les articles de la boutique</strong>.
                    </p>
                    <p>À partir de <strong>6.99$</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <p><a href="signup.php">Inscrivez-vous</a> pour avoir accès à nos entraînements!</p>
        <p>Déja membre? <a href="workouts.php">Connectez-vous</a></p>
    </div>




</div>
<?php
require_once('includes/footer.php');
?>