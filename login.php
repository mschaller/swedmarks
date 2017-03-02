<?php
session_start();

if(isset($_SESSION["loggedin"])) {
    header("Location: index.php");
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

    $result = mysqli_query($db, "select * from user where username = '" . $user . "' and md5('" . $pass . "')");
    if($result->num_rows == 0) {
        exit();
    }
    $row = mysqli_fetch_object($result);
    $_SESSION["loggedin"] = TRUE;
    $_SESSION["user"] = $row->user;
    $_SESSION["admin"] = $row->admin;

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
