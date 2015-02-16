<?php
include('db.php');
$tail = '';
if (isset($_GET['id']))
{
        $tail = 'AND id = ' . $_GET['id'];
}

$res = mysql_query('SELECT * FROM news WHERE 1 ' . $tail);
echo '<pre>';
while ($row = mysql_fetch_assoc($res))
  print_r($row);
