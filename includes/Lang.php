<?php
 class Lang { 
     public static $lang = [

        'lorem' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras Curabitur iaculis, lorem velrem varius purus. Curabitur eu amet. ',
        

        'about_title1' => 'Subtitle',
        'about_text1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at purus accumsan, iaculis turpis vitae, accumsan urna. 
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

