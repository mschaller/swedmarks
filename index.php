<?php 
session_start();

if(!isset($_SESSION["loggedin"])) {
    header("Location: login.php");
    exit();
}

include "./config/configsmarty.php";
$smarty->display('index.tpl');
