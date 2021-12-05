<?php

function users()
{
    $mysqli = new mysqli("mysql.eecs.ku.edu", "d342s734", "afai9hoo", "d342s734");

    //check connection
    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $users = "SELECT * FROM Users";

    echo "<table>";
    echo "<tr>";
    echo "<th><strong>" . "Users" . "</strong></th>";

    if ($result=$mysqli->query($users))
    {
     //fetch associative array
      while ($row = $result->fetch_assoc())
      {
        echo "<tr><td>" . $row["user_id"] . "</td></tr>";
      }
    }
    echo "</table>";

    // free result set
    $result->free();


  //close connection
  $mysqli->close();
}

echo users();

?>
