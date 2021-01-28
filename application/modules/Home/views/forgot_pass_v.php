<!-- <div class="login-form">	
<form action="<?php echo base_url(); ?>reset?a=<?php echo $_GET['a']; ?>" method="post">  		
    <input type="email"  name="email" placeholder="Email" required="" />    				
    <input type="submit" name="admin" class="btn btn-danger" value="reset">
</form>	
<div class="clearfix"></div>
<br/>
<p> <span style="color:#000"> Have password?</span> <a href="<?php echo base_url(); ?>admin">Login</a></p>
</div>	 -->

<div class="text-center">
                    <h2 class="logo"><img src="https://auctioneers.contitouch.co.zw/assets/logo1.png" alt=""/></h2>
                    <h4 class="loginadmin"></h4>
                </div>

                <form class="sign-in-form" role="form" <?php echo base_url(); ?>reset?a=<?php echo $_GET['a']; ?>" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control"  name="email" placeholder="Enter  Email" required="">
                    </div>
                    <button input type="submit" name="admin" class="btn btn-danger btn-block" value="reset">Login</button>
                    <div class="text-center help-block">
                        <a href="<?php echo base_url(); ?>admin"><small>Have Password? Login</small></a>
                    </div>
                </form>