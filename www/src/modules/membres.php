<?php
$status_lbl = array(1 => 'visiteur', 2 => 'étudiant', 3 => 'enseignant');
$status = isset($_GET['status']) ? $_GET['status'] : FALSE;
$req = "SELECT * FROM `users`";
if ($status)
		$req .= " where status='$status'";

$res = mysql_query($req);

if (!$res)
		printf('<div class="error">Requête invalide: %s</div>',  mysql_error());

else
		{
?>
<p><a href="?page=membres">tous</a> - <a href="?page=membres&status=1">membres</a> - <a href="?page=membres&status=2">étudiants</a> - <a href="?page=membres&status=3">professeurs</a></p>
<table>
<tr>
  <th>nom</th><th>email</th><th>Rôle</th>
</tr>
<?php

while ($row = mysql_fetch_assoc($res))
		{
				printf('<tr>
  <td>%s</td><td><img src="%s" /></td><td>%s</td>
</tr>',
											$row['name'] ,
											'/image.php?label=' . strrev($row['mail']), // for robots
											$status_lbl[ $row['status'] ]
											);

		}
?>
</table>

				<?php } ?>