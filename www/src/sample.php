<?php
include('db.php');

$res = mysql_query('SELECT * FROM news WHERE id = "' . $_GET['id'] . "');

print_r($res);
