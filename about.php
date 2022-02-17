<?php

$landing_img = "images/blogs/b_01.jpg";
$breadcrumb =[
    ["/", "Accueil"],
    ["/AkatsukiFitness/about.php", "À propos de nous"]
];

require_once('includes/header.php');
?>

<div>
    <section id="landing">landing pic goes here</section>
</div>



<div class="container">


    <div class="container">
    
        <div class="row mb-2">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-0 align-self-center">
                <img src="images/blogs/b_01.jpg" class="img-fluid rounded mx-auto d-block" alt="...">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                <h4 class="title">Subtitle</h4> 
                <p class="text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at purus accumsan, iaculis turpis vitae, accumsan urna. 
                    Aliquam tempus tincidunt metus, quis dapibus odio pellentesque non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque mi odio, porta eget euismod sed, 
                    tempus mollis ex. Donec ornare tincidunt felis ut volutpat. 
                </p>
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                
                    <h4 class="title">Subtitle</h4>
                    <p class="text">
                        Nullam vulputate dui enim, ut dignissim massa faucibus eu. Nulla nec diam efficitur nunc faucibus imperdiet. Mauris rutrum libero ut eros commodo consequat. 
                        Praesent viverra quam felis, non suscipit ligula auctor in. Aliquam massa risus, ultricies rhoncus ipsum ut, congue luctus arcu. Sed tempor quam sem, nec scelerisque 
                        augue lacinia eu. Fusce ornare vehicula convallis. Suspendisse at placerat urna.
                    </p>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-0 align-self-center">
                    <img src="images/about/p_team01.jpeg" class="img-fluid rounded mx-auto d-block" alt="...">
                </div>
            </div>
        </div>
    </div>




<div class="container w-50 ">
    <div class="card-group container-fluid ">
        <div class="card align-items-center mt-5 mb-5">
            <h1>Notre équipe</h1>
        </div>
    </div>

    <div class="card-group container-fluid ">

        <div class="card align-items-center mt-5 mb-5">
            <img src="images/blogs/b_01.jpg" class="rounded mx-auto d-block" alt="..." width="450" length="450">
        </div>

        <div class="card align-items-center mt-5 mb-5">
            <h3>En 2020, la pandemie nous a tous frappé. Beaucoup on dût arrêter de s'entrainer à cause de la
                fermeture des places d'entrainement. Donc, nous voulons rendre l'entrainement à la maison plus
                accessible et facile.
            </h3>
        </div>
    </div>

    <div class="card-group container-fluid ">
        <div class="card align-items-center mt-5 mb-5">
            <h3>Lancé en 2022, notre équipe est constituée de 6 programmeurs motivés
                à se remettre en forme, tout comme vous et nous voulons insiter les autres à l'entrainement.
                Nous vous offrons un système simple d'utilisation, mais très efficace. Avec notre suivi de poids
                et de statistique, vous allez atteindre votre but avec facilité et motivation.
            </h3>
        </div>

        <div class="card align-items-center mt-5 mb-5">
            <img src="images/about/p_team01.jpeg" class="rounded mx-auto d-block" alt="..." width="450" length="300">
        </div>
    </div>


    <?php
require_once('includes/footer.php');
?>