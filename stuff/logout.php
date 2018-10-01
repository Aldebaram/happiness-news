<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['user']);
unset($_SESSION['avatar']);
unset($_SESSION['login']);

header("location:../index.php");
?>
