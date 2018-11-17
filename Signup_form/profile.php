<?php
if(isset($_SESSION['u_id']))
{

}
else
{
		$error = "<div class='text-danger'>Please Login.</div>";
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
</head>
<body>	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Articles</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <form action="http://localhost/project/blog/index.php/user/search" class="form-inline my-2 my-lg-0 mr-auto" method="post" accept-charset="utf-8">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="query">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>&nbsp;&nbsp;&nbsp;
        </form>    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="logout.php" class="btn btn-primary">Logout</a><!--         <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a> -->
      </li>
    </ul>
  </div>
</nav>


    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
</body>
</html>