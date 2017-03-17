<?php
session_start();
if(!isset($_SESSION["loggedin"])) {
    exit();
}

include "config/config.php";
$db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);

if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

$result = mysqli_query($db, "SELECT id, childof, name, user, deleted from folder where deleted = '0'");

$rows = array();
while(($row = mysqli_fetch_assoc($result))) {
    $rows[] = $row;
}

include "./config/configsmarty.php";
$smarty->assign('rows', $rows);
$smarty->display('folder.tpl');
