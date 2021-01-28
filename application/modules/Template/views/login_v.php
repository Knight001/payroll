<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page; ?> | <?php echo $section; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<?php $this->load->view($content_view); ?>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<script>

$('#Signin').click(function() {
                  var posturl = "login";
                 var form_data = $('#loginForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">You have successfully loggedin!</div>');

                                  window.location.href ="dashboard";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Invalid login credentials!.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });
</script>
</body>
</html>
