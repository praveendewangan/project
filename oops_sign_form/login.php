<?php
include "init.php";

if(isset($_SESSION['id']))
{
  header("Location:profile.php");
}
if(isset($_POST['login']))
{

  $data = ['email' => test_input($_POST['email']),
          'password' => test_input($_POST['password']),
          'email_error' => '',
          'password_error' => ''];

          if(empty($data['email']))
          {
            $data['email_error'] = "Email is required";
          }
          if(empty($data['password']))
          {
            $data['password_error'] = "Password is required";
          }

          if(empty($data['email_error']) && empty($data['password_error']))
          {
            $email = $data['email'];
            $password = $data['password'];
            if($source->query("SELECT * FROM USERS WHERE email='$email'"))
            {
              if($source->count_rows() > 0)
              {
                   $row = $source->single();
                  // print_r($row);exit;
                   $id = $row[0];
                   $db_password = $row[3]; 
                   $name = $row[1];
                   if(password_verify($password,$db_password))
                   {
                      $_SESSION['login_success'] = "Hi ".$name." You are successully login!";
                      $_SESSION['id'] = $id;
                      header("Location:profile.php");
                   }
                   else
                   {
                    $data['password_error'] = "Please enter correct password";
                   }
              }
              else
              {
                $data['email_error'] = "Please enter correct email";
              }
            }
          }

}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Singup Form</title>
 <link rel="stylesheet" href="assets/css/style.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet"> 
</head>
<body>
 
 <div class="container">
  <div class="form">
   <div class="form-section">
    <form action="" method="POST">
      <div class="group">
        <?php
        if(isset($_SESSION['account_created']))
        {?>
            <div class="success">
              <?= $_SESSION['account_created'];?>
            </div>
          <?php
        }
        unset($_SESSION['account_created']);
        ?>
      </div>
     <div class="group">
      <h3 class="heading">User Login</h3>
     </div>
     <div class="group">
      <input type="email" name="email" class="control" placeholder="Enter Email.."
      value="<?php
        if(!empty($data['email'])):
        echo $data['email'];
        endif;
      ?>">
      <div class="error">
        <?php
        if(!empty($data['email_error']))
        {
          echo $data['email_error'];
        }
        ?>
      </div>
     </div>
     <div class="group">
      <input type="password" name="password" class="control" placeholder="Create Password...">
      <div class="error">
        <?php
        if(!empty($data['password_error']))
        {
          echo $data['password_error'];
        }
        ?>
      </div>
     </div>
 
     <div class="group m20">
      <input type="submit" name="login" class="btn" value="Login &rarr;">
     </div>
     <div class="group m20">
      <a href="index.php" class="link">Create new account ?</a>
     </div>
    </form>
   </div>
  </div>
 </div>


</body>
</html>