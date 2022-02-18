<?php
$landing_img = "images/shop/workout-tools.jpg";
$landing_title = "Boutique";
$breadcrumb =[
    ["/", "Accueil"],
    ["", "Boutique"]
];
require_once('includes/header.php');
?>

<div class="container w-50 ">
    <div class="card-group container-fluid ">


        <a href="shop_cart.php"> view cart </a>

        <!-- TODO: foreach products -->

        <div class="card align-items-center mt-5 mb-5">
            article 1
            <button> add to cart</button>
        </div>

        <div class="card align-items-center mt-5 mb-5">
            article 2
            <button> add to cart</button>
        </div>

        <div class="card align-items-center mt-5 mb-5">
            article 3
            <button> add to cart</button>
        </div>
    </div>
</div>


<?php
require_once('includes/footer.php');
?>