
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#employeeadd"><i class="fas fa-user-plus"></i>Add</a>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Schedule</th>
                    <th>Joined</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($employees as $employee):  ?>
                  <tr>
                    <td><?php echo $employee->employee_id; ?></td>
                    <td><?php echo $employee->firstname." ".$employee->lastname; ?></td>
                    <td><?php echo $employee->position; ?></td>
                    <td><?php echo $employee->schedule; ?></td>
                    <td><?php echo $employee->created_on; ?></td>
                    <td>
                      <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newdeductionsettings<?php echo $employee->employee_id; ?>"><i class="fas fa-minus-circle"></i>Deductions</a>
                    <a href="<?php echo base_url('earn/'.$employee->employee_id); ?>" class="btn btn-primary btn-sm"><i class="fas fa-cart-plus"></i>Earnings</a>
                     <a href="" class="btn btn-info"  data-toggle="modal" data-target="#edit<?php echo $employee->employee_id; ?>"> <i class="fas fa-edit"></i> Edit</a> </td>
                    <div class="modal fade" id="edit<?php echo $employee->employee_id; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?php echo $employee->firstname." ".$employee->lastname; ?></h4>
        </div>
        <form id="EditEmployeeForm<?php echo $employee->employee_id; ?>">
          <div class="modal-body">
              <div class="card-body">
                <div id="alert-msg<?php echo $employee->employee_id; ?>"></div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputFname1">First Name</label>
                      <input type="text" class="form-control" name="fname" value="<?php echo $employee->firstname; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputMname1">Middle Name (Optional)</label>
                      <input type="text" class="form-control" name="mname" value="<?php echo $employee->middlename; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputLname1">Last name</label>
                      <input type="text" class="form-control" name="lname"  value="<?php echo $employee->lastname; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                  <label for="">Gender</label> <br/>
                        <div class="form-check d-inline">
                          <input class="form-check-input" type="radio" value="male" name="gender" <?php if($employee->gender == 'male'): ?>checked <?php endif; ?>>
                          <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check d-inline">
                          <input class="form-check-input" type="radio" value="female" name="gender" <?php if($employee->gender == 'female'): ?>checked <?php endif; ?>>
                          <label class="form-check-label">Female</label>
                        </div>
                  </div>
                 </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputDate">DOB</label>
                      <input type="date" class="form-control" name="dob" value="<?php echo $employee->birthdate; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputAddress">Address</label>
                      <input type="text" class="form-control" name="address" value="<?php echo $employee->address; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                        <label>National ID</label>
                        <input type="text" class="form-control" name="national_id" value="<?php echo $employee->national_id; ?>">
                      </div>
                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" class="form-control" name="account" value="<?php echo $employee->account; ?>">
                      </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                        <label>Pay Day</label>
                        <input type="number" class="form-control" name="pay_day" value="<?php echo $employee->pay_day; ?>">
                      </div>
                  </div>
                  </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $employee->email; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputPhone">Phone Number</label>
                      <input type="text" name="cell" class="form-control"  value="<?php echo $employee->contact_info; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputKin1">Next Of Kin</label>
                      <input type="text" name="kin" class="form-control"  value="<?php echo $employee->kname; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputKinAddress1">Next Of Kin Address</label>
                      <input type="text" name="kinaddress" class="form-control" value="<?php echo $employee->kaddress; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputKinPhone1">Next Of Kin Phone</label>
                      <input type="text" name="kinphone" class="form-control"  value="<?php echo $employee->kphone; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Position</label>
                        <select class="custom-select" name="position">
                          <?php foreach($positions as $position) : ?>
                          <option value="<?php echo $position->id; ?>" <?php if($employee->position == $position->id): ?> selected <?php endif; ?>><?php echo $position->description; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                        <label>Work Schedule</label>
                        <select class="custom-select" name="schedule">
                          <?php foreach($schedules as $schedule) : ?>
                          <option value="<?php echo $schedule->id; ?>" <?php if($employee->schedule == $schedule->id): ?> selected <?php endif; ?>><?php echo $schedule->time_in; ?>-<?php echo $schedule->time_out; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputSalary">Salary</label>
                      <input type="text" name="salary" class="form-control"  value="<?php echo $employee->salary; ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Engagement Date</label>
                      <input type="date" name="engagement_date" class="form-control"  value="<?php echo $employee->engagement_date; ?>">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="editEmployee<?php echo $employee->employee_id; ?>" class="btn btn-primary">Save changes</button>

            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <div class="modal fade" id="newdeductionsettings<?php echo $employee->employee_id; ?>">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title">Deductions For <?php echo $employee->firstname." ".$employee->lastname; ?></h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <form id="DeductionSettingsForm<?php echo $employee->employee_id; ?>">
  <div class="modal-body">
   <div class="card-body">
   <div id="d-msg<?php echo $employee->employee_id; ?>"></div>
   <div class="form-group">
 <label>Set Period</label>
     <input type="text" name="period" id="period<?php echo $employee->employee_id; ?>" class="form-control monthpicker"/>
</div>
   <?php
  $count = 1;
   foreach($deductions as $deduction) :
         $new = getThisDeduction($deduction->id,  $employee->employee_id);
         $last = getLastDeduction($deduction->id,  $employee->employee_id);
         if($new):
           $lastmonth = number_format($new->amount, 2);
         elseif($last):
            $lastmonth = number_format($last->amount, 2);
          else:
             $lastmonth = '0.00';
          endif

     ?>
      <div class="row">
        <div class="col-sm-6">
         <div class="form-group">
           <div class="form-check">
             <input class="form-check-input" type="checkbox"  name="deduction[]" value="<?php echo $deduction->id; ?>" checked>
             <label class="form-check-label"><?php echo $deduction->description; ?></label>
           </div>
         </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
             <label for="">Amount</label>
             <input type="text" name="amount[]" value="<?php echo isset($lastmonth) ? $lastmonth : ''; ?>">
          </div>
        </div>
      </div>
   <?php endforeach; ?>
   </div>
   <!-- /.card-body -->

  </div>
  <div class="modal-footer justify-content-between">
  <div class="card-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" id="CreateDeductionsettings<?php echo $employee->employee_id; ?>" class="btn btn-primary">Save changes</button>
   </div>
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

                  $('#CreateDeductionsettings<?php echo $employee->employee_id; ?>').click(function() {
             var posturl = "<?php echo base_url('addDeductions/'.$employee->employee_id); ?>";
            var form_data = $('#DeductionSettingsForm<?php echo $employee->employee_id; ?>').serialize();
                 $.ajax({
                     url: posturl,
                     type: 'POST',
                     data: form_data,
                     dataType:"Json",
                     success: function(data) {
                         if (data.msg == 'YES'){
                             $('#d-msg<?php echo $employee->employee_id; ?>').html('<div class="alert alert-success text-center">Deductions successfully updated!</div>');

                             window.location.href ="<?php echo base_url('employees'); ?>";

                         }
                         else if(data.msg == 'NO'){
                             $('#d-msg<?php echo $employee->employee_id; ?>').html('<div class="alert alert-danger text-center">Error while updating deductions! Please try again later.</div>');
                         }
                         else{
                             $('#d-msg<?php echo $employee->employee_id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
                         }
                     }
                 });
                 return false;
             });
                       $('#editEmployee<?php echo $employee->employee_id; ?>').click(function() {
                  var posturl = "<?php echo base_url('editemployee/'.$employee->employee_id); ?>";
                 var form_data = $('#EditEmployeeForm<?php echo $employee->employee_id; ?>').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg<?php echo $employee->employee_id; ?>').html('<div class="alert alert-success text-center">Employee successfully updated!</div>');

                                  window.location.href ="<?php echo base_url('employees'); ?>";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg<?php echo $employee->employee_id; ?>').html('<div class="alert alert-danger text-center">Error while updating employee! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg<?php echo $employee->employee_id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });
                  </script>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Employee ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Schedule</th>
                    <th>Joined</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  <div class="modal fade" id="employeeadd">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
        </div>
        <form id="EmployeeForm">
          <div class="modal-body">
              <div class="card-body">
                <div id="alert-msg"></div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputFname1">First Name</label>
                      <input type="text" class="form-control" name="fname" id="exampleInputFname1" placeholder="Enter Firstname">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputMname1">Middle Name (Optional)</label>
                      <input type="text" class="form-control" name="mname" id="exampleInputMname1" placeholder="Enter Middle Name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputLname1">Last name</label>
                      <input type="text" class="form-control" name="lname" id="exampleInputLname1" placeholder="Enter Lastname">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group clearfix">
                      <label for=""> Gender</label> <br/>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="gender" checked>
                        <label for="radioPrimary1">Male</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="gender">
                        <label for="radioPrimary2">Female </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputDate">DOB</label>
                      <input type="date" class="form-control" name="dob" id="datepicker">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputAddress">Address</label>
                      <input type="text" class="form-control" name="address" id="exampleInputAddress1" placeholder="Enter Address">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                        <label>National ID</label>
                        <input type="text" class="form-control" name="national_id" placeholder="Enter National ID Number">
                      </div>
                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" class="form-control" name="account" placeholder="Enter Account Number">
                      </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                        <label>Pay Day</label>
                        <input type="number" class="form-control" name="pay_day">
                      </div>
                  </div>
                  </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputPhone">Phone Number</label>
                      <input type="text" name="cell" class="form-control" id="exampleInputPhone" placeholder="Enter Phone Number">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputKin1">Next Of Kin</label>
                      <input type="text" name="kin" class="form-control" id="exampleInputKin1" placeholder="Enter Next of Kin">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputKinAddress1">Next Of Kin Address</label>
                      <input type="text" name="kinaddress" class="form-control" id="exampleInputKinAddress1" placeholder="Enter Next of Kin Address">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputKinPhone1">Next Of Kin Phone</label>
                      <input type="text" name="kinphone" class="form-control" id="exampleInputKinPhone1" placeholder="Enter Next of Kin Phone">
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Position</label>
                        <select class="custom-select" name="position">
                          <option>Select Position</option>
                          <?php foreach($positions as $position) : ?>
                          <option value="<?php echo $position->id; ?>"><?php echo $position->description; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                        <label>Work Schedule</label>
                        <select class="custom-select" name="schedule">
                          <option>Select Schedule</option>
                          <?php foreach($schedules as $schedule) : ?>
                          <option value="<?php echo $schedule->id; ?>"><?php echo $schedule->time_in; ?>-<?php echo $schedule->time_out; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputSalary">Salary</label>
                      <input type="text" name="salary" class="form-control" id="exampleInputSalary">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Engagement Date</label>
                      <input type="date" name="engagement_date" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="createEmployee" class="btn btn-primary">Save changes</button>

            </div>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
