<?php

$parent = $_GET['parent'];

include "./config/config.php";
$db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);

if(!$db) {
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

$result = mysqli_query($db, "SELECT * FROM bookmark where deleted = '0' and childof=" . $parent);

$rows = array();
while(($row = mysqli_fetch_assoc($result))) {
    $rows[] = $row;
}

require('/var/www/dev.swednet.de/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/dev.swednet.de/html/swedmarks/templates');
$smarty->setCompileDir('/var/www/dev.swednet.de/html/swedmarks/compile');
$smarty->setCacheDir('/var/www/dev.swednet.de/html/swedmarks/cache');
$smarty->setConfigDir('/var/www/dev.swednet.de/html/swedmarks/config');

$smarty->assign('rows', $rows);
$smarty->display('links.tpl');
