<? ob_start(); ?>
<?php

@session_start();

session_destroy();

header("location: login.html");


?>
<? ob_flush(); ?>