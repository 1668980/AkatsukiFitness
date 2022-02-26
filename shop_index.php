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
$categorieProduitList = $crud->getCategoriesProduit();
if(isset($_GET['idcat'])){
    $productList = $crud->getAllProduitWithCategorie($_GET['idcat']);
} else if(isset($_GET['title'])) {
    $productList = $crud->getProduitByTitleSearch($_GET['title']);
} else {
    $productList = $crud->getAllProduits();
}

?>
<!-- product container -->
<div id="containerShop" class="container">
    <form action="shop_index.php">
        <div class="searchFilter mb-3">
            <div class="searchBox">
                <input class="searchInput" type="text" name="title" placeholder="Search">
                <button class="searchButton" type="submit">
                    <span class="bi-search"></span>
                </button>
            </div>
        </div>
    </form>

    <div class="filterContainer">
        <?php foreach($categorieProduitList as $cat) {?>
        <a class="btn btn-danger"
            href="shop_index.php?idcat=<?php echo $cat['idcategorie']?>"><?php echo $cat['nom']?></a>
        <?php }?>
    </div>



    <section class="py-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <!-- chaque cards -->
            <?php 
            if(count($productList) === 0) {?>
            <h4 class='text-primary text-center'>Aucun produit trouvé :(</h4>
            <?php
            }
            foreach($productList as $products) {
            ?>

            <div class="col mb-5">
                <div class="card h-100 card-product">
                    <!-- Product image-->
                    <img class="card-img-top" src="images/products/<?php echo $products['image']?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h4 class="fw-bolder"><?php echo $products['nom'] ?></h4>
                            <h6 class="fw-bolder"><?php echo $products['marque'] ?></h6>
                            <!-- Product price-->
                            <?php echo $products['info'] ?>
                            <?php echo $products['prix'] ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ajouter au panier</a>
                        </div>
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