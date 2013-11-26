<?php
if (!defined('_INCLUDE_MIAOU'))
	die('No direct access');

$db_user  = 'minou';
$db_pass  = 'ed2d22dc15ba43883e3a60979f3dc383d8a0c26a';
$db    = 'forthelulz';
$server= '127.0.0.1';

$sql_handler = mysql_connect($server, $db_user, $db_pass);

if (!$sql_handler)
		die('<h1>Server is down</h1>');

if (!mysql_select_db($db, $sql_handler))
		die('<h1>Database is unavailable</h1>');
