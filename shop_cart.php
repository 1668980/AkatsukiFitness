<?php
require_once('includes/header.php');
$cartItems = $crud->getPanierByidUser($_SESSION['userid']);
$userInfo = $crud->getUser($userid);
$avatar = $userInfo['avatar'];
?>

<div class="container mt-4">
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
                                <?php if(count($cartItems) != 0) {?>
                                <p class="mb-0">Vous avez <?php echo count($cartItems); ?> article(s) dans votre panier
                                </p>
                                <?php }?>
                            </div>
                        </div>
                        <?php 
                        if(count($cartItems) === 0) {?>
                        <h4 class='text-danger text-center'>Votre panier est vide :(</h4>
                        <?php
                        }
                        foreach($cartItems as $products) {
                        ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <img src="images/products/<?php echo $products['image']?>"
                                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                        </div>
                                        <div class="ms-3">
                                            <h5><?php echo $products['nom'] ?></h5>
                                            <p class="small mb-0"><?php echo $products['info'] ?>,
                                                <?php echo $products['marque'] ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <div style="width: 50px;">
                                            <h5 class="fw-normal mb-0"><?php echo $products['quantite'] ?></h5>
                                        </div>
                                        <div style="width: 80px;">
                                            <h5 class="mb-0">$<?php echo $products['prix'] ?></h5>
                                        </div>
                                        <a href="#!" style="color: #cecece;"><i
                                                class="fas fa-trash-alt text-dark"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="col-lg-5">

                        <div class="card bg-danger text-white rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Méthode de paiment</h5>
                                    <img src="images/avatars/<?php echo $avatar?>.png" class="img-fluid rounded-3"
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

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Subtotal</p>
                                    <p class="mb-2">$4798.00</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Shipping</p>
                                    <p class="mb-2">$20.00</p>
                                </div>

                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-2">Total(Incl. taxes)</p>
                                    <p class="mb-2">$4818.00</p>
                                </div>

                                <button id="btn-checkout" type="button" class="btn btn-warning btn-lg bg-gradient">
                                    <span class="ms-2">Passer la commande<i
                                            class="fas fa-long-arrow-alt-right ms-2"></i></span>

                                </button>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once('includes/footer.php');
?>