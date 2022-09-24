<?php
session_start();
?>
<?php
include "./connect.php";
?>

<?php
/////php validation
$email =  $password =  null;
$emailErr =  $passwordErr = null;
$note = null;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
// if (isset($_POST['submit'])) { 
    if (empty($_POST['email'])) {
        $emailErr = " email required";
    }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // check if e-mail address is well-formed
        $emailErr = "invalid email";
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $passwordErr = "password required";
    }else {
        $password=$_POST['password'];
    }
  }
  ?>


  <?php
  //check if user data correct and exist in database
  if(isset($_POST['submit'])) {
    $sqlMatch = "SELECT * FROM users WHERE  email='" . $_POST["email"] . "' AND pass='" . $_POST["password"] . "'    ";
    $resultMatch = mysqli_query($conn, $sqlMatch);
    $num = mysqli_num_rows( $resultMatch);
   
    if($num > 0) {
        //variable equal array contains all column in table
         $row= mysqli_fetch_assoc($resultMatch);   
         
        print_r($row) ;
        //define $_SESSION['variablename']= $row['column title'];
        $_SESSION['name']= $row['fullname'];
        $_SESSION['admin']= $row['admin'];
   
        if($row['admin']==0){
          header("location:welcome.php");  
        }else{
            header("location:admin.php"); 
        }
     

        exit();
      }
      else {
  ?>
  <hr>
  <font color="red"><b>
          <h3>Sorry Invalid Email or Password<br>
              </h3>
      </b>
  </font>
  <hr>
   
  <?php
        }
  }
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="login.css"> -->
    <style>
     
<?php include 'css/login.css'; ?>
</style>

   
 
    

</head>
<body>
    <div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" action="">
       
        <h1 style="text-align:center ">Login</h1>
        <p style="text-align:center ;" class="create">Sign in to continue</p><br>
        <label for="mail" >Email </label>
        <input   autofocus id="email" name="email" />
        <span class="err">
                <?php
                if (isset($emailErr)) {
                    echo  $emailErr;
                }
                ?>
            </span> 
        <div id="one"class="err"></div><br>
       
        <label for="pass"> Password </label>
        <input
          type="password"  id="pass" name="password"autocomplete="current-password" />
       <span class="err">
        <?php
        if(isset($passwordErr)){
          echo $passwordErr;
        }
        ?>
       </span>
        <div id="three" class="err"></div><br />
        <span class="error">
            <?php
            if (isset($note)) {
                echo "* " . $note;
            }
            ?>
        </span>
        <input class="signForm" type="submit" name="submit"  value="LOG IN " />
        <a class="forget" href="./signup.php" >Don't have an account? <b>Sign Up</b></a>
        <div id="invalid"></div>

       </div>
      </form>
    </div>
  </div>

   <script src="js/login.js"></script>
 

</body>
</html>