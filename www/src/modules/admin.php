<?php

if (!$user->is_prof()) 
{
	echo '<h1>Accès restreint</h1>';
	echo '<p>Cette page ne vous est pas accessible.</p>';
	return;
}

?>

<ul>
	<li><a href="?page=noter">Noter</a></li>
	<li><a href="?page=publier">Ajouter une news</a></li>
	<li><a href="?page=create_user">Créer un utilisateur</a></li>
</ul>
