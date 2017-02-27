<?php
if (basename ($_SERVER['SCRIPT_NAME']) == basename (__FILE__)) {
	die ("no direct access allowed");
}

$dsn = array(
	'username' => '',
	'password' => '',
	'hostspec' => 'localhost',
	'database' => '',
);

$cookie = array (
	'name'   => 'ob_cookie',
	'domain' => '',
	'path'   => '/',
	'seed'   => '8QYZp7RfBQ2C9',
	'expire' => time() + 31536000,
);


