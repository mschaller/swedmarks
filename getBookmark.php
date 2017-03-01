<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    exit();
}

if(!isset($_GET['action'])) {
    exit();
}
$action = strtolower($_GET['action']);
if($action != "new" && $action != "edit") {
    exit();
}

include "./config/config.php";
if(isset($_POST["submit"])) {
    //todo: validate and write to database
    echo '<script language="JavaScript">reloadclose();</script>';
    echo '<script language="JavaScript">self.close();</script>';
    exit();
}

include "./config/configsmarty.php";
if($action == "new") {
    $title = "New Bookmark";
    $folderid = "0";
    if(isset($_GET["folderid"])) {
        $folderid = $_GET["folderid"];
    }
    $smarty->assign("folderid", $folderid);
} else {
    //todo: load bookmark-data
    //todo: assign smarty-vars
}

$smarty->assign("action", $action);
$smarty->assign("title", $title);
$smarty->display('bookmark.tpl');
