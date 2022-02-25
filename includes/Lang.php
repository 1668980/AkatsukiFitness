<?php
 class Lang { 
     public static $lang = [

        //index.php
        'index_carrousel_title_1' => 'This is a title',
        'index_carrousel_title_2' => 'This is a title',
        'index_carrousel_title_3' => 'This is a title',
        'index_carrousel_text_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at purus accumsan, iaculis turpis vitae, accumsan urna.',
        'index_carrousel_text_2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at purus accumsan, iaculis turpis vitae, accumsan urna.',
        'index_carrousel_text_3' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at purus accumsan, iaculis turpis vitae, accumsan urna.',
        'index_carrousel_btn_1' => 'Inscrivez-vous',
        'index_carrousel_btn_2' => 'Découvrez nos plans',
        'index_carrousel_btn_3' => 'Visitez le magasin',
        'index_btn' => 'Inscrivez-vous',
        
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
        'profile_tab_title_completed' => 'Entraînement(s) complété(s)',

        'index_carrousel_title_2' => 'This is a title',
        'index_carrousel_title_3' => 'This is a title',

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
        'index_carrousel_title_2' => 'This is a title',
        'index_carrousel_title_3' => 'This is a title',

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
}

