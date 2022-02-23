<?php
$landing_img = "images/shop/workout-tools.jpg";
$landing_title = "Boutique";
$breadcrumb =[
    ["/", "Accueil"],
    ["", "Boutique"]
];
require_once('includes/header.php');
?>
<!-- work in progress -->
<!-- load data from database -->
<?php

$productList = $crud->getAllProduits();



// function getBlogCard($id, $nom, $theme, $description, $lienImage) {
//   return '<div class="blogcard" onclick="location.href=\'blog_article.php\';" style="cursor: pointer;">
//             <div class="blogcard-header">
//               <img src="'.$lienImage.'" alt="'.$title.'" />
//             </div>
//             <div class="blogcard-body">
//               <span class="blogtag" style="background-color:'.$color.';">'.$theme.'</span>
//               <h4>'.$title.'</h4>
//               <p>'.$description.'</p>
//               <div class="bloguser">
//                 <img src="'.$imageProfile.'" alt="user" />
//                 <div class="bloguser-info">
//                   <h5>'.$nomProfile.'</h5>
//                   <small>'.$datePosted.'</small>
//                 </div>
//               </div>
//             </div>
//           </div>'; 
// }
?>


<!-- HTML template -->
<div id="containerShop" class="container">
    <section class="py-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <!-- chaque cards -->
            <?php foreach($productList as $products) {?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h3 class="fw-bolder"><?php echo $products['nom'] ?></h3>
                            <h5 class="fw-bolder"><?php echo $products['marque'] ?></h5>
                            <!-- Product price-->
                            <?php echo $products['info'] ?>
                            <?php echo $products['prix'] ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ajouter au panier</a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>


<?php
require_once('includes/footer.php');
?>