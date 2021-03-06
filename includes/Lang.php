<?php
 class Lang { 
     public static $lang = [

        //index.php
        'index_carrousel_title_1' => 'Entraînements sur mesure',
        'index_carrousel_title_2' => 'Inscription pour tous',
        'index_carrousel_title_3' => 'Obtenez 5% de rabais sur tous les articles',
        'index_carrousel_text_1' => 'Sentez-vous énergique et fort avec de nouveaux entraînements que vous pouvez faire à la maison ou au gym.',
        'index_carrousel_text_2' => 'Que ce soit gratuit ou premium, vous y trouverez des entraînements adaptés.',
        'index_carrousel_text_3' => 'Lorsque vous êtes membre, obtenez un rabais instantané sur tous les articles du magasin.',
        'index_carrousel_btn_1' => 'Inscrivez-vous',
        'index_carrousel_btn_2' => 'Découvrez nos plans',
        'index_carrousel_btn_3' => 'Visitez le magasin',
        'index_btn' => 'Inscrivez-vous maintenant!',

        'index_welcome_title' => 'Pourquoi choisir Akatuski Fitness?',
        'index_welcome_text' => 'S\'entraîner n\'aura jamais été aussi simple. Akatasuki Fitness est une compagnie Québécoise qui vous propose des plans d\'entraînements sur mesure et personalisé à vos besoin que vous pouvez accéder peut importe où vous êtes, que ce soit à partir du Gym, de la maison ou du travail.',
        'index_membership_title' => 'Inscrivez-vous maintenant!',
        'index_membership_text' => 'Inscrivez-vous maintenant!',
        'index_btn_free' => 'Choisir ce plan',
        'index_btn_premium' => 'Choisir ce plan',


        'membership_premium' => 'Premium',
        'membership_free' => 'Gratuit',

        'membership_price_1' =>'6.99',
        'membership_price_3' =>'17.99',
        'membership_price_6' =>'34.99',
        
        //profile_tab.php
        'profile_tab_title' => 'Mon profil',
        'profile_tab_label_1' => 'Prénom : ',
        'profile_tab_label_2' => 'Nom : ',
        'profile_tab_label_3' => 'Courriel : ',
        'profile_tab_label_4' => 'Date de naissance : ',
        'profile_tab_label_5' => 'Sexe : ',
        'profile_tab_label_6' => 'Poids : ',
        'profile_tab_link_edit' => 'Modifier',

        'profile_gender_male' => 'Homme',
        'profile_gender_female' => 'Femme',
        'profile_gender_other' => 'Autre',

        'profile_tab_title_inprogress' => 'Entraînement en cours',
        'profile_tab_title_completed' => 'Dernier(s) entraînement(s) complété(s)',
        'profile_tab_link_inprogress' => 'Voir les entraînements',
        'profile_tab_link_completed' => 'Plus de détails',

        //profile_edit
        'profile_edit_title' => 'Modification de profil',
        'profile_edit_label_1' => 'Prénom',
        'profile_edit_label_2' => 'Nom',
        'profile_edit_label_3' => 'Courriel',
        'profile_edit_label_4' => 'Date de naissance',
        'profile_edit_label_5' => 'Sexe',
        'profile_edit_label_6' => 'Poids',

        'profile_edit_btn_cancel' => 'Annuler',
        'profile_edit_btn_save' => 'Sauvegarder',

        //profile_goal_tab.php
        'profile_label_1' => 'This is a title',

        //

        //about.php
        'about_title1' => 'Histoire',
        'about_text1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at purus accumsan, iaculis turpis vitae, accumsan urna. 
                            Aliquam tempus tincidunt metus, quis dapibus odio pellentesque non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque mi odio, porta eget euismod sed, 
                            tempus mollis ex. Donec ornare tincidunt felis ut volutpat. ',

        'about_title2' => 'L\'équipe',
        'about_text2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at purus accumsan, iaculis turpis vitae, accumsan urna. 
                                                Aliquam tempus tincidunt metus, quis dapibus odio pellentesque non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque mi odio, porta eget euismod sed, 
                                                tempus mollis ex. Donec ornare tincidunt felis ut volutpat. ',
     ];

     public static function __($key) { 
        if (isset(self::$lang[$key])) { 
            echo self::$lang[$key];
        } else { 
            echo $key;
        }
     }


     public static function __val($key) { 
        if (isset(self::$lang[$key])) { 
            return self::$lang[$key];
        } else { 
            return $key;
        }
     }

}

