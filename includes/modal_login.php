<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="containerLogin" class="modal-content bg-dark bg-gradient">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <h1 class="h1 text-center textLogin">Se connecter</h1> -->
                <!-- reload this page and do the posting action on this page  -->
                <form method="POST" id="formLogin" action="login.php" class="row mt-1">
                    <div class="form-group col-12">
                        <label for="email" class="form-label">Courriel:</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="<?php //if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>"
                            required>
                        <?php //if(empty($username) && $_SERVER['REQUEST_METHOD'] === 'POST') {?>
                        <!-- <p class="text-danger"> <?php //$username_error;?> </p> -->
                        <?php //}?>
                    </div>
                    <div class="form-group col-12 mt-2">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <?php //if(empty($password) && isset($password_error)) {?>
                        <!-- <p class="text-danger"> <?php //$password_error;?> </p> -->
                        <?php //}?>
                    </div>
                    <div class="form-group col-12 mt-3">
                        <button id="btnLogin" type="submit" class="btn btn-danger bg-gradient">Se connecter</button>
                    </div>
                </form>
                <hr class="mt-3">
                <div class="form-group col-8 mx-auto">
                    <a href="signup.php" id="btnSignup" class="btn btn-success bg-gradient ms-auto">Devenir membre</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>