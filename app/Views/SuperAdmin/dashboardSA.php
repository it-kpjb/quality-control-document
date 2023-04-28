<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <?php $this->load->view("partials/header.php") ?> -->
    <?= $this->extend('partials/header.php') ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <?= $this->extend('partials/sidebar.php') ?>
      <?= $this->extend('partials/navbar.php') ?>

        <!-- page content -->
        <div class="right_col" style="min-height: 602px;" role="main">
          <div class="row">
          
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>User </h2>
                  <!-- <ul class="nav navbar-right panel_toolbox"><a href="<?php echo site_url('admin/User/add') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a></ul> -->
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                       <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Id User</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Option</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($user as $user): ?>
                            <tr>
                              <td width="20"><?php echo $user->idUser ?></td>
                              <td width="50"><?php echo $user->username ?></td>
                              <td width="50" align="center"><?php echo $user->password ?></td>
                              <td width="50" align="center"><?php echo $user->email ?></td>
                              <td width="50" align="center"><?php echo $user->role ?></td>
                            
                              <!-- <td width="150" align="center">
                                <a href="<?php echo site_url('admin/user/edit/'.$user->username) ?>" style="margin-right: 10px"><i class="fa fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$user->username) ?>')" href="#!" ><i class="fa fa-trash"></i> Hapus</a>
                              </td> -->
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- /DataTables -->


          </div>
          <br />

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <?php $this->load->view("partials/footer.php") ?> -->
        <?= $this->extend('partials/footer.php')?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Modal --> 
    <!-- <?php $this->load->view("partials/modaldelete.php") ?>
 -->

    
    <!-- js -->
     <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/iCheck/icheck.min.js') ?>"></script>
     

    <!-- Datatables -->
    <script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/jszip/dist/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/pdfmake/build/vfs_fonts.js') ?>"></script>

  <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>
 
 

    <script>
      function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }
    </script>
	
  </body>
</html>
