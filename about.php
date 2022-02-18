<?php

$landing_img = "images/about/guy-red-gloves-cropped.jpg";
$landing_title = "À propos de nous";
$breadcrumb =[
    ["/", "Accueil"],
    ["", "À propos de nous"]
];

require_once('includes/header.php');
?>

<div class="container">


    <div class="container">
    
        <div class="row mb-2">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-0 align-self-center">
                <img src="images/blogs/b_01.jpg" class="img-fluid rounded mx-auto d-block" alt="...">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                <h4 class="title"><?php __('about_title1'); ?></h4> 
                <p class="text"><?php __('about_text1'); ?></p>
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                
                    <h4 class="title"><?php __('about_title2'); ?></h4>
                    <p class="text"><?php __('about_text2'); ?></p>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-0 align-self-center">
                    <img src="images/about/p_team01.jpeg" class="img-fluid rounded mx-auto d-block" alt="...">
                </div>
            </div>
        </div>
    </div>

    <?php
require_once('includes/footer.php');
?>