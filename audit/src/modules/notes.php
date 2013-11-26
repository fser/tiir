<?php

include('classes/marks.php');

$marks = new Marks();

if (isset($_POST['student']))
		$student_id = $_POST['student'];
else
		$student_id = $user->get_id();


if ($user->is_prof())
{
?>
<form method="post">
				<label for="student">Afficher les notes de:</label>
    <select name="student">
<?php
   foreach ($user->get_students() AS $student)
										printf('<option value="%d">%s</option>' . "\n", $student['id'], $student['name']);
?>
    </select>
  <input type="submit" name="afficher" value="afficher" />
</form>

<?php
}
?>
<h2>Mes Notes</h2>

<table>
<tr>
<th>Matière</th><th>Note</th><th>Commentaire</th>
</tr>
<?php

foreach ($marks->get_marks($student_id) AS $mark)
{
		printf("<tr><td>%s</td><td>%d / 20</td><td>%s</td></tr>", 
									$mark['subject'],
									$mark['mark'],
									$mark['comment']);
}
?>
</table>
<h2>Moyenne</h2>

<?php

$avg = $marks->get_avg($student_id);

if ($avg === FALSE)
		echo '<p>Erreur système.</p>';
else if ($avg === NULL)
		echo '<p>Pas de moyenne</p>';
else {
		printf("<p>%.2f / 20</p>", (float)$avg);
}
