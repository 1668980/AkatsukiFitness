<?php
$breadcrumb =[
    ["index.php", "Accueil"],
    ["", "Choix du plan"]
];

$membership = $_GET['membership'];
if(!$membership) { 
    $membership = 'free';
}

require_once('includes/header.php');
?>

<div id="containerSignup" class="container container-signup mt-2">

<h1>Inscription</h1>
<h4>Étape 1: Choisissez votre plan </h3>


        <div class="row mt-3">
            <div class="col-12 col-sm-6 mb-2">
                <div id="freecard" class="card align-items-center card-perso card-hover card-selectable card-membership
                <?php if ($membership == 'free') { ?>
                   card-selectable-selected 
                <?php } ?>
                " data-membership="free">
                    <div class="card-body">
                        <h5 class="card-title">Abonnement Gratuit</h5>
                        <ul>
                            <li>Accès à l'achats de produits Akatsuki Fitness</li>
                            <li>Accédez à nos plans d'entraînements</li>
                            <li>Créez jusqu'à <?php echo Crud::MAX_WORKOUT_FREE ?> plans d'entraînements personnalisés</li>
                            <li>Toujours gratuit :)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <div class="card align-items-center card-perso card-hover card-selectable card-membership
                <?php if ($membership == 'premium') { ?>
                   card-selectable-selected 
                <?php } ?>
                
                " data-membership="premium">
                    <div class="card-body">
                        <h5 class="card-title">Abonnement Premium </h5>
                        <ul>
                        <li>Tous les avantages de l'abonnement gratuit</li>
                            <li>Un suivis de vos buts et objectifs </li>
                            <li>Sans limite de plans d'entraînements personnalisés</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div id="step1b"
        <?php if ($membership != 'premium') { ?>
            style="display:none;"
        <?php } ?>
        >
            <hr>
            <h4>Étape 1.2: Choisissez votre type de plan premium</h3>
            <div class="row premium-plans">
                            
                <div class="col-sm-12 col-md-4 card-selectable premium-months card-selectable-selected" data-months=1>
                    1 mois: <strong><?php __('membership_price_1') ?>$</strong>/mois
                </div>

                <div class="col-sm-12 col-md-4 card-selectable premium-months" data-months=3>
                    3 mois: <strong><?php __('membership_price_3') ?>$</strong> 
                    <small>Économisez 1$ par mois! (5.99/mois)</small>
                </div>

                <div class="col-sm-12 col-md-4 card-selectable premium-months" data-months=6>
                    6 mois: <strong><?php __('membership_price_6') ?>$</strong> 
                    <small>Économisez: recevez un mois gratuit<small>
                </div>

            </div>
        </div>

        <div class="mt-4">
            <a id="nexturl" class="btn btn-success" onclick="nexturl();">Continuer</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    
    const DEFAULT_MONTHS=1;
    const DEFAULT_MEMBERSHIP="<?php echo $membership ?>";

    window.selected_months=DEFAULT_MONTHS;
    window.selected_membership=DEFAULT_MEMBERSHIP;

    $(".card-membership").click(function() { 
    
        $('.card-membership').removeClass('card-selectable-selected');
        $(this).addClass('card-selectable-selected');
        
        window.selected_membership = $(this).data('membership');

        if (selected_membership=='premium') { 
            $("#step1b").show();

        } else { 
            $("#step1b").hide();
        }

    });


     $(".premium-months").click(function() { 
    
        $('.premium-months').removeClass('card-selectable-selected');
        $(this).addClass('card-selectable-selected');
        
        window.selected_months = $(this).data('months');

        if (selected_membership=='premium') { 
            $("#step1b").show();

        } else { 
            $("#step1b").hide();
        }

    });



    function nexturl() { 


        var next_step_url = 'signup_step2.php';

        next_step_url += '?membership='+window.selected_membership;
            if (window.selected_months != undefined && window.selected_membership == 'premium') {
                next_step_url += '&months='+window.selected_months;    
            }
            
            window.location.href=next_step_url; 
    }

</script>

<?php
require_once('includes/footer.php');
?>