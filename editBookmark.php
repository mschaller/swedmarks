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
        "insert into bookmark
            (user, title, url, description, childof, public)
            values ('%s','%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($db, $_SESSION["user"]),
        mysqli_real_escape_string($db, $_POST["title"]),
        mysqli_real_escape_string($db, $_POST["url"]),
        mysqli_real_escape_string($db, $_POST["description"]),
        mysqli_real_escape_string($db, $_POST["folder"]),
        "0"
    );

    if(mysqli_query($db, $query)) {
        echo "ok";
    } else {
        echo "error";
    }


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
    $smarty->assign("bmfolderid", $folderid);
} else {
    //todo: load bookmark-data
    //todo: assign smarty-vars
}

$smarty->assign("action", $action);
$smarty->assign("title", $title);
$smarty->display('editbookmark.tpl');
