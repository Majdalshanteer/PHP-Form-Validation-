<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "form_project";

// Create connection
try {
  $conn = mysqli_connect($servername, $username, $password, $db_name);
//   echo"success connection";


} catch (\Throwable $th) {

  die("<h3>Connection failed to (  $db_name ) database</h3>");
}

?>