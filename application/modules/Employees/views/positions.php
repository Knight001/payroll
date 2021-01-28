
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addposition"><i class="fas fa-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Position</th>
                    <th>Rate per Hour</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($positions as $position): ?>
                  <tr>
                    <td><?php echo $position->description; ?></td>
                    <td><?php echo $position->rate; ?></td>
                    <td> <a href="" class="btn btn-info" data-toggle="modal" data-target="#editposition<?php echo $position->id; ?>"> <i class="fas fa-edit"></i>Edit </a> </td>
                    <div class="modal fade" id="editposition<?php echo $position->id; ?>">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Edit Position</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form id="EditPositionForm<?php echo $position->id; ?>">
               <div class="modal-body">
                   <div class="card-body">
                   <div id="alert-msg<?php echo $position->id; ?>"></div>
                   <div class="form-group">
                         <label for="">Description</label>
                         <input type="text" class="form-control" name="description" value="<?php echo $position->description; ?>">
                       </div>
                       <div class="form-group">
                         <label for="">Rate</label>
                         <input type="text" class="form-control" name="rate" value="<?php echo $position->rate; ?>">
                       </div>
                       <div class="form-group">
                        <label >Grade</label>
                         <input type="text" class="form-control" name="grade" value="<?php echo $position->grade; ?>">
                       </div>
                   </div>
                   <!-- /.card-body -->
               </div>
               <div class="modal-footer justify-content-between">
               <div class="card-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" id="EditPosition<?php echo $position->id; ?>" class="btn btn-primary">Save changes</button>
                   </div>
                 </form>
             </div>
             <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->

         <script>
                 $('#EditPosition<?php echo $position->id; ?>').click(function() {
                     var posturl = "<?php echo base_url('Employees/editposition/'.$position->id); ?>";
                    var form_data = $('#EditPositionForm<?php echo $position->id; ?>').serialize();
                         $.ajax({
                             url: posturl,
                             type: 'POST',
                             data: form_data,
                             dataType:"Json",
                             success: function(data) {
                                 if (data.msg == 'YES'){
                                     $('#alert-msg<?php echo $position->id; ?>').html('<div class="alert alert-success text-center">Position Updated!</div>');

                                     window.location.href ="<?php echo base_url('positions'); ?>";

                                 }
                                 else if(data.msg == 'NO'){
                                     $('#alert-msg<?php echo $position->id; ?>').html('<div class="alert alert-danger text-center">Error while updating position! Please try again later.</div>');
                                 }
                                 else{
                                     $('#alert-msg<?php echo $position->id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
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
                  <th>Position</th>
                    <th>Rate per Hour</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="addposition">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Create New Position</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form id="PositionForm">
       <div class="modal-body">
           <div class="card-body">
           <div id="alert-msg"></div>
           <div class="form-group">
                 <label for="">Description</label>
                 <input type="text" class="form-control" name="description">
               </div>
               <div class="form-group">
                 <label for="">Rate</label>
                 <input type="text" class="form-control" name="rate" placeholder="Enter Amount">
               </div>
               <div class="form-group">
                <label >Grade</label>
                 <input type="text" class="form-control" name="grade" placeholder="Enter Grade">
               </div>
           </div>
           <!-- /.card-body -->
       </div>
       <div class="modal-footer justify-content-between">
       <div class="card-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" id="CreatePosition" class="btn btn-primary">Save changes</button>
           </div>
         </form>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

 <script>
         $('#CreatePosition').click(function() {
             var posturl = "<?php echo base_url('Employees/addposition'); ?>";
            var form_data = $('#PositionForm').serialize();
                 $.ajax({
                     url: posturl,
                     type: 'POST',
                     data: form_data,
                     dataType:"Json",
                     success: function(data) {
                         if (data.msg == 'YES'){
                             $('#alert-msg').html('<div class="alert alert-success text-center">New Position Added!</div>');

                             window.location.href ="<?php echo base_url('positions'); ?>";

                         }
                         else if(data.msg == 'NO'){
                             $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new position! Please try again later.</div>');
                         }
                         else{
                             $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                         }
                     }
                 });
                 return false;
             });

 </script>
