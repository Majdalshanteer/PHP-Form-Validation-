<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <style>
     
<?php include 'css/landing.css'; ?>
</style>
</head>

<body>

    <div  class="containerc">
    <form  name="myForm" >
       
        <h1 style="text-align:center ">Hello There!</h1>
        <p style="text-align:center " class="create">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus, autem.</p>
        <img src="2.png" style="margin:auto ;display:block; width:60%;height:30%;">

        <a class="btn btn-primary rounded-5 fs-4 my-4" href="./login.php">Login</a>
        <a class="btn btn-danger rounded-5 fs-4" href="./signup.php" >Sign UP</a>
    

       </div>
      </form>
    </div>
  </div>


</body>
</html>