<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    exit();
}

include "./config/config.php";
if(isset($_POST["submit"])) {
    $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);
    if(!$db)
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());
    }

    exit();
}

include "./config/configsmarty.php";

if(isset($_GET["title"])) {
    $smarty->assign("title", $_GET["title"]);
} else {
    $smarty->assign("title", "");
}

if(isset($_GET["url"])) {
    $smarty->assign("url", $_GET["url"]);
} else {
    $smarty->assign("url", "http://");
}

$smarty->assign("baseuri", $smsettings["baseuri"]);
$smarty->display('bookmarkletform.tpl');
