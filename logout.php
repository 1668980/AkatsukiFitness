<?php 
// backend - orlando
// identifies the session that needs to be destroyed
include_once 'includes/session.php';
// destroys the session, and redirect to home page
session_destroy();
echo "<script>alert('You have logged out (TEST)');</script>";
header('Location: index.php')
?>