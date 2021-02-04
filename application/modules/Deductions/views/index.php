
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adddeduction"><i class="fas fa-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($deductions as $deduction):
                      $state = (int)$deduction->status;
                      if($state == 1){
                        $status = "<spann style='color:green'><strong><i class='fas fa-check'></i></strong></span>";
                      }else {
                        $status = "<spann style='color:red'><strong><i class='fas fa-ban'></i></strong></span>";
                      }
                      ?>
                  <tr>
                    <td><?php echo $deduction->description; ?></td>
                    <td><?=$status; ?></td>
                    <td>
                      <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#editposition<?php echo $deduction->id; ?>"> <i class="fas fa-edit"></i>Edit </a>
                      <?php   if($state == 1): ?>
                       <a href="<?php echo base_url('rmdeduct/'.$deduction->id.'?type=deactivate'); ?>" class="btn btn-danger btn-xs" > <i class="fas fa-ban"></i>Deactivate </a>
                     <?php   else: ?>
                        <a href="<?php echo base_url('rmdeduct/'.$deduction->id.'?type=activate'); ?>" class="btn btn-success btn-xs" > <i class="fas fa-check"></i>Activate </a>
                      <?php   endif; ?>

                     </td>
                    <div class="modal fade" id="editposition<?php echo $deduction->id; ?>">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Edit Name</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form id="EditPositionForm<?php echo $deduction->id; ?>">
               <div class="modal-body">
                   <div class="card-body">
                   <div id="alert-msg<?php echo $deduction->id; ?>"></div>
                   <div class="form-group">
                         <label for="">Description</label>
                         <input type="text" class="form-control" name="description" value="<?php echo $deduction->description; ?>">
                       </div>
                   </div>
                   <!-- /.card-body -->
               </div>
               <div class="modal-footer justify-content-between">
               <div class="card-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" id="EditPosition<?php echo $deduction->id; ?>" class="btn btn-primary">Save changes</button>
                   </div>
                 </form>
             </div>
             <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->

         <script>
                 $('#EditPosition<?php echo $deduction->id; ?>').click(function() {
                     var posturl = "<?php echo base_url('Deductions/edit/'.$deduction->id); ?>";
                    var form_data = $('#EditPositionForm<?php echo $deduction->id; ?>').serialize();
                         $.ajax({
                             url: posturl,
                             type: 'POST',
                             data: form_data,
                             dataType:"Json",
                             success: function(data) {
                                 if (data.msg == 'YES'){
                                     $('#alert-msg<?php echo $deduction->id; ?>').html('<div class="alert alert-success text-center">Deduction Updated!</div>');

                                     window.location.href ="<?php echo base_url('deductions'); ?>";

                                 }
                                 else if(data.msg == 'NO'){
                                     $('#alert-msg<?php echo $deduction->id; ?>').html('<div class="alert alert-danger text-center">Error while updating deduction! Please try again later.</div>');
                                 }
                                 else{
                                     $('#alert-msg<?php echo $deduction->id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
                                 }
                             }
                         });
                         return false;
                     });

         </script>

                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Description</th>
                    <th>Amount</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>
            <!-- /.card -->
            <div class="modal fade" id="adddeduction">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add Deduction</h4>
            </div>
            <form id="DeductionForm">
            <div class="modal-body">
            <div class="card-body">
            <div id="alert-msg"></div>
            <div class="form-group">
            <label for="exampleInputDescription1">Name</label>
            <input type="text" class="form-control" name="description" id="exampleInputDescription1" placeholder="Enter Description">
            </div>

            </div>
            <!-- /.card-body -->
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="Deduct" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



            <script type="text/javascript">
            $('#Deduct').click(function() {
            var posturl = "<?php echo base_url('newdeduct'); ?>";
           var form_data = $('#DeductionForm').serialize();
                $.ajax({
                    url: posturl,
                    type: 'POST',
                    data: form_data,
                    dataType:"Json",
                    success: function(data) {
                        if (data.msg == 'YES'){
                            $('#alert-msg').html('<div class="alert alert-success text-center">New deduction successfully added!</div>');

                            window.location.href ="<?php echo base_url('deductions'); ?>";

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

            </script>
