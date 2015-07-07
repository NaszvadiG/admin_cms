<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/ionicons/ionicons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/_all-skins.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <base href="<?php echo base_url() ?>">
  </head>
  <body class="skin-blue">
    <div class="wrapper">

      <header class="main-header">
        <a href="<?php echo site_url('dashboard'); ?>" class="logo"><b>Administrator</b></a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/images/ado.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $this->session->userdata('firstname'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/images/ado.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?>
                      <small>Terdaftar Pada Tanggal <?php echo date('d-m-Y',strtotime($this->session->userdata('date_created'))); ?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo site_url('login/log_out'); ?>" class="btn btn-primary btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Url Menu Browser -->
      <?php
        $uri1 = $this->uri->segment(1);
        $uri2 = $this->uri->segment(2);
      ?>

      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo $uri1 == 'dashboard' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('dashboard'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="<?php echo $uri1 == 'banners' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('banners'); ?>">
                  <i class="fa fa-camera-retro"></i> <span>Banner</span>
              </a>
          	</li>
          	<li class="<?php echo $uri1 == 'news' ? 'active' : ''; ?>">
              <a href="<?php echo site_url('news'); ?>">
                  <i class="fa fa-file"></i> <span>Berita</span>
              </a>
          	</li>
          	<li class="treeview <?php echo $uri1 == 'photos' || $uri1 == 'videos' ? 'active' : ''; ?>">
              <a href="#">
                <i class="fa fa-film"></i> <span>Galleri</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview <?php echo $uri1 == 'photos' ? 'active' : ''; ?>"><a href="<?php echo site_url('photos'); ?>"><i class="fa fa-circle-o"></i> Foto</a></li>
                <li class="treeview <?php echo $uri1 == 'videos' ? 'active' : ''; ?>"><a href="<?php echo site_url('videos'); ?>"><i class="fa fa-circle-o"></i> Video</a></li>
              </ul>
            </li>
            <li class="treeview <?php echo $uri1 == 'users' ? 'active' : ''; ?>">
              <a href="#">
                <i class="fa fa-gear"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview <?php echo $uri1 == 'users' ? 'active' : ''; ?>"><a href="<?php echo site_url('users'); ?>"><i class="fa fa-circle-o"></i> Pengguna</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>

        <!-- Load Content -->
        <?php echo $this->load->view($content); ?>

      <footer class="main-footer">
	    <div class="text-center">
	      <strong>Copyright &copy; 2014 - <?php echo date('Y'); ?> <a href="<?php echo site_url('dashboard'); ?>">Ado Pabianko</a>.</strong> All rights reserved.
	    </div>
      </footer>

    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js'></script>
    <script src='<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js'></script>
    <script src='<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js'></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
          //Data Tables
          $('#dataTable').dataTable( {
              "aoColumnDefs": [
              //Remove sorting
                  { 'bSortable': false, 'aTargets': [ '_all' ] }
              ]
          });
      });
    </script>
  </body>
</html>