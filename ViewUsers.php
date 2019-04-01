<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "i999h056", "je4heeki", "i999h056");

/* check connection */
if ($mysqli -> connect_errno) {
  printf("Connect failed: %s\n", $mysqli -> connect_error);
  exit();
}

?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>View Users</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="CreateUser.html">Create User</a></li>
        <li><a href="CreatePosts.html">Create Post</a></li>
        <li><a href="AdminHome.html">Admin Home</a></li>
      </ul>
    </nav>
    <table>
<?php

if( $result = $mysqli -> query("SELECT (user_id) FROM users") ) {
  while( $row = $result -> fetch_assoc() ) {
    echo "      <tr>\n        <td>{$row["user_id"]}</td>\n      </tr>\n";
  }
  $result -> free();
}

$mysqli -> close();
?>
    </table>
  </body>
</html>
