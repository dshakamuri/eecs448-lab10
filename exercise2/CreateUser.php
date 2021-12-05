<?php

function create()
{
  $name = $_POST["userName"];

  if(empty($name))
  {
    echo "You did not fill out a user name.";
  }
  else
  {
    $mysqli = new mysqli("mysql.eecs.ku.edu", "d342s734", "afai9hoo", "d342s734");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "INSERT INTO Users(user_id)
              VALUES('$name')";

    if ($mysqli->query($query))
    //if inserted successfully
   {
     echo "New user was successfully stored in the database!";
   }
   else
   //if not, the user already exists
   {
     echo "This user already exists.";
   }

    /* close connection */
    $mysqli->close();
  }
}

echo create();


?>
