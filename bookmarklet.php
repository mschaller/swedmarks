<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    if(isset($_POST["token"])) {
        include_once "./config/config.php";

        $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);
        if(!$db)
        {
            exit("Verbindungsfehler: ".mysqli_connect_error());
        }

        $query = sprintf("select * from user where token='%s'",
            mysqli_real_escape_string($db, $_POST["token"])
        );
        
        $result = mysqli_query($db, $query);
        if($result->num_rows == 0) {
            exit();
        }
        $row = mysqli_fetch_object($result);

        $username = $row->username;
    } else {
        exit();
    }
} else {
    $username = $_SESSION["user"];
}

if(isset($_POST["submit"])) {
    include_once "./config/config.php";
    $db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);
    if(!$db)
    {
        exit("Verbindungsfehler: ".mysqli_connect_error());
    }
   
    $query = sprintf(
        "insert into bookmark
            (user, title, url, description, childof)
            values ('%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($db, $username),
        mysqli_real_escape_string($db, htmlentities($_POST["title"])),
        mysqli_real_escape_string($db, $_POST["url"]),
        mysqli_real_escape_string($db, htmlentities($_POST["description"])),
        mysqli_real_escape_string($db, "0")
    );
    
    if(mysqli_query($db, $query)) {
        echo "ok";
    } else {
        echo "error";
    }

    echo '<script language="JavaScript">window.history.back();</script>';
    exit();
}
