<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card" style="width:500px;">
        <div class="card-body">
            <h5 class="card-title">Profil</h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $firstname . ' ' . $lastname ?></h6>
            <p class="card-text">
            <ul style="list-style-type:none;">
                <li>Prénom : <?php echo $firstname ?></li>
                <li>Nom : <?php echo $lastname ?> </li>
                <li>Courriel : <?php echo $email ?></li>
                <li>Date de Naissance : <?php echo $dob ?></li>
                <li>Sexe : <?php echo $sexe ?></li>
                <li>Poids : <?php echo $weight ?></li>
                <!--<li>Sexe :</li>-->

            </ul>
            </p>
            <a href="profile_edit.php" class="card-link">Modifier</a>
        </div>
    </div>

    <div class="card" style="width:500px;">
        <div class="card-body">
            <h5 class="card-title">Entraînement en cours</h5>
            <p class="card-text">
                nom de l'entraînement
            </p>
        </div>
    </div>

    <div class="card" style="width:500px;">
        <div class="card-body">
            <h5 class="card-title">Entraînement(s) complété(s)</h5>
            <p class="card-text">
                Liste des entraînements
            </p>
        </div>
    </div>

</div>