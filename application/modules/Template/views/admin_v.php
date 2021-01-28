<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page; ?> | <?php echo $section; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>dashboard" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/img/logo.jpeg" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/user.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url(); ?>#" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>employees" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>overtime" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Overtime</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>advance" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advance Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>schedules" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedules</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>deductions" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Deductions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>earnings" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
               Earnings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>positions" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
               Positions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>payroll" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Payroll
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>payee" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Payee Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>attendance" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>Attendance</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admins" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>roles" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>#" class="nav-link" id="Logout">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Signout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $page; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $page; ?></a></li>
              <li class="breadcrumb-item active"><?php echo $section; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-xs-offset-3">
                <?php if($this->session->flashdata('success')) : ?>
                    <?php echo '<p class="alert alert-success alert-dismissible">'.$this->session->flashdata('success').'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>'; ?>

                        <?php endif; ?>
                            <?php if($this->session->flashdata('error')) : ?>
                                <?php echo '<p class="alert alert-danger alert-dismissible">'.$this->session->flashdata('error').'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i></p>'; ?>
                                    <?php endif; ?>
                                        <!-- <?php echo validation_errors('<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i></p>'); ?> -->
            </div>
        </div>
      <?php $this->load->view($content_view); ?>
       </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer hidden-print">
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>#">Payroll Mgt System</a>.</strong>
    All rights reserved.

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins//datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins//datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script> -->

<script>
        $('#createUser').click(function() {
                  var posturl = "adduser";
                 var form_data = $('#addForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New user successfully added!</div>');

                                  window.location.href ="admins";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new user! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });
                  $('#Logout').click(function() {
                  var posturl = "<?php echo base_url(); ?>logout";

                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: {logout : 'logout'},
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">You have successfully logged out!</div>');

                                  window.location.href ="<?php echo base_url(); ?>";
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Failed to logout.</div>');
                              }

                          }
                      });
                      return false;
                  });
                  $('#createRole').click(function() {
                  var posturl = "addrole";
                 var form_data = $('#addRoleForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New role successfully added!</div>');

                                  window.location.href ="roles";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new role! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });
                  $('#createEmployee').click(function() {
                  var posturl = "addemployee";
                 var form_data = $('#EmployeeForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New employee successfully added!</div>');

                                  window.location.href ="employees";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new employee! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });
                  $('#createDeduction').click(function() {
                  var posturl = "deduct";
                 var form_data = $('#DeductionForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New deduction successfully added!</div>');

                                  window.location.href ="deductions";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new deduction! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

  $(function () {
    $('.select2').select2()
  //Date range picker
  $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#reservationdate1').datetimepicker({
        format: 'L'
    });

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  });
  $(".monthpicker").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm",
    showButtonPanel: true,
    currentText: "This Month",
    onChangeMonthYear: function (year, month, inst) {
        $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month - 1, 1)));
    },
    onClose: function(dateText, inst) {
        var month = $(".ui-datepicker-month :selected").val();
        var year = $(".ui-datepicker-year :selected").val();
        $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month, 1)));
    }
}).focus(function () {
    $(".ui-datepicker-calendar").hide();
}).after(
    $("<a href='javascript: void(0);'>clear</a>").click(function() {
        $(this).prev().val('');
    })
);
</script>
</body>
</html>
