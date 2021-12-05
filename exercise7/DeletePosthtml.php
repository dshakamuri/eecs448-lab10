<!DOCTYPE html>
<html>

<body>
  <form action="DeletePost.php" method="post">
    <?php

    $mysqli = new mysqli("mysql.eecs.ku.edu", "d342s734", "afai9hoo", "d342s734");

    $posts = "SELECT content, author_id, post_id
              FROM Posts";

    echo "<table>";
    echo "<th><strong>" . "Posts</strong></th>";
    echo "<th><strong>" . "Authors</strong></th>";
    echo "<th><strong>" . "Delete?</strong></th>";
    if ($result=$mysqli->query($posts))
    {
      while ($row = $result->fetch_assoc())
      {
        echo "<tr><td>" . $row["content"] . "</td>";
        echo "<td>" . $row["author_id"] . "</td>";
        echo "<td><input type='checkbox' name=" . $row["post_id"] . "></tr>";
      }
    }
    echo "</table>";


    $result->free();

    $mysqli->close();

    ?>

     <input type="submit" value="Submit">
    <br><br>
  </form>

</body>
</html>
