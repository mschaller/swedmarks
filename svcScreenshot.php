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

if(isset($_POST["submit"])) {
    $uploaddir = $smsettings["basepath"] . "/screenshots/" . $username;

    if(!file_exists($uploaddir)) {
        mkdir($uploaddir);
    }

    $filename =hash('sha256', $_POST['url']) . ".jpg"; 
    $uploadfile = $uploaddir . "/" . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        $query = sprintf(
            "update bookmark set screenshot_name='%s', screenshot_date=now()
                where user='%s' and url = '%s'",
            mysqli_real_escape_string($db, $filename),
            mysqli_real_escape_string($db, $username),
            mysqli_real_escape_string($db, $_POST['url'])
        );


        if(mysqli_query($db, $query)) {
            echo "ok";
        } else {
            echo "error";
        }
    } else {
        echo "upload error";
        print_r($_FILES);
    }
} else if (isset($_POST["geturl"])) {
    $query = sprintf("select url from bookmark where user = '%s'and screenshot_name is null
        order by screenshot_date asc
        ",
        mysqli_real_escape_string($db, $username)
    );
    
    $result = mysqli_query($db, $query);
    if($result->num_rows == 0) {
        exit();
    }
    $row = mysqli_fetch_object($result);

    echo $row->url;
} else if (isset($_POST["skipurl"])) {
    $query = sprintf(
        "update bookmark set screenshot_date=now()
            where user='%s' and url = '%s'",
        mysqli_real_escape_string($db, $username),
        mysqli_real_escape_string($db, $_POST['url'])
    );


    if(mysqli_query($db, $query)) {
        echo "ok";
    } else {
        echo "error";
    }


}

