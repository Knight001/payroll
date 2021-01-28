<div class="col-md-12">
    <div class="col-middle">
    <div class="text-center text-center">
        <h1 class="error-number"><?php echo $section; ?></h1>
        <?php if($section == 'Activation Success'): ?>
        <p style="font-size: 24px; color:seagreen">
        <?php elseif($section == 'Activation Error'): ?>
        <p style="font-size: 24px; color:red">
        <?php endif; ?>   
        <?php echo $message; ?> </p>  

        <?php if($section == 'Activation Success'): ?>
        <a href="<?php echo base_url(); ?>home" class="btn btn-success btn-block">Go To Login Page</a>
        <?php elseif($section == 'Activation Error'): ?>  
        <a href="<?php echo base_url(); ?>activate/<?php echo $this->uri->segment(2); ?>" class="btn btn-warning btn-lg">Try Again</a>
        <?php endif; ?>            
    </div>
    </div>
</div>