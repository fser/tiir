<?php

include('db.php');

class Subjects
{

    function get_subjects($responsible = FALSE)
    {
        $req = "SELECT * FROM `subjects`"; 
								if ($responsible)
										$req .= " WHERE prof = '$responsible'";
        // echo $req;
        $res = mysql_query($req);
        if (!$res)
            return False;

								/* Create an array containing all subjects */
								$subjects = array();

								while ($row = mysql_fetch_assoc($res))
										$subjects[] = $row;
										
								return $subjects;
    }

    function create_subject($name, $prof, $comment='Detail UE')
    {
        $req = "INSERT INTO `subjects` (name, prof) VALUES ('$name', '$prof')";
        // echo $req;
        return mysql_query($req);
    }

}

