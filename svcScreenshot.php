<?php
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

