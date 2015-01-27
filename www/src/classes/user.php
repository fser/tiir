<?php include ('db.php');

class User
{
    private $logged = FALSE;
    private $id = -1;
    private $login = '';
    private $mail = '';
    private $name = 'anonymous';
    private $status = 0;

    function __construct ()
    {
	$this->restore ();
    }

    function __toString ()
    {
	return $this->name;
    }

    private function restore ()
    {

	if (isset ($_SESSION['login']))
	{
	    $this->logged = $_SESSION['login']['logged'];
	    $this->id = $_SESSION['login']['id'];
	    $this->login = $_SESSION['login']['login'];
	    $this->mail = $_SESSION['login']['mail'];
	    $this->name = $_SESSION['login']['name'];
	    $this->status = $_SESSION['login']['status'];
	}

    }

    function create_user ($login, $password, $mail, $name, $status)
    {
	$req =
	    "INSERT INTO `users` (login, pass, mail, name, status) VALUES ('$login', '".
	    md5 ($password)."', '$mail', '$name', '$status')";
	return mysql_query ($req);
    }

    function get_students ()
    {
	$req = 'SELECT * FROM `users` WHERE status = 2';
	// echo $req;
	$res = mysql_query ($req);
	if ($res)
	{
	    $students = array ();
	    while ($row = mysql_fetch_assoc ($res))
		$students[] = $row;

	    return $students;
	}

	return FALSE;
    }

    function is_logged ()
    {
	return $this->logged;
    }

    function get_id ()
    {
	return $this->id;
    }

    function get_status ()
    {
	return $this->status;
    }

    function is_prof ()
    {
	return ((int) $this->status === 3);
    }

    function get_name_from_id ($id)
    {
	$req = "SELECT name FROM `users` WHERE id='$id'";
	$res = mysql_query ($req);

	if (!$res)
	    return FALSE;
	if (mysql_num_rows ($res) != 1)
	    return FALSE;
	$row = mysql_fetch_assoc ($res);

	return $row['name'];
    }

    function login ($username, $password)
    {
	$username = addslashes ($username);
	$req =
	    "SELECT * FROM `users` WHERE login='$username' AND pass='".md5
	    ($password)."'";
	// echo $req;
	$res = mysql_query ($req);
	if (!$res)
	    return FALSE;
	else
	{
	    if (mysql_num_rows ($res) != 1)
		return FALSE;
	    else
	    {
		$row = mysql_fetch_assoc ($res);
		$_SESSION['login'] = array ('logged' =>TRUE,
					    'id' =>$row['id'],
					    'login' =>$row['login'],
					    'mail' =>$row['mail'],
					    'name' =>$row['name'],
					    'status' =>$row['status']);
		$this->restore ();
		return TRUE;
	    }
	}
    }


}
