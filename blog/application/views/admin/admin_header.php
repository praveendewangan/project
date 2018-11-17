<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<?= link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse mr-auto" id="navbarColor01">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="">Logout <span class="sr-only">(current)</span></a> -->
        <?= anchor('login/logout','Logout');?>
      </li>
    </ul>
  </div>
</nav>