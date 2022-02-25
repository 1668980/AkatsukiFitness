<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card" style="width:500px;">
        <div class="card-body">
            <h5 class="card-title"><?php __('profile_tab_title'); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $firstname . ' ' . $lastname ?></h6>
            <p class="card-text">
            <ul style="list-style-type:none;">
                <li><?php __('profile_tab_label_1'); ?> <?php echo $firstname ?></li>
                <li><?php __('profile_tab_label_2'); ?> <?php echo $lastname ?> </li>
                <li><?php __('profile_tab_label_3'); ?> <?php echo $email ?></li>
                <li><?php __('profile_tab_label_4'); ?> <?php echo $dob ?></li>
                <li><?php __('profile_tab_label_5'); ?> 
                <?php
                    if($sexe == 0){
                        echo __('profile_gender_male');;
                    }else if($sexe ==1){
                        echo __('profile_gender_female');;
                    }else{
                        echo __('profile_gender_other');;
                    }               
                
               ?></li>
                <li>Poids : <?php echo $weight ?></li>
              

            </ul>
            </p>
            <a href="profile_edit.php" class="card-link"><?php __('profile_tab_link_edit'); ?></a>
        </div>
    </div>

    <div class="card" style="width:500px;">
        <div class="card-body">
            <h5 class="card-title"><?php __('profile_tab_title_inprogress'); ?></h5>
            <p class="card-text">
                <ul>

                <?php 
                    $listeEntrainement = $crud->getEntrainementsByIdUser($_SESSION['userid']);

                    $in_progress = array_filter($listeEntrainement, function($workout) { 
                            return $workout['status'] == Crud::STATUS_INPROGRESS;
                    });

                    foreach ($in_progress as $workout) {
                        echo '<li>'.$workout['nom'].'</li>';                                            
                    }
                ?>
                    
                </ul>

            </p>
        </div>
    </div>

    <div class="card" style="width:500px;">
        <div class="card-body">
            <h5 class="card-title"><?php __('profile_tab_title_completed'); ?></h5>
            <p class="card-text">
            <ul>

                <?php 
                    $listeEntrainement = $crud->getEntrainementsCompletedByIdUser($_SESSION['userid']);
                        foreach ($listeEntrainement as $training) {
                            $nom = $training['nom'];
                            echo '<li>'.$nom.'</li>';
                        }
                    ?>
                
            </ul>

            </p>
        </div>
    </div>

</div>