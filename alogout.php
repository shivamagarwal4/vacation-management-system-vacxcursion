<!-- This file is for logging out from the user profile i.e. ending the user session-->
<?php
session_start();
unset($_SESSION['Username']);
session_destroy();
header('location:index1.php');
?>