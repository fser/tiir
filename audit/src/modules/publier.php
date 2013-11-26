<?php

include("classes/news.php");
$news = new News();

$fields = array('title', 'content', 'visibility');
$check_failed = FALSE;

if (isset($_POST['publish']))
{
				foreach ($fields as $field) {

  						if (!isset($_POST[$field]) || trim($_POST[$field]) === FALSE)
								{
												echo '<div class="error">Il manque le paramètre "' . $field . '".</div>';
												$check_failed = TRUE;
								}
				}
}
else { $check_failed = TRUE; }

if (!$check_failed)
{
		if ($news->create_news($user->get_id(), $_POST['visibility'], $_POST['title'], $_POST['content']))
				echo '<div class="success">Nouvelle postée</div>';
		else
				echo '<div class="error">Erreur, nouvelle <strong>non</strong> postée</div>';
}
else
{
?>
<form method="post">
				<fieldset>
				   <legend>Ajouter une nouvelle</legend>
				   <label for="title">Titre:</label>
       <input type="text" name="title" id="title" />
							<label for="visibility">Visibilité:</label>
       <select name="visibility" id="visibility">
            <option value="0">Publique</option>
            <option value="1">Membres</option>
            <option value="2">Étudiants</option>
            <option value="3">Enseignants</option>
							</select>
				   <label for="content">Contenu:</label>
							<textarea name="content" name="content" placeholder="Contenu" cols="80" rows="15"></textarea><br />
       <input type="submit" name="publish" value="publier" />
 				</fieldset>
																
</form>


<?php } ?>
