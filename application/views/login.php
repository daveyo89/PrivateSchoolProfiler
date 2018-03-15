<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('templates/head'); ?>
    <title>PrivateSchoolProfiler | Log in</title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>PrivateSchool</b>Profiler</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <p style="text-align: center">
      <img src="assets/uploads/website/odin.jpg" class="logo" style="width: 80%; height: 80%; object-fit: contain">
      </p>
      <p class="login-box-msg">Sign in to start your session</p>

      <?php echo validation_errors(); ?>
    <!--<form action="" method="post"> -->
      <?php echo form_open('login'); ?>
      <div class="form-group has-feedback">
        <input type="email" name="user_email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="user_password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label class="custom-checkbox">
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>

    <div class="social-auth-links text-center">

    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php print(base_url()); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php print(base_url()); ?>assets/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php print(base_url()); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>
