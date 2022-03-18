<?php
require_once 'includes/header.php';
if(isset($_POST['idExercice'])){

}?>
<div id="contUpdateEx" class=" container mt-3">
    <form action="update_exercice_action.php" method="POST">
        <div class="text-light">
            <input hidden name="idEntrainement" value="<?php echo $_POST['idEntrainement']?>">
            <input hidden name="idExercice" value="<?php echo $_POST['idExercice']?>">
            <div>
                <label  class="form-label" for="poids">poids:</label>
                <input class="form-control" name="poids" value="<?php echo $_POST['poids'] ?>">
            </div>
            <div>
                <label  class="form-label mt-1" for="reps">repetition:</label>
                <input class="form-control" name="reps" value="<?php echo $_POST['reps'] ?>">
            </div>
            <div>
                <label  class="form-label mt-1" for="sets">sets:</label>
                <input class="form-control" name="sets" value="<?php echo $_POST['sets'] ?>">
            </div>
            <div>
                <label  class="form-label mt-1" for="duree">duree:</label>
                <input class="form-control" name="duree" value="<?php echo $_POST['duree'] ?>">
            </div>
            <div>
                <label  class="form-label mt-1" for="dureePause">dureepause:</label>
                <input class="form-control" name="dureePause" value="<?php echo $_POST['dureepause'] ?>">
            </div>


        </div>
        <button class="btn btn-success mt-2" type="sumbit">Modifier</button>
    </form>
</div>