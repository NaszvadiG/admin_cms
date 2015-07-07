<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo site_url(); ?>"><b>Administrator</b></a>
      </div>
      <div class="login-box-body">
        <form action="<?php echo site_url('login/log_in'); ?>" method="post">
          <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          <div class="text-danger"></div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" autofocus placeholder="Nama Pengguna"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php echo form_error('username'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Kata Sandi"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo form_error('password'); ?>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  </body>
</html>