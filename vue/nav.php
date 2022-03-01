    <!-- pour des la couleur du text blanche : navbar-dark / noir : navbar-light -->
    <nav id="myNav" class="navbar navbar-expand-lg navbar-dark bg-danger bg-gradient">
        <div class="container-fluid">
            <a class="logo navbar-brand" href="index.php"><i class="bi bi-check2-circle"> </i>Akatsuki Fitness</a>
            <button id="toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="toggler" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav me-auto">
                    <a id="btnHome" href="index.php" class="nav-item nav-link">Accueil</a>
                    <a id="btnTrain" href="workouts.php" class="nav-item nav-link">Entraînements</a>
                    <a id="btnStore" href="shop_index.php" class="nav-item nav-link">Boutique</a>
                    <a id="btnAbout" href="about.php" class="nav-item nav-link">À propos de nous</a>
                    <a id="btnBlog" href="blog.php" class="nav-item nav-link">Blog</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <?php if(!isset($_SESSION['userid'])) { ?>
                    <button type="button" class="btn btn-outline-light bg-gradient" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Se connecter
                    </button>
                    <!-- <a href="login.php" class="nav-item nav-link">Se connecter</a> -->
                    <?php } else {
                        $userid = $_SESSION['userid'];
                        $userInfo = $crud->getUser($userid); ?>
                    <a id="btnBlog" href="profile.php" class="nav-item nav-link active">Bienvenue,
                        <?php echo $userInfo['prenom']?>!</a>
                    <a href="logout.php" class="nav-item nav-link">Se déconnecter</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </nav>