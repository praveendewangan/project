<div class="row">
  <div class="col-md-12" align="center">
    <div class="col-md-6">
      <form action="<?=base_url('Welcome/register_submit');?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
      <h3 class="title1">Registeration</h3>
      <?=$this->session->flashdata('errorMessage');?>
      <?=$this->session->flashdata('successMessage');?>
      <div class="form-group has-success">
        <input type="text" name="name" class="form-control is-valid" placeholder="Name" pattern="[a-zA-Z\s]+" required="" value="<?=$this->session->flashdata('user_name');?>">
        <?= $this->session->flashdata('login_error_name');?>
      </div>

      <div class="form-group has-success">
        <input type="email" name="email" class="form-control is-valid" placeholder="Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" value="<?=$this->session->flashdata('user_email');?>">
        <?= $this->session->flashdata('login_error_email');?>
      </div>

      <div class="form-group has-success">
        <input type="text" name="mobile" class="form-control is-valid" placeholder="Mobile" pattern="[6789][0-9]{9}" value="<?=$this->session->flashdata('user_mobile');?>">
        <?= $this->session->flashdata('login_error_mobile');?>
      </div>

      <div class="form-group has-success">
        <input type="password" name="password" class="form-control is-valid" placeholder="Password" required="">
        <?= $this->session->flashdata('login_error_password');?>
      </div>

      <div class="form-group has-success">
        <input type="password" name="confirm_password" class="form-control is-valid" placeholder="Confirm Password" required="">
        <?= $this->session->flashdata('login_error_confirm_password');?>
      </div>

      <div class="form-group has-success">
        <input type="file" name="userfile" class="form-control is-valid" required="">
      </div>

      <div class="form-group">
        <input type="submit" name="submit" class="form-control btn btn-success " value="Submit">
      </div>

    </div>
  </form>
  </div>
</div>
</div>      