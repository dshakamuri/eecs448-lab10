<!DOCTYPE html>
<html>
<body>

  <form action="ViewUserPosts.php" method="post">
    <?php

    $mysqli = new mysqli("mysql.eecs.ku.edu", "d342s734", "afai9hoo", "d342s734");

    $users = "SELECT * FROM Users";

    echo "Choose a user:&nbsp;";
    echo "<select name='selectUser'>";
    if ($result=$mysqli->query($users))
    {
      while ($row = $result->fetch_assoc())
      {
        $user = $row["user_id"];
        echo "<option value='$user'> $user </option>";
      }
    }
    echo "</select>";

    $result->free();

    $mysqli->close();

    ?>

    <br><br>

    <input type="submit" value="Submit">
  </form>

</body>
</html>
