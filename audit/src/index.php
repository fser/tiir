<?php

session_start();
header('Content-type: text/html; Charset=utf-8');
define('_INCLUDE_MIAOU', 'miaou!');
define('_MODULE_PATH', 'modules');

include('classes/user.php');

$user = new User();

$page = sprintf(_MODULE_PATH . "/%s.php", isset($_GET['page']) ? $_GET['page'] : 'default');

$page = file_exists($page) ? $page : _MODULE_PATH . '/' .'404.php';

$title = '';

?>
<!DOCTYPE html>
<html>
  <head>
     <title>Intranet du Master TIIR - <?php echo gmdate(' Y '),  $title; ?></title>
					<link rel="stylesheet" type="text/css" href="/static/style.css" />
		   <link rel="shortcut icon" type="image/x-icon" href="/static/favicon.ico" />
					<script src="/static/jquery.js"></script>
  </head>

  <body>
		   <div id="header">
		      <a href="/">
		      <img src="/static/logo-lille1.jpg" title="Logo Lille1"/>
		      </a>
     </div>

    	<?php include(_MODULE_PATH . '/menu.php'); ?>


     <div id="container">


	     	<div id="content"> <?php include($page); ?> </div>

  		</div>
    <div id="bottom"><footer>Copyright université Lille 1</footer></div>
							<script>$('div.error,div.success').css({'position': 'absolute', 'top': '0px', 'z-index': 100}).delay(1800).fadeOut();</script>
  </body>
</html>
