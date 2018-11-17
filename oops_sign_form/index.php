
<?php
include "init.php";
if(isset($_SESSION['id']))
{
  header("Location:profile.php");
}
if(isset($_POST['submit']))
{
  $data = [
            'name' => test_input($_POST['name']),
            'email' => test_input($_POST['email']),
            'password' => test_input($_POST['password']),
            'confirm_password' => test_input($_POST['con_password']),
            'name_error' => '',
            'email_error' => '',
            'password_error' => '',
            'confirm_error' => ''
          ];
// name validation
          if(empty($data['name']))
          {
            $data['name_error'] = "Name is required!";
          }

// email vaildation          

          if(empty($data['email']))
          {
            $data['email_error'] = "Email is required!";
          }
          else
          {
            $source->query("SELECT * FROM users where email = '".$data['email']."'");
            if($source->count_rows() > 0)
            {
              $data['email_error'] = "Sorry Email is already exist";
            }
          }

// password vaildation
          if(empty($data['password']))
          {
            $data['password_error'] = "Password is required";
          }
          else if(strlen($data['password']) < 5)
          {
            $data['password_error'] = "Password is too short";
          }

// confirm password vaildation
          if(empty($data['confirm_password']))
          {
            $data['confirm_error'] = "Confirm password is required";
          }
          else if($data['password'] != $data['confirm_password'])
          {
            $data['confirm_error'] = "Confirm password is not matched";
          } 


// submit form

          if(empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_error']))
          {
              $name = $data['name'];
              $email = $data['email'];
              $password = password_hash($data['password'],PASSWORD_DEFAULT);
              if($source->query("INSERT INTO users (name,email,password) VALUES('$name','$email','$password')"))

              $_SESSION['account_created'] = "Your account is created";
              header("Location:login.php");
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
    <form action="" method="post">
     <div class="group">
      <h3 class="heading">Create account</h3>
     </div>
     <div class="group">
      <input type="text" name="name" class="control" placeholder="Enter Name..."
      value="<?php if(!empty($data['name'])):
          echo $data['name'];
          endif;?>">
     </div>
     <div class="error">
       <?php if(!empty($data['name_error'])):
        echo $data['name_error'];
        endif;
       ?>
     </div>
     <div class="group">
      <input type="email" name="email" class="control" placeholder="Enter Email..""
      value="<?php if(!empty($data['email'])):
          echo $data['email'];
          endif;?>">
     </div>
     <div class="error">
       <?php if(!empty($data['email_error'])):
        echo $data['email_error'];
        endif;
       ?>
     </div>
     <div class="group">
      <input type="password" name="password" class="control" placeholder="Create Password...">
     </div>
     <div class="error">
       <?php if(!empty($data['password_error'])):
        echo $data['password_error'];
        endif;
       ?>
     </div>
     <div class="group">
      <input type="password" name="con_password" class="control" placeholder="Confirm Password...">
     </div>
     <div class="error">
       <?php if(!empty($data['confirm_error'])):
        echo $data['confirm_error'];
        endif;
       ?>
     </div>
     <div class="group m20">
      <input type="submit" name="submit" class="btn" value="Create account &rarr;" style="outline:none;">
     </div>
     <div class="group m20">
      <a href="login.php" class="link">Already have an account ?</a>
     </div>
    </form>
   </div>
  </div>
 </div>


</body>
</html>