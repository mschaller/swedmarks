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

    $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);

    if(!$db)
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());
    }
    $query = sprintf(
        "insert into folder (childof, name, public, user)
            values ('%s','%s','%s','%s')",
        mysqli_real_escape_string($db, $_POST["folder"]),
        mysqli_real_escape_string($db, $_POST["foldername"]),
        "0",
        mysqli_real_escape_string($db, $_SESSION["user"])
    );

    if(mysqli_query($db, $query)) {
        echo "ok";
    } else {
        echo "error";
    }


    echo '<script language="JavaScript">window.opener.updateFolderTree();</script>';
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
$smarty->assign("foldertitle", $title);
$smarty->display('editfolder.tpl');

