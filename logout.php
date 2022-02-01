<?php 
// backend - orlando
// identifies the session that needs to be destroyed
include_once 'includes/session.php';
// destroys the session, and redirect to home page
session_destroy();
header('Location: index.php')
?>