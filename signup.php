<?php
require_once('includes/header.php');
?>
<!-- Corps de la page -->
<!-- Container du formulaire d'incription-->
<div id="containerSignup" class="container mt-2">


    <h1 class="h1 text-center textLogin mt-2">Devenir membre</h1>

    <form class="needs-validation " name="form1" id="form1" onsubmit='return validatePassword1()'
        action="signup_action.php" method="POST">
        <script>
        function validatePassword1() {
            let passwd = $('#passInsc').val();
            let passwdConf = $('#passConf').val();
            // tester votre regex sur https://regex101.com/

            var pattern = /^[A-Za-z\d_-]{8,10}$/;

            // alert("mdp= " + passwd + " conf= " + passwdConf);
            if (pattern.test(passwd) == true) {
                // alert("mdp ok");
                $('#message1').html('Valide').css('color', 'green');
                if (passwd == passwdConf) {
                    $('#message2').html('Valide').css('color', 'green');
                    return true;
                } else
                    $('#message2').html('Non valide').css('color', 'red');
                return false;
            } else
                $('#message1').html('Non valide').css('color', 'red');
            return false;
        }

        function f1() {
            let checkbox = $('#invalidCheck1');
            if (checkbox.prop("checked") == true) {
                alert("checkbox is checked");
                return true;
            } else if (checkbox.prop("checked") == false) {
                alert("checkbox is not checked");
                return false;
            }
        }
        </script>
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
                <!-- <label class="form-label">Sexe</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="homme" checked>
                    <label class="form-check-label" for="radioHomme">
                        Homme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="femme">
                    <label class="form-check-label" for="radioFemme">
                        Femme
                    </label>
                </div> -->
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

        <!-- row 3 -->
        <div class="row mt-1">
            <div class="form-group col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <!-- row 4 -->
        <div class="row mt-1">
            <div class="form-group col-md-6">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="passInsc" name="passInsc" required>
                <span id="message1" name="message1"></span>
            </div>
            <div class="form-group col-md-6">
                <script>
                $('#passInsc').on('keyup', function() {
                    var pattern = /^[A-Za-z\d_-]{8,25}$/;
                    if (pattern.test($('#passInsc').val()) == true) {
                        $('#message1').html('Valide').css('color', 'green');
                    } else
                        $('#message1').html('Non valide').css('color', 'red');
                });
                </script>
                <label for="passwordConfirm" class="form-label">Confirmez le mot de passe</label>
                <input type="password" class="form-control" id="passConf" name="passConf" required>
                <span id="message2" name="message2"></span>
            </div>
        </div>
        <script>
        $('#passConf').on('keyup', function() {
            if ($('#passInsc').val() == $('#passConf').val()) {
                $('#message2').html('Matching').css('color', 'green');
            } else
                $('#message2').html('Not Matching').css('color', 'red');
        });
        </script>
        <div class="row mt-3">
            <div class="col-12 col-sm-6 mb-2">
                <div class="card align-items-center card-perso card-hover text-white bg-secondary cardLogin ">
                    <div class="card-body">
                        <h5 class="card-title"> Abonnement Gratuit </h5>
                        <ul>
                            <li>Blogs créés par des passionés du fitness</li>
                            <li>Des entrainements préselectionés </li>
                            <li>Des produits pour faciliter la #fitnessLife</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <div class="card align-items-center card-perso card-hover text-white bg-info cardLogin ">
                    <div class="card-body">
                        <h5 class="card-title"> Abonnement Premium </h5>
                        <ul>
                            <li>Tous les avantages de l'abonnement gratuit</li>
                            <li>Un suivis de vos buts et objectifs </li>
                            <li>La possibilité de personnaliser vos entrainements</li>
                        </ul>
                    </div>
                </div>
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
        <div class="form-group col-12 mt-3">
            <button type="submit" id="btnSignup" class="btn btn-success">Confirmer</button>
        </div>
    </form>
</div>


<?php
require_once('includes/footer.php');
?>