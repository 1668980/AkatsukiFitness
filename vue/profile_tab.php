<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                <h5 class="card-title"><?php __('profile_tab_title'); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $firstname . ' ' . $lastname ?></h6>

                <div class="row">
                    <div class="col-lg-3">
                        <img src="images/avatars/<?php echo $avatar?>.png" class="icon">
                    </div>
                    <div class="col-lg-9">
                        <p class="card-text">
                             <ul>
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
                                <li><?php __('profile_tab_label_6'); ?> 
                                <?php 
                                if($weight){
                                    echo $weight;
                                } else {
                                    ?>
                                    <a href="profile_edit.php" class="card-link"><?php __('profile_tab_link_edit'); ?></a>
                                <?php }  ?></li>
                            </ul>
                        </p>
                        <div class="align-right"> <a href="profile_edit.php" class="card-link"><?php __('profile_tab_link_edit'); ?></a></div>
                       </div>
                </div>

            </div>
        </div>

        <div class="card">
                <div class="card-body">
                <h5 class="card-title">Abonnement en cours</h5>
                <p class="card-text"><?php __('membership_'.$membership_details['membership']) ?></p>
                <?php 
                if ($membership_details['membership'] == 'premium') {
                ?>
                Date du début de l'abonnement: <?php echo $membership_details['startdate'] ?>
                <br/>
                Date de fin de l'abonnement: <?php echo $membership_details['enddate'] ?>
                <?php 
                }
                ?>
                </div>
            </div>

        

    </div>

    <div class="col-lg-6">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php __('profile_tab_title_inprogress'); ?></h5>
            <p class="card-text">
                <ul>

                <?php 
                    $listeEntrainement = $crud->getEntrainementsInProgressByIdUser($_SESSION['userid']);

                    foreach ($listeEntrainement as $workout) {
                        echo '<li>'.$workout['nom'].'</li>';                                            
                    }
                ?>
                    
                </ul>

            </p>

            <div class="align-right"> <a href="workouts.php" class="card-link"><?php __('profile_tab_link_inprogress'); ?></a></div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php __('profile_tab_title_completed'); ?></h5>
            <p class="card-text">
            <ul>



                <?php 
                    $listeEntrainement = $crud->getEntrainementsCompletedByIdUser($_SESSION['userid']);

                        $reversed = array_reverse($listeEntrainement);
                
                        $x = array_splice($reversed, 0 , 3);
                        
                        foreach ($x as $training) {
                            echo '<li>'.$training['nom'].'</li>';
                        }
                    ?>
                
            </ul>

            </p>

            <div class="align-right"> <a href="workouts.php#completed" class="card-link"><?php __('profile_tab_link_completed'); ?></a></div>
        </div>
    </div></div>
</div>





</div>