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
    
    $query = sprintf(
        "insert into bookmark
            (user, title, url, description, childof, public)
            values ('%s','%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($db, $_SESSION["user"]),
        mysqli_real_escape_string($db, htmlentities($_POST["title"])),
        mysqli_real_escape_string($db, $_POST["url"]),
        mysqli_real_escape_string($db, htmlentities($_POST["description"])),
        mysqli_real_escape_string($db, "0"),
        "0"
    );
    
    if(mysqli_query($db, $query)) {
        echo "ok";
    } else {
        echo "error";
    }

    echo '<script language="JavaScript">window.history.back();</script>';
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
