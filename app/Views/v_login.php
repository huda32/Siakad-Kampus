<div class="row">

<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('')?>"><b>LOGIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login</p>
    <?php
        $errors = session()->getFlashdata('errors');
        if(!empty($errors)){?>
            <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $key => $value){?>
                    <li><?= esc($value)?></li>
                 <?php }?>   
            <ul>
            </div>
       <?php }?>
    <?php 
    if(session()->getFlashdata('pesan')){
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    if(session()->getFlashdata('sukses')){
      echo '<div class="alert alert-success" role="alert">';
      echo session()->getFlashdata('sukses');
      echo '</div>';
  }
    ?>
    <?php 
    echo form_open('auth/cek_login');
    ?>
      <div class="form-group has-feedback">
        <input name="username" class="form-control" placeholder="Username">
        <span class="fa fa user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <select name="level" class="form-control">
            <option value="">---Pilih Hak Akses---</option>
            <option value="admin">1. Admin</option>
            <option value="mahasiswa">2. Mahasiswa</option>
            <option value="dosen">3. Dosen</option>
       </select>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
     
         
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close() ?>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
</div>