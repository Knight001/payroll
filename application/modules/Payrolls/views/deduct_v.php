
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
              </div>
              <!-- /.card-header -->

                <form action="<?php echo base_url(); ?>settings" method="post">
               <div class="card-body">
                 <div class="row">
                   <?php foreach($deductions as $deduction): ?>
                     <div class="col-md-8 offset-2">
                       <div class="form-group">
                         <label for=""><input type="checkbox" name="deduct[]" value="<?php echo $deduction->id; ?>"  class="form-check-input" id="exampleCheck1<?php echo $deduction->id; ?>"><?php echo strtoupper($deduction->description); ?></label>
                       </div>
                     </div>

                         <?php endforeach; ?>
                 </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save changes</button>
                   </div>
                 </form>

            </div>
       <!-- /.card -->
