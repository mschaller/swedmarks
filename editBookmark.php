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
    $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);
    if(!$db)
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());
    }
    
    if($action == "new") {
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

    } else {
        $query = sprintf(
            "update bookmark set title='%s', url='%s', description='%s', childof='%s'
                where id='%s'",
            mysqli_real_escape_string($db, $_POST["title"]),
            mysqli_real_escape_string($db, $_POST["url"]),
            mysqli_real_escape_string($db, $_POST["description"]),
            mysqli_real_escape_string($db, $_POST["folder"]),
            mysqli_real_escape_string($db, $_POST["bookmarkid"]) 
        );

    }
    
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
    $smarty->assign("bmtitle", "");
    $smarty->assign("bmurl", "http://");
    $smarty->assign("bmdescription", "");
    $smarty->assign("bmid", "");
    $smarty->assign("bmfolderid", $folderid);
} else {
    if(!isset($_GET["bookmarkid"])) {
        exit("no bookmarkid");
    }
    $bookmarkid = $_GET["bookmarkid"];
    $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);
    if(!$db)
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());
    }

    $result = mysqli_query($db, "SELECT * FROM bookmark where id = '"
        .mysqli_real_escape_string($db, $bookmarkid)
        ."'"
    );

    if($result->num_rows == 0) {
        exit();
    }
    $row = mysqli_fetch_object($result);
    
    $smarty->assign("bmtitle", $row->title);
    $smarty->assign("bmurl", $row->url);
    $smarty->assign("bmdescription", $row->description);
    $smarty->assign("bmfolderid", $row->childof);
    $smarty->assign("bmid", $row->id);
}

$smarty->assign("action", $action);
$smarty->assign("title", $title);
$smarty->display('editbookmark.tpl');
