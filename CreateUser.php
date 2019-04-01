<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "i999h056", "je4heeki", "i999h056");

/* check connection */
if ($mysqli -> connect_errno) {
  printf("Connect failed: %s\n", $mysqli -> connect_error);
  exit();
}

if( empty($_POST["username"]) ) {
  echo "No input detected! <a href=\"CreateUser.html\">Go back</a>";
  exit();
}
$stmt = $mysqli -> prepare("INSERT INTO users (user_id) VALUES ( ? )");
$stmt -> bind_param("s", $_POST["username"]);
$stmt -> execute();
?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Create User</title>
  </head>
  <body>
<?php
if ( $mysqli -> errno ) {
  if( $mysqli -> errno == 1062 ) {
    echo "Username already taken!\n";
  } else {
    echo "Unknown error! Contact <a href=\"mailto:i999h056@ku.edu\">Ian</a>.\n";
  }
} else {
  printf( "Welcome %s! Your username has been created and recorded succesfully!\n", $_POST["username"] );
}
?>
  </body>
</html>
