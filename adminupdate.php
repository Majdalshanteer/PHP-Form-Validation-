<?php
include "./connect.php";
?>

<?php 

  $id=$_GET['updateid'];
  $sql="SELECT * from users where id=$id ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  // show input field with first values befor changes
  $name=$row["fullname"];
  $email=$row["email"];
  $pass=$row["pass"];
  $date_birth=$row["Date_of_birth"];
  $date_birth=$row["salary"];
  $mobile=$row["mobile_number"];


  if(isset($_POST['submit'])){

    $nameField=$_POST ['name'];
    $emailField=$_POST ['email']; 
    $phoneField=$_POST['phone'];
    $birthField=$_POST ['birthday'];
    $passField=$_POST['password'];
    $salaryField=$_POST['salary'];


$sql="UPDATE users set id=$id,fullname='$nameField', email='$emailField',
mobile_number='$phoneField',Date_of_birth='$birthField' ,pass='$passField',salary='$salaryField '
where id=$id";

$result=mysqli_query($conn,$sql);
if($result){
    echo"success";
    header('location: superadmin.php');

}else{
    die(musqli_error($conn));
}

  }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="signup.css">
    <style>
     <?php include 'css/signup.css'; ?>
   </style>

</head>


<body>
<a href="superadmin.php"><input  class="  btn  btn-success" type="submit" value="Back " name="submit"/></a>
    <div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" >
       
        <h1 style="text-align:center ">Update Data</h1>
       
     
        <label for="name" class="form-label "><b>Name:</b></label>
        
        <input type="text"  name="name" id="name" value=<?php
        echo  $name;?> />
        <div id="zero" class="err"></div><br />
     
        
        <label for="mail" >Email </label>
        <input   autofocus id="email" name="email" value=<?php
        echo  $email;?>  />
        <div id="one" class="err"></div><br />
        
        <label for="phone">Mobile </label>
        <input type="number"  name="phone" id="phone" value=<?php
        echo  $mobile;?>>
        <div id="two" class="err"></div><br />

        <label for="birthday">Salary:</label>
       <input type="text" id="birthday" name="salary" value=<?php
        echo  $date_birth;?>><br>
       <div id="four" class="err"></div><br />

        <label for="birthday">Birthday:</label>
       <input type="date" id="birthday" name="birthday" value=<?php
        echo  $date_birth;?>><br>
       <div id="four" class="err"></div><br />
       

        <label for="password"> Password </label>
        <input type="password" id= "pass"  name="password"  autocomplete="current-password" value=<?php
        echo  $pass;?>/><br>
        <!-- <div id="three" class="err"></div><br />  <label for="chekpass"> confirm Password </label>
        <input type="password" id= "password2"  name="checkpass"  autocomplete="current-password" onkeyup="checkPassword(); "/>
         <div id="pw2_check"class="err"></div>
        <br /> -->
    
        
        <input id="submitBtn" class="signForm" type="submit" value="Update " name="submit"/><br />
       

       </div>
      </form>
    </div>
  </div>
  
  
  <!-- <script src="js/signup.js"></script> -->

</body>
</html>