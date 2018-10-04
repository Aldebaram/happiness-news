<?php
session_start();
// clear session
unset($_SESSION['user_id']);
unset($_SESSION['user']);
unset($_SESSION['avatar']);
unset($_SESSION['login']);
//redirect to home
header("location:../index.php");
?>
