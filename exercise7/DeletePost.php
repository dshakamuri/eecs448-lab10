<?php

function deletePosts()
{
  $mysqli = new mysqli("mysql.eecs.ku.edu", "d342s734", "afai9hoo", "d342s734");

  $posts = "SELECT content, author_id, post_id
            FROM Posts";

  echo "Posts successfully deleted! These are the post_ids of the deleted posts:" . "<br>";
  if ($result=$mysqli->query($posts))
  {
    while ($row = $result->fetch_assoc())
    {
      $delete_id = $row['post_id'];
      $check_box = $_POST[$row['post_id']];
      if($check_box=="on")
      {
        $delete = "DELETE FROM Posts WHERE post_id=$delete_id";
        if ($mysqli->query($delete))
        //if deleted successfully
        {
          echo $row['post_id'];
          echo "<br>";
        }
      }
    }
  }

  $result->free();

  $mysqli->close();
}

echo deletePosts();

?>
