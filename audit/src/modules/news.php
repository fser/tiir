<?php

include('classes/news.php');

$news = new News();
$com  = new Comment();


/* Post a new comment action */
if (isset($_POST['comment']) && isset($_POST['nid']) && isset($_POST['uid']))
{
	if ($com->create_comment($_POST['nid'], $_POST['uid'], $_POST['comment']))
			echo '<div class="success">comment posté!</div>';
	else
			echo '<div class="error">Erreur lors de l\'ajout du commentaire!</div>';
}

/* Delete a comment */
if(isset($_POST['cid']) && isset($_POST['del']))
{
		if ($com->delete_comment($_POST['cid']))
				echo '<div class="success">Commentaire supprimé.</div>';
		else
				echo '<div class="error">Erreur lors de la suppression du commentaire.</div>';
}



/* Displays news */
$the_news = $news->get_news($user->get_status());
if (!count($the_news)) {
		echo "<h1>Pas encore de nouvelles</h1><p>Des nouvelles viendrons s'ajouter tout au long de l'année universitaire.</p>";
		return;
}
foreach ($the_news AS $single_news)
{
	printf("<h2>%s (par %s)</h2>\n", $single_news['title'], $user->get_name_from_id($single_news['id_user']));
	printf("<p>%s</p>\n", $single_news['content']);

	$comments = $com->get_comments($single_news['id']);
	
	/* Displays comments if any */
	if (count($comments) != 0) 
	{
			echo '<h4>Commentaires</h4>';
			echo '<dl>' , "\n";
			foreach($comments AS $comment)
			{
					printf("\t<dt>par %s %s</dt>\n\t\t<dd>%s</dd>\n", 
												$user->get_name_from_id($comment['id_user']), 
												($user->is_prof() || $user->get_id() === $comment['id_user']) ? 
												'<form style="display:inline;" method="post">
<input type="hidden" name="cid" value="' . $comment['id'] . '">
<input type="hidden" name="del" value="1">
<input type="image" src="/static/supprimer.gif" title="Supprimer?" onclick="javascript:confirm(\'Êtes-vous sûr de vouloir supprimer ce commentaire?\');" value="supprimer" />
</form>' : '',
												strip_tags($comment['comment'], '<b><i><sup><sub><em><strong><u><br><p><a><i></p>'));
		}
		echo '</dl>', "\n\n";
	}
	if (!$user->is_logged())
		echo '<p>Vous devez créer un compte pour laisser un commentaire.</p>', "\n";
	else
	{
			$id = uniqid();
			$id2 = uniqid();
?>
	<a id="<?php echo $id2; ?>" onclick="javascript:$('div#com-<?php echo $id; ?>').toggle(400); $(this).hide()">[ Commenter ]</a>
 <div class="comment" id="com-<?php echo $id  ?>">
	<form method="post">
		<fieldset><legend onclick="javascript:$('div#com-<?php echo $id; ?>').toggle(400); $('a#<?php echo $id2 ?>').delay(500).show(800);">Commenter</legend>
		<input type="hidden" name="nid" value="<?php echo $single_news['id']; ?>" />
		<input type="hidden" name="uid" value="<?php echo $user->get_id(); ?>" />
		<textarea name="comment" placeholder="Laissez un commentaire"></textarea><br />
		<input type="submit" name="com" value="commenter" />
  </fieldset>
	</form>
 </div>
<?php
	}
} // end foreach
?>

<script>$('div.comment').hide();</script>
