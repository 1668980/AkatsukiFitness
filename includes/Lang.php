<?php
 class Lang { 
     public static $lang = [

        //'about_landing_title' => 'À propos de nous',
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

