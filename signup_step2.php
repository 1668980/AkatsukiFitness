<?php

$breadcrumb =[
    ["index.php", "Accueil"],
    ["signup.php", "Choix du plan"],
    ["", "Inscription"]
];

require_once('includes/header.php');

 $membership = $_GET['membership'];

 if (isset($_GET['months'])) { 
    $price = __val('membership_price_'.$_GET['months']);
    $price = (float) $price;
    $price_with_taxes = round($price + ($price*0.15), 2);
    }

?>

<!-- Corps de la page -->
<!-- Container du formulaire d'incription-->
<div id="containerSignup" class="container mt-2">

    <h1 class="h1 textLogin mt-2">Inscription</h1>

    
    <h3>Étape 2: Vos informations</h3>
    <h5>Détail du plan choisi: <?php __('membership_'.$membership); ?></h5>

    <?php 
        if($membership=='premium'){ ?>
         <p>Durée: <?php echo $_GET['months']; ?> mois</p>
         <p>Prix: <?php echo $price ?> $</p>

         <?php 
        }
    ?>
    <p><a href="signup.php">Modifier le plan</a></p>
  
    

   
    

    <form class="needs-validation " name="form1" id="form1" onsubmit='return validatePassword1()'
        action="signup_action.php" method="POST">


        <input type="hidden" name="membership_months" value="<?php if (isset($_GET['months'])) { echo $_GET['months']; }  else { echo '0'; } ?>">
        <!-- row 1 -->
        <div class="row">
            <div class="form-group col-md-6 mt-1">
                <label for="firstname" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group col-md-6 mt-1">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <!-- row 2 -->
        <div class="row mt-1">
            <div class="form-group col-6">
                <label class="form-label">Sexe</label>
                <select name="gender" class="form-select" aria-label="">
                    <option value="0">Homme</option>
                    <option value="1">Femme</option>
                    <option value="2">Autre</option>
                </select>

            </div>
            <div class="form-group col-6">
                <label for="birthDate" class="form-label">Date de naissance</label>
                <div class="col">
                    <input type="date" class="form-control" id="dob" name="dob" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-1">
            <div class="form-group col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="row mt-1">
            <div class="form-group col-md-6">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="passInsc" name="passInsc" required>
                <span id="message1" name="message1"></span>
            </div>
            <div class="form-group col-md-6">

                <label for="passwordConfirm" class="form-label">Confirmez le mot de passe</label>
                <input type="password" class="form-control" id="passConf" name="passConf" required>
                <span id="message2" name="message2"></span>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" name="invalidCheck1"
                    required>
                <label class="form-check-label" for="invalidCheck1"> Acceptez les <a href="#">Termes et
                        conditions</a> </label>
                <div class="invalid-feedback">
                    Vous devez acceptez les T&C avant de continuer.
                </div>
            </div>
        </div>


        <?php
        if ($membership == 'premium') {
        ?>
                 <div class="card bg-danger text-white rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Méthode de paiment</h5>
                                    <img src="images/avatars/<?php echo $avatar?>.png" class="img-fluid rounded-3"
                                        style="width: 45px;" alt="Avatar">
                                </div>

                                <!-- <p class="small mb-2">Nous acceptons</p> -->
                                <a href="#!" type="submit" class="text-white"><i
                                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                <a href="#!" type="submit" class="text-white"><i
                                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                                <a href="#!" type="submit" class="text-white"><i
                                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                <div class="mt-4">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                            placeholder="Cardholder's Name" />
                                        <label class="form-label" for="typeName">Cardholder's Name</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                            placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                        <label class="form-label" for="typeText">Card Number</label>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="text" id="typeExp" class="form-control form-control-lg"
                                                    placeholder="MM/YYYY" size="7" id="exp" minlength="7"
                                                    maxlength="7" />
                                                <label class="form-label" for="typeExp">Expiration</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="password" id="typeText"
                                                    class="form-control form-control-lg"
                                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                    maxlength="3" />
                                                <label class="form-label" for="typeText">Cvv</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Subtotal</p>
                                    <p class="mb-2"><?php echo $price ?> $</p>
                                </div>



                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-2">Total(Incl. taxes)</p>
                                    <p class="mb-2"><?php echo $price_with_taxes ?> $</p>
                                </div>

                              
                            </div>
                        </div>
        <?php
        }
        ?>



        <div class="form-group col-12 mt-3">
            <button type="submit" id="btnSignup" class="btn btn-success">Confirmer</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(".card-selectable").click(function() { 
        $('.card-selectable').removeClass('ccard-selectable-selected');
        $(this).addClass('card-selectable-selected');
            });


</script>

<?php
require_once('includes/footer.php');
?>