<?php
include "./connect.php";
?>

<?php
/////php validation

$email = $name = $birth = $mobile = $password = $passwordConfirm = null;
$emailErr = $nameErr = $birthErr = $mobileErr = $passwordErr = $passwordConfirmErr = null;
$note = null;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
// if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $nameErr = " name required";
    }
    // else if(!preg_match("/^([a-zA-Z' ]+)$/",$_POST['name'])){
    //     echo 'writ full name ';
    // }
     else {
        $name = $_POST['name'];
    } 

    if (empty($_POST['email'])) {
        $emailErr = " email required";
    }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // check if e-mail address is well-formed
        $emailErr = "invalid email";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['phone'])) { 
         $mobileErr = "mobile required";
    }
    else if (strlen($_POST['phone']) != 10) {
    $mobileErr = "Should be 10 digits ";
    } else {
    $mobile = $_POST['phone'];
    }

    if (empty($_POST['birthday'])) {
        $birthErr = "date required";
    } else {
        $birth = $_POST['birthday'];
    }
 
    $password = $_POST['password'];
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if (empty($_POST['password'])) {
            $passwordErr = "password required";
        }
    else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $passwordErr = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
        // echo 'Strong password.'; 
        $password=$_POST['password'];
    }
    
    if (empty($_POST['checkpass'])) {
        $passwordConfirmErr = "confirm password";
    }
    if ($_POST['password'] != $_POST['checkpass']) {
       $passwordConfirmErr = "not match";
    } else {
        $passwordConfirm = $_POST['password'];
    }

//insert user data to database 
// if(isset($_POST['submit'])) {
    if ( isset($name)  &&isset($email) && isset($mobile) && isset($birth) && isset($password)&& isset($passwordConfirm) ) {
     
     //Avoiding duplicate emails
        $checkUser="SELECT * FROM users where email='$email'";
       $result=mysqli_query($conn, $checkUser);
       $count=mysqli_num_rows($result);
       if($count>0){
        echo"<b>Email is already signed up, use another one</b>";
       }
       else{
        $note = "Registered Successfully";
        $sql = "INSERT INTO users(fullname,	email, mobile_number ,Date_of_birth ,pass) 
        VALUES('$name','$email','$mobile','$birth','$password')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        mysqli_close($conn);
        header("location:login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

       }
       
        

    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
   <style>
     <?php include 'css/signup.css'; ?>
   </style>
   
</head>

<body>
<a href="admin.php"><input  class="  btn  btn-light" type="submit" value="Back " name="submit"/><img src='skip-backward-fill.svg'></a><br />

    <div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" >
       
        <h1 style="text-align:center ">Sign Up</h1>
        <p style="text-align:center ;" class="create">Create an account,it's free</p>
     
        <label for="name" class="form-label "><b>Name:</b></label>
        
        <input type="text"  autofocus name="name" id="name" />
          <span class="err">
                <?php
                if (isset($nameErr)) {
                    echo  $nameErr;
                }
                ?>
            </span>
            <div id="zero" class="err"></div><br />
      
     
        
        <label for="mail" >Email </label>
        <input   id="email" name="email"  />
          <span class="err">
                <?php
                if (isset($emailErr)) {
                    echo  $emailErr;
                }
                ?>
            </span> 
            <div id="one" class="err"></div><br />
     
        
        <label for="phone">Mobile </label>
        <input type="number"  name="phone" id="phone">
         <span class="err">
                <?php
                if (isset($mobileErr)) {
                    echo  $mobileErr;
                }
                ?>
            </span>
            <div id="two" class="err"></div><br />
       

        <label for="birthday">Birthday:</label>
       <input type="date" id="birthday" name="birthday" >
       <span class="err">
       <?php
                if (isset($birthErr)) {
                    echo  $birthErr;
                }
                ?>
            </span>
            <div id="four" class="err"></div><br />
       
       

        <label for="password"> Password </label>
        <input type="password" id= "pass"  name="password"  autocomplete="current-password"/>
        <span class="err">
                <?php
                if (isset($passwordErr)) {
                    echo  $passwordErr;
                }
                ?>
            </span> 
            <div id="three" class="err"></div><br /> 
       
         <label for="chekpass"> confirm Password </label>
        <input type="password" id= "password2"  name="checkpass"  autocomplete="current-password" onkeyup="checkPassword(); "/>
        <span class="err">
                <?php
                if (isset($passwordConfirmErr)) {
                    echo  $passwordConfirmErr;
                }
                ?>
            </span>
             <div id="pw2_check"class="err"></div>  <br />
         
    
          <!-- success login message -->
             <span class="error">
            <?php
            if (isset($note)) {
                echo "* " . $note;
            }
            ?>
        </span>
        <input id="submitBtn" class="signForm" type="submit" value="SIGN UP " name="submit"/><br />
        <a class="forget" href="./login.php" >already have an account? <b>log in</b></a>
        <div id="invalid"></div>

       </div>
      </form>
    </div>
  </div>
<script src="./js/signup.js">
</script>


</body>
</html>