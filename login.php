<?php
session_start();

if(isset($_SESSION["loggedin"])) {
    if(isset($_GET["action"]) && $_GET["action"] == "logout") {
        session_destroy();
        header("Location: login.php");
    } else {
        header("Location: index.php");
    }
    exit();
}

if(isset($_POST["logon"])) {
    include "./config/config.php";
    $user = $_POST["login"];
    $pass = $_POST["password"];

    $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);

    if(!$db)
    {
    exit("Verbindungsfehler: ".mysqli_connect_error());
    }

    $result = mysqli_query($db, "select * from user where username = '" . $user . "' and password = md5('" . $pass . "')");
    if($result->num_rows == 0) {
        header("Location: login.php");
        exit();
    }
    $row = mysqli_fetch_object($result);
    $_SESSION["loggedin"] = TRUE;
    $_SESSION["user"] = $row->username;
    $_SESSION["admin"] = $row->admin;
    $_SESSION["token"] = $row->token;

    @setcookie($cookie['name'], 
        $cookie['data'],
        $cookie['expire'],
        $cookie['path'],
        $cookie['domain']
    );

    header("Location: index.php");
    exit();
}

include "./config/configsmarty.php";

$smarty->display("login.tpl");
