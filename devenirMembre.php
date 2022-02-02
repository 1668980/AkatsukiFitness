<?php
require_once('includes/header.php');
?>

<body>
    <!--Menu de navigation-->
    <header class="p-2 bg-info text-white">
        <div class="d-flex flex-wrap align-items-center ms-5 me-5 justify-content-center justify-content-lg-start">
            <!-- Logo  -->
            <a href="." class="">
                <img src="images/logo/logo2.png" class="img-fluid" alt="..." style="max-height: 60px">
            </a>

            <!-- À faire : mettre les éléments du menu et les boutons daans une div afin de faire un collapsable pour compatibilité mobile -->

            <!-- Items du menu -->
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 ms-4 justify-content-center mb-md-0">
                <li><a href="#" id="menuFilms" name="" class="nav-link px-2 text-white">Articles de santé et bien-être</a></li>
                <li><a href="#" id="menuPrix" name="" class="nav-link px-2 text-white">Nos entrainements</a></li>
                <li><a href="#" id="menuAbout" name="" class="nav-link px-2 text-white">À propos de nous</a></li>
            </ul>

            <div class="text-end">
                <div class="row justify-content-center">
                    <!--  Dropdown pour le login (Peut être transformer en modal selon les besoins-->
                    <div class="col">
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Se connecter
                            </button>
                            <form class="dropdown-menu" style="min-width: 25rem ;" action="serveur/connexion.php" method="POST">
                                <div class="mb-3 ms-3 me-3">
                                    <label for="email" class="form-label">Adresse email</label>
                                    <input type="email" class="form-control" id="courriel" name="courriel" placeholder="email@example.com" required>
                                </div>
                                <div class="mb-3 ms-3 me-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                                </div>
                                <div class="mb-3 ms-3 me-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberCheck">
                                        <label class="form-check-label" for="rememberCheck">
                                            Se souvenir de moi
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ms-3 me-3 mb-3">Se connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Corps de la page -->
    <main class="bg-dark">
        <!-- Container du formulaire d'incription-->
        <div class="container w-50 ">
        <div class="card-group container-fluid ">
            <div class="card align-items-center mt-5 mb-5" href="#">

                <p class="fs-1 fw-bold mt-5"> Devenir Membre</p>

                <form class="w-75 mt-4 mb-4 needs-validation " name="form1" id="form1" onsubmit='return validatePassword1()' action="enregistrer.php" method="POST">
                    <script>
                        function validatePassword1() {
                            let passwd = $('#passInsc').val();
                            let passwdConf = $('#passConf').val();
                            var pattern = /^[A-Za-z\d_-]{8,10}$/;

                            alert("mdp= " + passwd + " conf= " + passwdConf);
                            if (pattern.test(passwd) == true) {
                                alert("mdp ok");
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
                            } 
                            else if (checkbox.prop("checked") == false) {
                                alert("checkbox is not checked");
                                return false;
                            }
                        }
                    </script>

                    <div class="row mb-3">
                        <label for="nom" class="col-md-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioSexe" id="Male" value="male" checked>
                                <label class="form-check-label" for="radioMale">
                                    Homme
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioSexe" id="Femelle" value="femelle">
                                <label class="form-check-label" for="radioFemelle">
                                    Femme
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="radioSexe" id="Autre" value="autre">
                                <label class="form-check-label" for="radioAutre">
                                    Autre
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3 align-items-center">
                        <label for="birthDate" class="col-sm-2 col-form-label">Date de naissance</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="courriel" name="courriel" required>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="passInsc" name="passInsc" required>
                        </div>
                        <span id="message1" name="message1" class="col-sm-2"></span>
                    </div>
                    <script>
                        $('#passInsc').on('keyup', function() {
                            var pattern = /^[A-Za-z\d_-]{8,10}$/;
                            if (pattern.test($('#passInsc').val()) == true) {
                                $('#message1').html('Valide').css('color', 'green');
                            } else
                                $('#message1').html('Non valide').css('color', 'red');
                        });
                    </script>
                    <div class="row mb-3 align-items-center">
                        <label for="passwordConfirm" class="col-sm-3 col-form-label">Confirmez le Mot de passe</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="passConf" name="passConf" required>
                        </div>
                        <span id="message2" name="message2" class="col-sm-2"></span>
                    </div>
                    <script>
                        $('#passConf').on('keyup', function() {
                            if ($('#passInsc').val() == $('#passConf').val()) {
                                $('#message2').html('Matching').css('color', 'green');
                            } else
                                $('#message2').html('Not Matching').css('color', 'red');
                        });
                    </script>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" name="invalidCheck1" required>
                            <label class="form-check-label" for="invalidCheck1"> Acceptez les <a href="#">Termes et
                                    conditions</a> </label>
                            <div class="invalid-feedback">
                                Vous devez acceptez les T&C avant de continuer.
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 mb-4">Devenir Membre</button>
                </form>
            </div>
        </div>
        </div>
    </main>

</body>

<?php
require_once('includes/footer.php');
?>