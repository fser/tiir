<?php

function val($key)
{
				return isset($_POST[$key]) ? $_POST[$key] : '';
}

$fields = array('login', 'pass', 'pass2', 'mail', 'name', 'status');
$check_failed = FALSE;


if (isset($_POST['doit']))
{
				foreach ($fields as $field) {

								if (!isset($_POST[$field]) || empty($_POST[$field]))
								{
												echo '<div class="error">Il manque le paramètre "' . $field . '".</div>';
												$check_failed = TRUE;
								}
				}
				
				if ($_POST['pass'] != $_POST['pass2'])
				{
								echo '<div class="error">Les mots de passe ne correspondent pas.</div>';
								$check_failed = TRUE;
				}

				if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === FALSE) 
				{
					echo '<div class="error">Email invalide</div>';
					$check_failed = TRUE;
				}
}
else { $check_failed = TRUE; }

if (!$check_failed)
{
				if ($user->create_user($_POST['login'], $_POST['pass'], $_POST['mail'], $_POST['name'], $_POST['status']))
					echo '<div class="success">Utilisateur créé avec succès</div>';
				else
					echo '<div class="error">Erreur de création de l\'utilisateur</div>';
}
else
{
?>

<form method="post">
  <fieldset>
				<legend>Créer un compte</legend>
		<label for="login">Login</label>
		<input type="text" name="login" id="login" value="<?php echo val('login'); ?>" /><br />
		<label for="p1">Mot de passe</label>
		<input type="password" name="pass" id="p1" value="<?php echo val('pass'); ?>" /><br />
		<label for="p2">Mot de passe (verif)</label>
		<input type="password" name="pass2" id="p2" value="<?php echo val('pass2'); ?>" /><br />
		<label for="mail">Email</label>
		<input type="text" name="mail" id="mail" value="<?php echo val('mail'); ?>" /><br />
		<label for="name">Nom</label>
		<input type="text" name="name" id="name" value="<?php echo val('name'); ?>" /><br />
<?php
					if ($user->is_prof()) 
     { 
									echo '		<label for="status">Status</label>'                , "\n";
									echo '		<select name="status" id="status">'                , "\n";
									echo '				<option value="1">membre</option>'               , "\n";
									echo '				<option value="2">Etudiant</option>'             , "\n";
									echo '				<option value="3">Enseignant</option>'           , "\n";
									echo '		</select><br />', "\n";
     }
     else
     {
									echo '		<input type="hidden" name="status" value="1" /><br />';
     }
?>
  <input type="submit" name="doit" value="ok" />
		</fieldset>
</form>


<?php } ?>
