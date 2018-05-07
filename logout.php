<?php
//  session_destroy();
//  unset($_SESSION['email']);
//  header('location: signin.php');
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('location: signin.php');
die;
?>
