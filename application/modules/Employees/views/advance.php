
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addadvance"><i class="fas fa-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>                   
                    <th>Employee ID</th>
                    <th>Name</th>  
                    <th>Description</th>                 
                    <th>Amount</th>   
                    <th>Date Issued</th>
                    <th>Repayment Date</th>               
                    <th>Actions</th>
                  </tr>
                  <tbody>                  
                  <?php foreach($advances as $advance): ?>
                    <tr>                  
                    <td><?php echo $advance->employee_id; ?></td>
                    <td><?php echo $advance->employee; ?></td>
                    <td><?php echo $advance->description; ?></td>
                    <td><?php echo $advance->amount; ?></td>
                    <td><?php echo $advance->date_advance; ?></td>
                    <td><?php echo $advance->payment_date; ?></td>                    
                    <td><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editadvance<?php echo $advance->id; ?>"> <i class="fas fa-edit"></i>Edit</a></td>
                    <div class="modal fade" id="editadvance<?php echo $advance->id; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Advance Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="EditAdvanceForm<?php echo $advance->id; ?>">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg<?php echo $advance->id; ?>"></div>
                <div class="form-group">
                  <label>Employee</label>
                  <select class="form-control select2" name="employee" style="width: 100%;">                 
                    <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee->employee_id; ?>" <?php if($advance->employee_id == $employee->employee_id): ?> selected<?php endif; ?>><?php echo $employee->firstname.' '.$employee->middlename.' '.$employee->lastname; ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" name="description" value="<?php echo $advance->description; ?>">
                    </div>            
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input type="text" class="form-control" name="amount" value="<?php echo $advance->amount; ?>">
                    </div>
                    <div class="form-group">
                  <label>Date Issued</label>
                    <div class="input-group date" id="reservationdate3<?php echo $advance->id; ?>" data-target-input="nearest">
                        <input type="text" name="issued" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php echo $advance->date_advance; ?>"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>  
                <div class="form-group">
                  <label>Repayment Date</label>
                    <div class="input-group date" id="reservationdate1<?php echo $advance->id; ?>" data-target-input="nearest">
                        <input type="text" name="repayment" class="form-control datetimepicker-input" data-target="#reservationdate1" value="<?php echo $advance->payment_date; ?>"/>
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">          
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="EditAdvance<?php echo $advance->id; ?>" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                  </tr>   

      <script>
              $('#EditAdvance<?php echo $advance->id; ?>').click(function() {
                  var posturl = "<?php echo base_url('Employees/editadvance/'.$advance->id); ?>";  
                 var form_data = $('#EditAdvanceForm<?php echo $advance->id; ?>').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {                          
                              if (data.msg == 'YES'){                              
                                  $('#alert-msg<?php echo $advance->id; ?>').html('<div class="alert alert-success text-center">Advance payment updated successfully!</div>');                                 
                                 
                                  window.location.href ="<?php echo base_url('advance'); ?>";
                               
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg<?php echo $advance->id; ?>').html('<div class="alert alert-danger text-center">Error while updating advance payment! Please try again later.</div>');
                              }     
                              else{
                                  $('#alert-msg<?php echo $advance->id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

      </script>
                  <?php endforeach; ?>             
                  </tbody>                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="addadvance">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Advance Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="AdvanceForm">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="form-group">
                  <label>Employee</label>
                  <select class="form-control select2" name="employee" style="width: 100%;">
                    <option selected="selected">Select Employee</option>
                    <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee->employee_id; ?>"><?php echo $employee->firstname.' '.$employee->middlename.' '.$employee->lastname; ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" name="description">
                    </div>            
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                  <label>Date Issued</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="issued" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>  
                <div class="form-group">
                  <label>Repayment Date</label>
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text" name="repayment" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">          
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="CreateAdvance" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <script>
              $('#CreateAdvance').click(function() {
                  var posturl = "<?php echo base_url('Employees/createadvance'); ?>";  
                 var form_data = $('#AdvanceForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {                          
                              if (data.msg == 'YES'){                              
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New Advance payment Added!</div>');                                 
                                 
                                  window.location.href ="<?php echo base_url('advance'); ?>";
                               
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new advance payment! Please try again later.</div>');
                              }     
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

      </script>