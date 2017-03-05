<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    exit();
}

if(!isset($_GET['action'])) {
    exit();
}
$action = strtolower($_GET['action']);
if($action != "edit") {
    exit();
}

include "./config/config.php";
if(isset($_POST["submit"])) {
    $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);

    if(!$db)
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());
    }
//    $query = sprintf("",
//        //mysqli_real_escape_string($db, $_POST["folder"]),
//        //mysqli_real_escape_string($db, $_SESSION["user"])
//    );

    if(mysqli_query($db, $query)) {
        echo "ok";
    } else {
        echo "error";
    }


    //echo '<script language="JavaScript">window.opener.updateFolderTree();</script>';
    echo '<script language="JavaScript">self.close();</script>';
    exit();
}

include "./config/configsmarty.php";
$smarty->assign("action", $action);
$smarty->assign("user", $_SESSION["user"]);
$smarty->assign("baseuri", $smsettings["baseuri"]);
$smarty->display('profile.tpl');
