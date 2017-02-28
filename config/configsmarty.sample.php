<?php
require('/var/www/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/htroot/swedmarks/templates');
$smarty->setCompileDir('/var/www/smarty/compile');
$smarty->setCacheDir('/var/www/smarty/cache');
$smarty->setConfigDir('/var/www/htroot/swedmarks/config');


