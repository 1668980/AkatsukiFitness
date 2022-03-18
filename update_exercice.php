<?php
require_once 'includes/header.php';
if(isset($_POST['idExercice'])){

}?>
<form action="update_exercice_action.php" method="POST">
<div class="text-light">
    <input hidden name="idEntrainement" value="<?php echo $_POST['idEntrainement']?>">
    <input hidden name="idExercice" value="<?php echo $_POST['idExercice']?>">
    <div>   
        <label for="poids">poids:</label>
        <input name="poids" value="<?php echo $_POST['poids'] ?>" >
    </div>
    <div> 
        <label for="reps">repetition:</label>
        <input name="reps" value="<?php echo $_POST['reps'] ?>" >
    </div><div> 
        <label for="sets">sets:</label>
        <input name="sets" value="<?php echo $_POST['sets'] ?>" >
    </div><div> 
        <label for="duree">duree:</label>
        <input name="duree" value="<?php echo $_POST['duree'] ?>" >
    </div><div> 
        <label for="dureePause">dureepause:</label>
        <input name="dureePause" value="<?php echo $_POST['dureepause'] ?>" >
    </div>


</div>
<button type ="sumbit">Modifier</button>
</form>
      

