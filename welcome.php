<?php

session_start();

echo " <font color='green'><h1>Welcome  ". $_SESSION['name']. " </h1></font><br>";
// echo " hello ". $_SESSION['name'];
// echo $_SESSION['admin'];

//to prevent access page after logout
if(empty($_SESSION['name']) || $_SESSION['name'] == ''){
    header("Location: index.php");
    die();}
?>
<button class="btn btn- btn-secondary float-end ml-2 my-2" ><a href="index.php"class="text-light">Logout</a></button>





