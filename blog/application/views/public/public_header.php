<!DOCTYPE html>
<html>
<head>
	<title>Articles List</title>
	<?= link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Articles</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <?= form_open('user/search',['class'=>'form-inline my-2 my-lg-0 mr-auto']);?>
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="query">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>&nbsp;&nbsp;&nbsp;
    <?= form_error('query','<p class="navbar-text text-danger">','</p>');?>
    <?= form_close();?>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <?= anchor('login','Login');?>
<!--         <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a> -->
      </li>
    </ul>
  </div>
</nav>