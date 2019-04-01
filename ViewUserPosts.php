<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "i999h056", "je4heeki", "i999h056");

/* check connection */
if ($mysqli -> connect_errno) {
  printf("Connect failed: %s\n", $mysqli -> connect_error);
  exit();
}

if( !empty($_POST) ) $user_selected = true;
else $user_selected = false;
?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>View Posts By User</title>
  </head>
  <body>
    <form method="post" action="ViewUserPosts.php">
      <label for="user_select">Select User: </label>
      <select name="user_select" id="user_select">
<?php
if( $result = $mysqli -> query("SELECT * FROM users") ) {
  while( $row = $result -> fetch_assoc() ) {
    echo "        <option value=\"{$row["user_id"]}\">{$row["user_id"]}</option>\n";
  }
}
?>
      </select>
      <input type="submit" value="Search!">
    </form>
    <br>
    <table>
      <tr>
        <th>User ID</th>
        <th>Post Text</th>
      </tr>
<?php
if( $user_selected ) {
  $stmt = $mysqli -> prepare("SELECT * FROM posts WHERE author_id = ?");
  $stmt -> bind_param( "s", $_POST["user_select"] );
  $stmt -> execute();
  $result = $stmt -> get_result();

  if( $result -> num_rows === 0 ) echo "No posts found.\n";
  else {
    while( $row = $result -> fetch_assoc() ) {
      echo "      <tr>\n";
      echo "        <td>{$row["author_id"]}</td>\n";
      echo "        <td>{$row["content"]}</td>\n";
      echo "      </tr>\n";
    }
  }
  $stmt -> close();
}
?>
    </table>
  </body>
</html>

<?php

$mysqli -> close();

?>
