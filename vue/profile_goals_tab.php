<div class="tab-pane fade" id="goals" role="tabpanel" aria-labelledby="goals-tab">

    <div class="card" style="width:500px;">
        <div class="card-body">
            <h5 class="card-title">Mes objectifs</h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $firstname . ' ' . $lastname ?></h6>
            <p class="card-text">

            <form autocomplete="off" method="POST" action="profile_edit.php">

                <div class="row mb-6">
                    <label for="weight" class="col-md-2 col-form-label">Poids initial</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="poid en lbs." class="form-control" name="weight" required="" value="<?php echo $weight ?>">
                    </div>
                </div>

                <div class="row mb-6">
                    <label for="weight_goal" class="col-md-2 col-form-label">Poids désiré</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="poid en lbs." class="form-control" name="weight_goal" required="" value="<?php echo $weight_goal ?>">
                    </div>
                </div>

                <input type="button" value="Annuler" onclick="window.location.href='profile.php'">
                <input type="submit" value="Sauvegarder">

            </form>
            </p>


        </div>
    </div>
</div>