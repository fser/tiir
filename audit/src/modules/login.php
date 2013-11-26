<?php

if (!defined('_INCLUDE_MIAOU'))
		die('Direct access is forbidden');

if (isset($_POST['user']) && isset($_POST['passwd']))
{
		if($user->login($_POST['user'], $_POST['passwd'])) {
				header('LOGIN: loginok');
				header('Location: /');
		}
		else
				echo '<div id="class">Erreur de login!</div>';
}

?>
				<fieldset>
				<legend>Me connecter</legend>
				<form method="post" action="index.php?page=login">
						<label for="user">Identifiant</label>
						<input type="text" name="user" id="user" />
						<label for="passwd">Mot de passe</label>
						<input type="password" name="passwd" id="passwd" />
						<input type="submit" value="login" />
				</form>
				</fieldset>


