<?php session_start(); ?>

<?php
$_SESSION['username'] = null;
$_SESSION['is_admin'] = null;
$_SESSION['id'] = null;


header("Location: ../index.php");


?>