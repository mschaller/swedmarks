<?php
if (basename ($_SERVER['SCRIPT_NAME']) == basename (__FILE__)) {
	die ("no direct access allowed");
}

$dsn = array(
	'username' => 'openbookmark',
	'password' => 'KpsobpvTvIuEw8lASqQf',
	'hostspec' => 'localhost',
	'database' => 'openbookmark',
);

$cookie = array (
	'name'   => 'ob_cookie',
	'domain' => '',
	'path'   => '/',
	'seed'   => '8QYZp7RfBQ2C9',
	'expire' => time() + 31536000,
);

# Feel free to add values to this list as you like
# according to the PHP documentation 
# http://www.php.net/manual/en/function.date.php
$date_formats = array (
	'd/m/Y',
	'Y-m-d',
	'm/d/Y',
	'd.m.Y',
	'F j, Y',
	'dS \o\f F Y',
	'dS F Y',
	'd F Y',
	'd. M Y',
	'Y F d',
	'F d, Y',
	'M. d, Y',
	'm/d/Y',
	'm-d-Y',
	'm.d.Y',
	'm.d.y',
);


