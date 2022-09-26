<?php
include "./connect.php";
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
<?php

  $sql = "SELECT * FROM users; ";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows( $result);
//   echo  "Number of employees:".$num;

$result2 = mysqli_query($conn, 'SELECT SUM(salary) AS value_sum FROM users'); 
$row = mysqli_fetch_assoc($result2); 
$sum = $row['value_sum'];
// echo $sum;

$result3 = mysqli_query($conn,'SELECT MAX(salary) AS max_value FROM users');
$row2 = mysqli_fetch_array($result3);
$max=$row2['max_value'];
// echo $max;

$result4 = mysqli_query($conn,'SELECT MIN(salary) AS min_value FROM users');
$row3 = mysqli_fetch_array($result4);
$min=$row3['min_value'];
// echo $min;

// $result5 = mysqli_query($conn,'SELECT MIN(date_created) AS min_value FROM users');
// $row4 = mysqli_fetch_array($result5);
// $old=$row4['min_value'];
// // echo $old;

// $m =mysqli_query($conn,'SELECT fullname FROM users 
// WHERE salary = SELECT MIN(salary) AS min_value FROM users';
// $result7 = mysqli_query($conn, $m);
// echo $result7['min_value'];


?>
<br>
<br>
<br>


<div class="row bg-info m-2 p-5">
<!-- <div class="col-sm-1"></div> -->
  <div class="col-sm-3">
    <div class="card bg-info text-white">
      <div class="card-body ">
        <h3 class="card-title text-center ">Num Employees</h3>
        <h4 class="card-text text-center"><?php echo " <font color='green'><br><b> $num</b></font>"?></h4>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card bg-info text-white">
      <div class="card-body">
        <h3 class="card-title text-center">Total Salaries</h3>
        <h4 class="card-text  text-center"><?php echo "<font color='green'><br><b>". $sum." JD</b></font>"?></h4>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card bg-info text-white">
      <div class="card-body">
        <h3 class="card-title text-center">Hieghest Salary</h3>
        <h4 class="card-text text-center"><?php echo " <font color='green'><br><b>". $max ." JD </b></font>"?></h4>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card bg-info text-white">
      <div class="card-body">
        <h3 class="card-title text-center">Lowest Salary</h3>
        <h4 class="card-text text-center"><?php echo "<font color='green'><br><b>". $min." JD </b></font>"?></h4>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-2">
    <div class="card bg-info text-white">
      <div class="card-body">
        <h5 class="card-title">Oldest Employee</h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">Go somewhere</a> 
      </div>
    </div>
  </div> -->
</div>
