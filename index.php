<?php
require_once('includes/header.php');
?>

<body>
    <!--Menu de navigation-->
    <header class="p-2 bg-info text-white">
        <div class="d-flex flex-wrap align-items-center ms-5 justify-content-center justify-content-lg-start">
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
                    <div class="col-sm-4">
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
                    <!-- Redirection vers la page d'inscription -->
                    <div class="col-sm-8">
                        <button type="button" id="btnSignup" name="" class="btn btn-danger" onclick="window.location.href='devenirMembre.html';">Devenir membre</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Corps de la page -->
    <main class="bg-dark">
        <!-- Caroussel faisant défiler différents articles ou entrainemnts (peut être amélioré)-->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <div class="container mt-5 " style="max-height: 400px; max-width: 1050px">
                        <div class="card bg-dark text-white" style="max-height: 400px; max-width: 1050px">
                            <img src="images/blogs/b_01.jpg" class="d-block" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Build strength with unique exercises and explosive workout</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/blogs/b_01.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>9 Basic Tips To Lose Weight In About 3-4 Weeks</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Nice-to-Know Facts About Flexibility and Stretching</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Container de cartes pour les articles, entrainemnts ou recettes (contenu) -->
        <div class="container mt-5">
            <div class="card-group container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card mb-3 " style="max-width: 540px; height: 135px" href="#">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="client/public/images/Sweet Girl.jpg" class="img-fluid rounded-start img-shadow" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">Sweet Girl <i class="text-muted">(2021)</i> </h4>
                                        <h6 class="card-subtitle mb-2 text-muted">18/08/2021 (US) <br /> Action, Thriller, Drame &#9830 1h 50m</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mb-3 card-hover" style="max-width: 540px; height: 135px"  href="#">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="client/public/images/Spider Man.jpg" class="img-fluid rounded-start img-shadow" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">Spider-Man : Far From Home <i class="text-muted">(2019)</i> </h4>
                                        <h6 class="card-subtitle mb-2 text-muted">02/07/2019 (CA)<br />Action, Aventure, Science-Fiction &#9830 2h 9m</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mb-3 card-hover" style="max-width: 540px; height: 135px"  href="#">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="client/public/images/Candy Man.jpg" class="img-fluid rounded-start img-shadow" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">Candyman <i class="text-muted">(2021)</i> </h4>
                                        <h6 class="card-subtitle mb-2 text-muted"> 27/08/2021 (CA)<br />Horreur, Thriller &#9830 1h 31m</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mb-3 card-hover" style="max-width: 540px; height: 135px"  href="#">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="client/public/images/S.O.Z. Soldiers or Zombies.jpg" class="img-fluid rounded-start img-shadow" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">S.O.Z. Soldiers or Zombies <i class="text-muted">(2021)</i> </h4>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            6 août 2021 <br />Drame Science-Fiction & Fantastique &#9830 31m </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mb-3 card-hover" style="max-width: 540px; height: 135px" href="#">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="client/public/images/Jolt.jpg" class="img-fluid rounded-start img-shadow" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">Jolt<i class="text-muted">(2021)</i> </h4>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            15/07/2021 (AE) <br /> Action, Comédie &#9830 1h 31m </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mb-3 card-hover" style="max-width: 540px; height: 135px"  href="#">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="client/public/images/The Divine Fury.jpg" class="img-fluid rounded-start img-shadow" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">The Divine Fury <i class="text-muted">(2019)</i> </h4>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            31/07/2019 (KR) <br /> Action, Horreur &#9830 2h 9m
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

<?php
require_once('includes/footer.php');
?>