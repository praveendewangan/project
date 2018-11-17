<div class="row">
  <div class="col-md-12" align="center">
    <div class="col-md-6">
      <form action="<?=base_url('Welcome/signin');?>" method="POST">
      <div class="form-group">
      <h3 class="title1">Login</h3>
      <?=$this->session->flashdata('errorMessage');?>
      <div class="form-group has-success">
        <input type="email" name="email" class="form-control is-valid" placeholder="Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" value="<?=$this->session->flashdata('user_email');?>">
        <?= $this->session->flashdata('login_error_email');?>
      </div>

      <div class="form-group has-success">
        <input type="password" name="password" class="form-control is-valid" placeholder="Password" required="">
        <?= $this->session->flashdata('login_error_password');?>
      </div>

      <div class="form-group">
        <input type="submit" name="submit" class="form-control btn btn-success " value="Submit">
      </div>

    </div>
  </form>
  </div>
</div>
      