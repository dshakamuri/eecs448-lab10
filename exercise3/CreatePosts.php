<?php

function writePost()
{
  $name = $_POST["userName"];
  $post = $_POST["userPost"];

  if(empty($name))
  {
    echo "You did not fill out a user name.";
  }

  else
  //if user name is not empty
  {
    if(empty($post))
    {
      echo "Your post has no text, and hence could not be saved.";
      $empty=1;
    }

    if($empty!=1)
    {
      $mysqli = new mysqli("mysql.eecs.ku.edu", "d342s734", "afai9hoo", "d342s734");

      //check connection
      if ($mysqli->connect_errno)
      {
          printf("Connect failed: %s\n", $mysqli->connect_error);
          exit();
      }

      $insert = "INSERT INTO Posts(author_id, content)
                VALUES('$name', '$post')";

      $checkUsers = "SELECT * FROM Users";
      if ($result=$mysqli->query($checkUsers))
      //if inserted successfully
     {
       /* fetch associative array */
      while ($row = $result->fetch_assoc())
      {
        //if given author_id exists in Users table
        if($row["user_id"]==$name)
        {
          if($mysqli->query($insert))
          {
            $userExists=1;
            echo "A new post written by " .$name." was successfully stored in the database!";
          }
        }
      }

      if($userExists!=1)
      {
        echo "The post was not written by an existing user, and hence could not be saved.";
      }

      /* free result set */
      $result->free();
     }

      //close connection
      $mysqli->close();
    }
  }
}

echo writePost();
?>
