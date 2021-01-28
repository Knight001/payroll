
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addovertime"><i class="fas fa-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>No. of Hours</th>
                    <th>Rate</th>
                      <th>Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($overtimes as $overtime): ?>
                  <tr>
                    <td><?=$overtime->employee_id; ?></td>
                    <td><?=$overtime->employee; ?></td>
                    <td><?=$overtime->hours; ?></td>
                    <td><?=$overtime->rate; ?></td>
                    <td><?=$overtime->date_overtime; ?></td>
                    <td> <a href="" class="btn btn-info" data-toggle="modal" data-target="#editovertime<?=$overtime->id; ?>"> <i class="fas fa-edit"></i> Edit </a> </td>
                    <div class="modal fade" id="editovertime<?=$overtime->id; ?>">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Edit Overtime</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form id="EditOvertimeForm<?=$overtime->id; ?>">
               <div class="modal-body">
                   <div class="card-body">
                   <div id="alert-msg<?=$overtime->id; ?>"></div>
                   <div class="form-group">
                     <label for="">Employee</label>
                      <select class="form-control select2" name="employee">
                        <option value="">Select Employee</option>
                        <?php foreach($employees as $employee): ?>
                          <option value="<?= $employee->employee_id; ?>" <?php if($overtime->employee_id==$employee->employee_id): ?>selected="selected"<?php endif; ?>><?= $employee->firstname." ".$employee->middlename." ".$employee->lastname; ?></option>
                        <?php endforeach; ?>
                      </select>
                   </div>
                   <div class="form-group">
                         <label for="">Hours</label>
                         <input type="text" class="form-control" name="hours" value="<?=$overtime->hours; ?>">
                       </div>
                       <div class="form-group">
                         <label for="">Rate</label>
                         <input type="text" class="form-control" name="rate" value="<?=$overtime->rate; ?>">
                       </div>
                       <div class="form-group">
                        <label >Overtime Date</label>
                         <input type="date" class="form-control" name="date_overtime" value="<?=$overtime->date_overtime; ?>">
                       </div>
                   </div>
                   <!-- /.card-body -->
               </div>
               <div class="modal-footer justify-content-between">
               <div class="card-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" id="EditOvertime<?=$overtime->id; ?>" class="btn btn-primary">Save changes</button>
                   </div>
                 </form>
             </div>
             <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->

         <script>
                 $('#EditOvertime<?=$overtime->id; ?>').click(function() {
                     var posturl = "<?php echo base_url('Employees/updateovertime/'.$overtime->id); ?>";
                    var form_data = $('#EditOvertimeForm<?=$overtime->id; ?>').serialize();
                         $.ajax({
                             url: posturl,
                             type: 'POST',
                             data: form_data,
                             dataType:"Json",
                             success: function(data) {
                                 if (data.msg == 'YES'){
                                     $('#alert-msg<?=$overtime->id; ?>').html('<div class="alert alert-success text-center">Overtime successfully updated!</div>');

                                     window.location.href ="<?php echo base_url('overtime'); ?>";

                                 }
                                 else if(data.msg == 'NO'){
                                     $('#alert-msg<?=$overtime->id; ?>').html('<div class="alert alert-danger text-center">Error while updating overtime! Please try again later.</div>');
                                 }
                                 else{
                                     $('#alert-msg<?=$overtime->id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
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
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>No. of Hours</th>
                    <th>Rate</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="addovertime">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">New Overtime</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form id="OvertimeForm">
       <div class="modal-body">
           <div class="card-body">
           <div id="alert-msg"></div>
           <div class="form-group">
             <label for="">Employee</label>
              <select class="form-control select2" name="employee">
                <option value="">Select Employee</option>
                <?php foreach($employees as $employee): ?>
                  <option value="<?= $employee->employee_id; ?>"><?=$employee->firstname." ".$employee->middlename." ".$employee->lastname; ?></option>
                <?php endforeach; ?>
              </select>
           </div>
           <div class="form-group">
                 <label for="">Hours</label>
                 <input type="text" class="form-control" name="hours">
               </div>
               <div class="form-group">
                 <label for="">Rate</label>
                 <input type="text" class="form-control" name="rate" placeholder="Enter Rate">
               </div>
               <div class="form-group">
                <label >Overtime Date</label>
                 <input type="date" class="form-control" name="date_overtime">
               </div>
           </div>
           <!-- /.card-body -->
       </div>
       <div class="modal-footer justify-content-between">
       <div class="card-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" id="CreateOvertime" class="btn btn-primary">Save changes</button>
           </div>
         </form>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

 <script>
         $('#CreateOvertime').click(function() {
             var posturl = "<?php echo base_url('Employees/addovertime'); ?>";
            var form_data = $('#OvertimeForm').serialize();
                 $.ajax({
                     url: posturl,
                     type: 'POST',
                     data: form_data,
                     dataType:"Json",
                     success: function(data) {
                         if (data.msg == 'YES'){
                             $('#alert-msg').html('<div class="alert alert-success text-center">New overtime successfully added!</div>');

                             window.location.href ="<?php echo base_url('overtime'); ?>";

                         }
                         else if(data.msg == 'NO'){
                             $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding overtime! Please try again later.</div>');
                         }
                         else{
                             $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                         }
                     }
                 });
                 return false;
             });

 </script>
