<?php 

require('/var/www/dev.swednet.de/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/dev.swednet.de/html/swedmarks/templates');
$smarty->setCompileDir('/var/www/dev.swednet.de/html/swedmarks/compile');
$smarty->setCacheDir('/var/www/dev.swednet.de/html/swedmarks/cache');
$smarty->setConfigDir('/var/www/dev.swednet.de/html/swedmarks/config');

include "config.php";
$db = mysqli_connect($dsn['hostspec'],$dsn['username'],$dsn['password'],$dsn['database']);

if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

$result = mysqli_query($db, "SELECT id, childof as parent, name, user, deleted, public from folder where deleted <> 0");

$rows = array();
$count = 0;
while(($row = mysqli_fetch_array($result))) {
    $rows[$count++] = $row;
}

$smarty->assign('name', 'Ned');
$smarty->assign('rows', $rows);
$smarty->display('index.tpl');
