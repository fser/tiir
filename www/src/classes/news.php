<?php

include('db.php');

class News
{

    function get_news($visibility)
    {
        $req = "SELECT * FROM `news` WHERE visibility<='$visibility'";
        // echo $req;
        $res = mysql_query($req);
        if (!$res)
            return False;
        else
        {
            /* Create an array containing all news */
            $news = array();

            while ($row = mysql_fetch_assoc($res))
            {
                $curr_news =  array(
                    'id'         => $row['id'],
                    'id_user'    => $row['id_user'],
                    'visibility' => $row['visibility'],
                    'title'      => $row['title'],
                    'content'    => $row['content']
                );
                array_push($news, $curr_news);
            }

            return $news;
        }
    }

    function create_news($id_user, $visibility, $title, $content)
    {
        $req = "INSERT INTO `news` (id_user, visibility, title, content) VALUES ('$id_user', '$visibility', '$title', '$content')";
        // echo $req;
        return mysql_query($req);
    }

}

class Comment
{

    function get_comments($news_id)
    {
        $req = "SELECT * FROM `comments` WHERE id_news='$news_id'";
        // echo $req;
        $res = mysql_query($req);
        if (!$res)
            return False;
        else
        {
            /* Create an array containing all comments */
            $comments = array();

            while ($row = mysql_fetch_assoc($res))
            {
                $curr_com = array(
                    'id'      => $row['id'],
                    'id_news' => $row['id_news'],
                    'id_user' => $row['id_user'],
                    'comment' => $row['comment']
                );
                array_push($comments, $curr_com);
            }

            return $comments;
        }
    }

				function delete_comment($id_comment)
				{
						// Safe because cid is unique
						$req = "DELETE FROM `comments` WHERE id = '$id_comment'";
						return mysql_query($req);
				}

    function create_comment($id_news, $id_user, $comment)
    {
        $req = "INSERT INTO `comments` (id_news, id_user, comment) VALUES ('$id_news', '$id_user', '$comment')";
        // echo $req;
        return mysql_query($req);
    }

}
