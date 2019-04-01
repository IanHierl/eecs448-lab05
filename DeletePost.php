<?php

$mysqli = new mysqli( "mysql.eecs.ku.edu", "i999h056", "je4heeki", "i999h056" );

/* check connection */
if ($mysqli -> connect_errno) {
  printf( "Connect failed: %s\n", $mysqli -> connect_error );
  exit();
}

if( !empty($_POST) ) {
  $stmt = $mysqli -> prepare( "DELETE FROM posts WHERE post_id = ?" );
  foreach( $_POST["posts"] as $post_id ) {
    $stmt -> bind_param( "i", $post_id );
    $stmt -> execute();
  }
  $stmt -> close();
}
?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Delete Posts</title>
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
    <form method="post" action="DeletePost.php">
      <table>
        <tr>
          <th>User ID</th>
          <th>Post Content</th>
          <th>Delete?</th>
        </tr>
<?php
if( $result = $mysqli -> query( "SELECT * FROM posts" ) ) {
  while( $row = $result -> fetch_assoc() ) {
    echo "        <tr>\n";
    echo "          <td>{$row["author_id"]}</td>\n";
    echo "          <td>{$row["content"]}</td>\n";
    echo "          <td><input type=\"checkbox\" name=\"posts[]\" value=\"{$row["post_id"]}\"></td>\n";
  }
}
?>
      </table>
      <input type="submit" value="Delete!">
    </form>
  </body>
</html>

<?php

$mysqli -> close();

?>
