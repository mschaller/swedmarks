<?php
include "config/config.php";
$db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);

if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

$result = mysqli_query($db, "SELECT id, childof, name, user, deleted, public from folder where deleted = '0'");

$rows = array();
while(($row = mysqli_fetch_assoc($result))) {
    $rows[] = $row;
}

print json_encode($rows);
