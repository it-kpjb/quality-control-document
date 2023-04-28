<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title> <?= (base_url()) ? 'Dashboard' : $title ?> </title>

  <!-- Bootstrap -->
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Datatables -->

  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link type="text/css" media="screen" href="<?php echo base_url(); ?>/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
  <style>
    .hidden_nav {
      opacity: 0;
      transition: opacity 1s ease;
    }

    .loaded_nav {
      opacity: 1;
    }
  </style>
  <?= $this->renderSection('admin-styles') ?>


  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>/assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-files-o"></i> <span>Quality Control</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <!-- <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url('uploads/user.png') ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome, <?= user()->name; ?></span>
            </div>
          </div> -->
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <?= $this->include('templates/sidebar') ?>
          <!-- /sidebar menu -->


        </div>
      </div>

      <!-- top navigation -->
      <?= $this->include('templates/topbar') ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <?= $this->renderSection('content') ?>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?= $this->include('templates/footer') ?>
      <!-- /footer content -->
    </div>
  </div>

  <?= $this->include('templates/modal-confirm') ?>


  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>/assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>/assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url(); ?>/assets/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="<?php echo base_url(); ?>/assets/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="<?php echo base_url(); ?>/assets/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?php echo base_url(); ?>/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>/assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="<?php echo base_url(); ?>/assets/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="<?php echo base_url(); ?>/assets/vendors/Flot/jquery.flot.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/Flot/jquery.flot.time.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="<?php echo base_url(); ?>/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="<?php echo base_url(); ?>/assets/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo base_url(); ?>/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url(); ?>/assets/vendors/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Datatables -->
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url(); ?>/assets/build/js/custom.min.js"></script>

  <!-- wywiyg -->
  <!-- <script src="<?php echo base_url(); ?>/assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script>
    function hapus(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }

    $(window).on('load', function() {
      let getSidebar = $('#sidebar-menu');
      let getNavMenu = $('.parent_menu');

      for (let i = 0; i < getNavMenu.length; i++) {
        let getNavMenuChildrenLength = getNavMenu[i].children[1].childElementCount;
        if (getNavMenuChildrenLength == 0) {

          getSidebar.addClass('loaded_nav');
          console.log(getNavMenu[i].style.display = 'none')
        }
        getSidebar.removeClass('hidden_nav');
      }
    })
  </script>

  <?= $this->renderSection('scripts') ?>
</body>

</html>