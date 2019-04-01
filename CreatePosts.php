<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "i999h056", "je4heeki", "i999h056");

/* check connection */
if ($mysqli -> connect_errno) {
  printf("Connect failed: %s\n", $mysqli -> connect_error);
  exit();
}

if( empty($_POST["username"]) || empty($_POST["content"]) ) {
  echo "No input detected! <a href=\"CreatePosts.html\">Go back</a>";
  exit();
}

$stmt = $mysqli -> prepare("INSERT INTO posts (content, author_id) VALUES ( ?, ? )");
$stmt -> bind_param("ss", $_POST["content"], $_POST["username"]);
$stmt -> execute();

?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Create Post</title>
  </head>
  <body>
<?php

if ( $mysqli -> errno ) {
  if( $mysqli -> errno == 1452 ) {
    echo "Unknown username!\n";
  } else {
    echo "Unknown error! Contact <a href=\"mailto:i999h056@ku.edu\">Ian</a>.\n";
  }
} else {
  printf( "Thank you, %s! Post successfully created!\n", $_POST["username"] );
}

echo "<a href=\"CreatePosts.html\">Go back</a>\n";

?>
  </body>
</html>
