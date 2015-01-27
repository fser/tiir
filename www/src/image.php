<?php

#header('Content-Type: image/jpg');

$im = imagecreate(250, 17);

// White background and blue text
$bg = imagecolorallocate($im, 250, 250, 250);
$textcolor = imagecolorallocate($im, 150, 150, 255);

// Write the string at the top left
$txt = isset($_GET['label']) ? $_GET['label'] : 'liame';
$content = exec('inv ' . $txt);
imagestring($im, 5, 0, 0, $content, $textcolor);
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
