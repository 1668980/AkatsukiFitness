<?php

    function is_logged_in() { 
        return isset($_SESSION['userid']);
    }

    function breadcrumb(array $bc_elements) { 
        $str = '
    <section>
     <ul class="breadcrumb">
    ';
    
        foreach($bc_elements as $b) {
    
            list($link, $text) = $b;
            
            $str .= '<li>';
            if ($link != '') { 
                $str .= '<a href="'.$link.'">';
            }
            $str .= $text;
            if ($link != '') { 
                $str .= '</a>';
            }
            $str .= '</li>';
        }
        $str .= '</ul>
    </section>
    ';
     echo $str;
    }


    function __($key) { 
        return Lang::__($key);
    }

?>