<?php
include "init.php";
if(!isset($_SESSION['id']))
{
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Dashboard</title>
 <link rel="stylesheet" href="assets/css/style.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
</head>
<body>
 
 <div class="contain" style="padding: 20px;">
  <?php if(isset($_SESSION['login_success']))
  { 
    echo '<div class="success">';
    echo $_SESSION['login_success'];
    echo '</div>';
  }
  unset($_SESSION['login_success']);
  ?>
  <h2>Welcome to the dashboard!</h2><hr>
  <a href="logout.php">Logout</a>
 </div>


</body>
</html>