<menu>
	<ul>
    <li><?php echo $user->is_logged() ? $user . ' (<a href="/logout.php">deconnexion</a>)' : '<a href="?page=login">login</a> ou <a href="?page=create_user">Créer un compte</a>'; ?></li>
  		<li><a href="?page=news">nouvelles</a></li>
  		<li><a href="?page=membres">membres</a></li>
			<?php			
			if ($user->is_prof()) 
					echo '<li><a href="?page=admin">admin</a>'; 
			elseif ($user->get_status() == 2) 
					echo '<li><a href="?page=notes">Mes notes</a></li>'; ?>
 </ul>
</menu>