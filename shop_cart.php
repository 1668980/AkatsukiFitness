<?php

$breadcrumb = [
    ["index.php", "Accueil"],
    ["shop_index.php", "Boutique"],
    ["", "Panier"],
];
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
$idUser = $_SESSION['userid'];
$cartItems = $crud->getPanierByidUser($_SESSION['userid']);
$userInfo = $crud->getUser($userid);
$avatar = $userInfo['avatar'];
$isPremimium = $crud->isUserPremium($userid);

$POURCENTAGE_DE_RABAIS = 0.05;
$POURCENTAGE_DE_TAXES = 0.15;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idproduct = $_POST['idproduct'];
    $result = $crud->deleteArticlePanierByIdProduct($idUser, $idproduct);

    if (!$result) {
        echo '<div class=""> <div class="alert alert-danger mt-3"> Une erreur c\'est produite.</div></div>';
    } else {
        header("location: {$_SERVER['PHP_SELF']}");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['checkout'])) {
        // get total
        $checkout = $_GET['checkout'];

        if (!$checkout) {
            echo '<div class=""> <div class="alert alert-danger mt-3"> Une erreur c\'est produite.</div></div>';
        } else {
            header("location: shop_cart.php?ordered=true&total=" . $_GET['total'] . "");
            echo '<script> checkout() </script>';
        }
    } 
    else if (isset($_GET['ordered'])) {
        $ordered = $_GET['ordered'];
        if (!$ordered) {
            echo '<div class=""> <div class="alert alert-danger mt-3"> Une erreur c\'est produite.</div></div>';
        } else {
            $checkoutItems = $crud->clearPanier($idUser);

        }
    }
}
?>

<div id="containerCart" class="container mt-0  mb-3">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <h5 class="mb-3">
                            <a href="shop_index.php" class="text-body">
                                <i class="fas fa-long-arrow-alt-left me-2"></i>Retouner à la boutique</a>
                        </h5>
                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="mb-1">Votre panier</h5>
                                <!-- php -->
                                <?php if (count($cartItems) != 0) {?>
                                <p class="mb-0">Vous avez <?php echo count($cartItems); ?> article(s) dans votre panier
                                </p>
                                <?php }?>
                            </div>
                        </div>
                        <?php
                        if (count($cartItems) === 0) {?>
                        <h4 class='text-danger text-center'>Votre panier est vide :(</h4>
                        <?php
                        }
                        foreach ($cartItems as $item) {
                            $idItem = $item['idproduit'];
                            $idArticle = $item['idarticle'];
                            $quantite = $item['quantite'];
                            if ($isPremimium) {
                                $prix = $item['prix'] * $quantite;
                                $rabais = $prix * $POURCENTAGE_DE_RABAIS;
                                $prixMembre = $prix - $rabais;
                            } else {
                                $prix = $item['prix'] * $quantite;
                            }

                        ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <img src="images/products/<?php echo $item['image'] ?>"
                                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                        </div>
                                        <div class="ms-3">
                                            <h6><?php echo $item['nom'] ?></h6>
                                            <p class="small mb-0"><?php echo $item['info'] ?>,
                                                <?php echo $item['marque'] ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">

                                        <input id="changeQ" class="form-control me-1 " style="width: 60px;" type="number"
                                            value="<?php echo $quantite ?>"
                                            onchange="updateQuantityCartForm(<?php echo $idArticle ?>, this.value)">


                                        <?php if ($isPremimium) {?>
                                        <h5 class="mb-0 me-1" id="CartProductPrice<?php echo $idArticle ?>">
                                            <del><?php echo $prix ?>$</del> <br> <span><?php echo $prixMembre ?></span>$
                                        </h5>

                                        <?php } else {?>
                                        <h5 class="mb-0 me-1">$<?php echo $prix ?></h5>
                                        <?php }?>


                                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                                            <input type="hidden" value="<?php echo $idItem ?>" id="idproduct"
                                                name="idproduct">
                                            <button type="submit" class="btn" style="color: #cecece;">
                                                <i class="fas fa-trash-alt text-dark"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>

                    </div>
                    <div class="col-lg-5">

                        <div class="card bg-danger text-white rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Méthode de paiment</h5>
                                    <img src="images/avatars/<?php echo $avatar ?>.png" class="img-fluid rounded-3"
                                        style="width: 45px;" alt="Avatar">
                                </div>

                                <!-- <p class="small mb-2">Nous acceptons</p> -->
                                <a href="#!" type="submit" class="text-white"><i
                                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                <a href="#!" type="submit" class="text-white"><i
                                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                                <a href="#!" type="submit" class="text-white"><i
                                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                <form class="mt-4">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                            placeholder="Cardholder's Name" />
                                        <label class="form-label" for="typeName">Cardholder's Name</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                            placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                        <label class="form-label" for="typeText">Card Number</label>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="text" id="typeExp" class="form-control form-control-lg"
                                                    placeholder="MM/YYYY" size="7" id="exp" minlength="7"
                                                    maxlength="7" />
                                                <label class="form-label" for="typeExp">Expiration</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <input type="password" id="typeText"
                                                    class="form-control form-control-lg"
                                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                    maxlength="3" />
                                                <label class="form-label" for="typeText">Cvv</label>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between ">
                                    <p class="mb-2" >Rabais</p>
                                    <p class="mb-2"id="cartDiscountPrice">
                                        <?php
                                    $sousTotal = $crud->getTotalPrixPanier($_SESSION['userid']);
                                    $prixTotal = $sousTotal;
                                    if ($isPremimium) {
                                        $rabaisTotal = $sousTotal * $POURCENTAGE_DE_RABAIS;
                                        $prixTotal = $sousTotal - $sousTotal * ($POURCENTAGE_DE_RABAIS);
                                        $prixTotal += $prixTotal * ($POURCENTAGE_DE_TAXES);

                                    } else {
                                        $prixTotal += $sousTotal * ($POURCENTAGE_DE_TAXES);

                                    }

                                    if ($isPremimium) {
                                        echo $rabaisTotal . "$";
                                    } else {
                                        echo "0$";
                                    }
?>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2" >Sous-Total</p>
                                    <p class="mb-2"id="cartSousTotalPrice">

                                        <?php
                                echo $sousTotal . "$";

?>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Livraison</p>
                                    <p class="mb-2">0.00$</p>
                                </div>

                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-2" >Total(Incl. taxes)</p>
                                    <p class="mb-2"id="cartTotalPrice"><?php
                                    echo $prixTotal;

?>$
                                    </p>
                                </div>
                                <!-- if(count($cartItems) === 0) {?> -->
                                <a <?php if(count($cartItems) != 0) { ?> id="btn-checkout" href="shop_cart.php?checkout=true&total=<?php echo $prixTotal ?>"  <?php  } else { ?> href="#" <?php  }?>
                                    type="button" class="btn btn-warning btn-lg bg-gradient">
                                    <span class="ms-2">Passer la commande<i
                                            class="fas fa-long-arrow-alt-right ms-2"></i></span>

                                </a>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<div id="contCompOrder" class="container mt-0">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <h5 class="mb-3">
                            <a id="btnAfterCheckout" href="shop_index.php" class="text-body">
                                <i class="fas fa-long-arrow-alt-left me-2"></i>Retouner à la boutique</a>
                        </h5>
                        <hr>
                        <h2 class="text-center pt-5 pb-4 text-success">Merci pour votre achat!</h2>
                        <?php
                        foreach ($checkoutItems as $item) {
                            $prix = $item['prix'] * $item['quantite'];
                            $rabais = $prix * $POURCENTAGE_DE_RABAIS;
                            $prixMembre = $prix - $rabais;
                            ?>
                        <p class="text-center"><?php echo $item['nom'] ?> (<?php echo $item['marque'] ?>) -
                            <?php echo printf("$%01.1f", $prixMembre) ?>$ (x<?php echo $item['quantite'] ?>)</p>
                        <?php }?>
                        <p class="text-center pb-5"> Total : <?php echo $_GET['total']; ?>$ (avec
                            taxes)
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>