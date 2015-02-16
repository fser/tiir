<?php
include('db.php');

$res = mysql_query('SELECT * FROM news WHERE id = "' . $_GET['id'] . '"');
while ($row = mysql_fetch_assoc($res))
  print_r($row);
