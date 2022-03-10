<?php

$landing_img = "images/about/guy-red-gloves-cropped.jpg";
$landing_title = "Blog";
$breadcrumb =[
    ["/", "Accueil"],
    ["blog.php", "Blog"],
    ["", "Article"]
];

require_once('includes/header.php');

$blog = null;
if (isset($_GET["idblog"])){
    $blog = $crud->getBlogByID($_GET['idblog'])[0]; 
}

echo $blog;
?>

<main class="bg-dark">
    <div class="container">
        <div class="card-group container-fluid ">
            <div class="card mt-3 mb-5">
                <div class="card-header text-center">
                    Article
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center "><?php echo utf8_encode($blog['titre']) ?></h4>
                    <div class="m-5">
                        <p><?php echo utf8_encode($blog['article']) ?></p>                        
                    </div>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
    </div>
</main>


<?php
require_once('includes/footer.php');
?>