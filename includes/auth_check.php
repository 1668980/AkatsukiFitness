<?php
if(!is_logged_in()) {
    header("Location: index.php?auth_error=true");
}
?>