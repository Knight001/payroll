<div class="login-form">	
<form action="<?php echo base_url(); ?>confirm/<?php echo $this->uri->segment(2); ?>" method="post">  
    <input type="hidden" name="access" value="<?php echo base64_decode($_GET['a']); ?>"/>
    <label>New Password</label>
    <input type="password"  name="password" placeholder="Password" required="" />  
    <label>Confirm Passowrd</label>
    <input type="password"  name="cpassword" placeholder="Confirm Password" required="" />    				
    <input type="submit" name="admin" class="btn btn-danger" value="Reset Password">
</form>	
</div>	