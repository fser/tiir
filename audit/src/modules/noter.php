<?php

include('classes/marks.php');
include('classes/subjects.php');

$marks = new Marks();
$subjct = new Subjects();

function val($key)
{
	return isset($_POST[$key]) ? $_POST[$key] : '';
}

$fields = array('student', 'subject', 'mark');
$check_failed = FALSE;


if (isset($_POST['doit']))
{
 		foreach ($fields as $field) 
			{
 					if (!isset($_POST[$field]) || empty($_POST[$field])) {
								echo '<div class="error">Il manque le paramètre "' . $field . '".</div>';
								$check_failed = TRUE;
						}
			}
}
else $check_failed = TRUE;

if (!$check_failed)
{
		if (!isset($_POST['comment'])) $_POST['comment'] = '';
		if ($marks->set_mark($_POST['student'], $_POST['subject'], $_POST['mark'], $_POST['comment']))
				echo '<div class="success">Note ajoutée</div>';
		else
				echo '<div class="error">Note <strong>non</strong> ajoutée</div>';
}
else
{
?>
<form method="post">
				<fieldset>
				<legend>Noter un étudiant</legend>

				<label for="student">Étudiant</label>
    <select name="student" id="student">
<?php
  				foreach ($user->get_students() AS $student)
										printf('<option value="%d">%s</option>' . "\n", $student['id'], $student['name']);
?>
    </select>

				<label for="subject">Unité d'Enseignement</label>
    <select name="subject" name="subject">
<?php
      foreach ($subjct->get_subjects($user->get_id()) AS $subj)
          printf('<option value="%d">%s</option>' . "\n", $subj['id'], $subj['name']);
?>
    </select>
    <label for="mark">Note</label>
    <input type="text" name="mark" id="mark" size="3"/> / 20
    <label for="comment">Commentaire</label>
    <textarea name="comment" id="comment"></textarea><br />
    <input type="submit" name="doit" value="ok" />
		  </fieldset>															
</form>


<?php } ?>
