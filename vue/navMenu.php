<header class="p-2 bg-secondary text-white ">
        <div class="d-flex flex-wrap align-items-center ms-5 me-5 justify-content-center justify-content-lg-start">
            <!-- Logo  -->
            <a href="." class="">
                <img src="images/logo/logo2.png" class="img-fluid" alt="..." style="max-height: 60px">
            </a>

            <!-- À faire : mettre les éléments du menu et les boutons daans une div afin de faire un collapsable pour compatibilité mobile -->

            <!-- Items du menu -->
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 ms-4 justify-content-center mb-md-0">
                
                <li><a href="#" id="menuPrix" name="" class="nav-link px-2 text-white">Nos entrainements</a></li>
                <li><a href="#" id="menuFilms" name="" class="nav-link px-2 text-white">Articles de santé et bien-être</a></li>
                <li><a href="#" id="menuAbout" name="" class="nav-link px-2 text-white">À propos de nous</a></li>
                <li><a href="#" id="menuAbout" name="" class="nav-link px-2 text-white" onclick="window.location.href='blog.php';">Blog </a></li>
            </ul>

            <div class="text-end">
                <div class="row justify-content-center">
                    <!--  Dropdown pour le login (Peut être transformer en modal selon les besoins-->
                    <div class="col-sm-4">
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Se connecter
                            </button>
                            <form class="dropdown-menu" style="min-width: 25rem ;" action="login.php" method="POST">
                                <div class="mb-3 ms-3 me-3">
                                    <label for="email" class="form-label">Adresse email</label>
                                    <input type="email" class="form-control" id="courriel" name="email" placeholder="email@example.com" required>
                                </div>
                                <div class="mb-3 ms-3 me-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="pass" name="password" placeholder="Mot de passe" required>
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
                    <!-- Redirection vers la page d'inscription -->
                    <div class="col-sm-8">
                        <button type="button" id="btnSignup" name="" class="btn btn-danger" onclick="window.location.href='devenirMembre.php';">Devenir membre</button>
                    </div>
                </div>
            </div>
        </div>
    </header>