
<?php
include "./connect.php";
?>
<?php
session_start();
echo " <font color='#346057'><h3><b>Welcome   ". $_SESSION['name']. " To Super Admin Page </b></h3></font><br>";
//after log out destroy this page
if(empty($_SESSION['name']) || $_SESSION['name'] == ''){
  header("Location: index.php");
  die();}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body style="margin:50px;">
 <button class="btn btn-dark my-2" ><a href="dash.php"class="text-light" > Dashbored Page</a></button>




<!-- <button class="btn btn-info my-2" ><a href="signup.php"class="text-light" >Add User</a></button>  -->
<button class="btn btn- btn-secondary float-end ml-2 my-2" ><a href="index.php"class="text-light">Logout</a></button>
    <h1>List Of Admins</h1>
<table class="table table-success table-striped text-center  ">
  <tr>
  <th>id</th>
      <th>full name</th>
        <th>email</th>
        <th>salary</th>
        <th>password</th>
        <th>birthday</th>
        <th>mobile number</th>
        <th>date created</th>
         <!-- <th>date last login </th>  -->
        <th>Operations</th>
  </tr>
  
<?php
  // delete user
  if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    mysqli_query($conn, "DELETE FROM users WHERE id=".$id);
    header('location: superadmin.php');
}


$sql = "SELECT * FROM users WHERE admin=1; ";
  $result = mysqli_query($conn, $sql);

  while($row=$result->fetch_assoc()){
$id=$row["id"];
    echo" <tr>
    <td>".$row["id"] ."</td>
    <td>".$row["fullname"] ."</td>
    <td>".$row["email"]."</td>
    <td>".$row["salary"]."</td>
   
    <td>".$row["pass"]."</td>
    <td>".$row["Date_of_birth"]."</td>
    <td>".$row["mobile_number"]."</td>
    <td>".$row["date_created"]."</td>
 <td>
    <button class='btn btn-info'><a href='adminupdate.php?updateid=".$id."' class='text-light'>Update</a></button>"?>
    <button class='btn btn-danger'> <a onclick="return confirm('Do you want to delete this record?')" href=<?php echo"'superadmin.php?deleteid=".$id."' class='text-light'>Delete</a></button>
    </td>
   

   </tr>";
  }
 


?>


