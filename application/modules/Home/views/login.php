

              
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>Admin </b>Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

     <form class="sign-in-form" id="loginForm">
     <div id="alert-msg"></div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="username" value="<?php echo set_value("username"); ?>" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" id="Signin" class="btn btn-success btn-block">Login</button>
                    <div class="text-center help-block">
                        <a href="forgot"><small>Forgot password?</small></a>
                    </div>
                </form>
  
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->