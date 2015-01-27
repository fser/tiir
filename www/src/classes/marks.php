<?php

include('db.php');

class Marks
{
		function set_mark($student, $subject, $mark, $comment = '')
		{
				$req = "INSERT INTO `marks` (id_subject, id_student, mark, comment) VALUES ('$subject', '$student', '$mark', '$comment')";
				return mysql_query ($req);
		}

		function get_avg($student)
		{
				$req = "SELECT AVG(mark) AS stud_avg FROM `marks` WHERE id_student = '$student'";
				$res = mysql_query($req);
				// echo $req;
				if ($res) {
						$row = mysql_fetch_assoc($res);
						return $row['stud_avg'];
				}

				return FALSE;
		}

		function get_marks($student)
		{
				$req = "select m.mark, m.comment, s.name AS subject from marks m, subjects s WHERE m.id_student = '$student' AND s.id = m.id_subject;";
				$res = mysql_query($req);
				if (!$res)
						return FALSE;

				$marks = array();
				while ($row = mysql_fetch_assoc($res))
						$marks[] = $row;

				return $marks;
		}
}
