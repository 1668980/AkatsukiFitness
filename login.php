
<?php
//backend orlando
include 'includes/header.php';
require_once 'db/conn.php';

//If data was submitted with a POST request // if the page loaded after POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['email']));
    $password = $_POST['password'];
    //$new_password = md5($password . $username);

    $result = $crud->login($username, $password);
    if(!$result){
        echo '<div class="alert alert-danger"> Nom d\'utilisateur ou mot de passe invalide. Veuillez réessayez. </div>';
    } else {
        $_SESSION['userid'] = $result;
        $_SESSION['email'] = $username;
        header('Location: index.php');
    }
}
?>

<div id="containerLogin" class="containerLogin">
    <h1 class="h1 text-center">Se connecter</h1>
    <!-- reload this page and do the posting action on this page  -->
    <form method="POST" id="formLogin" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" class="row mt-1">
        <div class="form-group col-12">
            <label for="email" class="form-label">Couriel:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php //if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>" required>
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
            <button id="btnConnecter" type="submit" class="btn btn-success ">Se connecter</button>
        </div>
        <div class="col mt-1">
        <a href="#" class="mt-1" >Mot de passe oublié?</a>
        </div>
    </form>
</div>

<?php
include '../includes/footer.php';
?>