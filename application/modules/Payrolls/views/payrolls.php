
          <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">Search Payroll</h3>
             </div>
             <div class="card-body">
             <form>
                  <div class="row">
                    <div class="col-sm-5">
                    <label for="">Month</label>
                      <select class="form-control" name="month">
                      <option value="">Select Month</option>
                         <option value="1">January</option>
                         <option value="2">February</option>
                         <option value="3">March</option>
                         <option value="4">April</option>
                         <option value="5">May</option>
                         <option value="6">June</option>
                         <option value="7">July</option>
                         <option value="8">August</option>
                         <option value="9">September</option>
                         <option value="10">October</option>
                         <option value="11">November</option>
                         <option value="12">December</option>
                      </select>
                    </div>
                    <div class="col-sm-5">
                    <label for="">Year</label>
                      <select name="year" class="form-control" onchange="form.submit()">
                        <option value="">Select Year</option>
                          <?php foreach(getFilters() as $year): ?>
                            <option value="<?php echo $year->year; ?>"><?php echo $year->year; ?></option>
                            <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-sm-2">
                    <hr>
                     <a href="<?php echo base_url('payroll'); ?>" class="btn btn-danger"> <i class="fas fa-sync"></i> Reset Filters </a>
                    </div>
                  </div>
                </from>
             </div>
          </div>
            <div class="card">
            <?php
            $year = $this->input->get('year') != NULL ? $this->input->get('year') : date('Y') ;
            $month = $this->input->get('month') != NULL ? $this->input->get('month') : date('m');
            ?>
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right">
                  <!-- <a href="<?php echo base_url('deduct'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-cog"></i>deductions</a>
                  <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#newpayee"><i class="fas fa-cogs"></i>paye</a>
                  <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#earnings"><i class="fas fa-wallet"></i>earnings</a> -->
                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#overtime"><i class="fas fa-clock"></i>Overtime</a>

                  <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newdeductionsettings">Generate Payroll</a>
                  <?php
                  if($payrolls): ?>
                  <a href="<?php echo base_url('payslips?month='.$month.'&year='.$year); ?>" class="btn btn-danger btn-sm"> <i class="fas fa-print"></i>Print Payslips</a>
                  <?php endif; ?>
              </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Name</th>
                  <th>Employee ID</th>
                    <th>Gross</th>
                    <th>Earnings</th>
                    <th>Overtime</th>
                    <th>Deductions</th>
                    <th>Cash Advance</th>
                    <th>Net Pay</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($payrolls as $payroll) :


                       ?>
                  <tr>
                    <td><?php echo $payroll->name; ?></td>
                    <td><?php echo $payroll->employee_id; ?></td>
                    <td><?php echo $payroll->gross; ?></td>
                    <td><?php echo getEarning($payroll->position, $month, $year); ?></td>
                    <td><?php echo getCulculateOverTime($payroll->employee_id, $month, $year); ?></td>
                    <td><?php echo $payroll->deductions; ?></td>
                    <td><?php echo $payroll->advance; ?></td>
                    <td><?php echo $payroll->net; ?></td>
                    <td>
                      <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newdeductionsettings<?php echo $payroll->employee_id; ?>"><i class="fas fa-minus-circle"></i>Deductions</a>
                      <a href="<?php echo base_url('payslip/'.$payroll->employee_id.'?month='.$month.'&year='.$year); ?>" class="btn btn-danger btn-sm"> <i class="fas fa-print"></i>Print Payslip</a>
                     </td>

                     <div class="modal fade" id="newdeductionsettings<?php echo $payroll->employee_id; ?>">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Edit Deductions For <?php echo $payroll->name; ?></h4>
         </div>

                    <form id="DeductionSettingsForm<?php echo $payroll->employee_id; ?>">
                    <div class="modal-body">
                     <div class="card-body">
                     <div id="d-msg<?php echo $payroll->employee_id; ?>"></div>
                     <div class="form-group">
                   <label>Set Period</label>
                       <input type="text" name="period" id="period<?php echo $payroll->employee_id; ?>" class="form-control monthpicker"/>
                  </div>
                     <?php
                    $count = 1;
                     foreach($deductions as $deduction) :
                           $new = getThisDeduction($deduction->id,  $payroll->employee_id);
                           $last = getLastDeduction($deduction->id,  $payroll->employee_id);
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
                               <input type="text" name="amount[]" value="<?php echo $lastmonth; ?>">
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
                    <button type="button" id="CreateDeductionsettings<?php echo $payroll->employee_id; ?>" class="btn btn-primary">Save changes</button>
                     </div>
                    </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>

                  <!-- /.modal -->

  <script type="text/javascript">

                    $('#CreateDeductionsettings<?php echo $payroll->employee_id; ?>').click(function() {
               var posturl = "<?php echo base_url('addDeductions/'.$payroll->employee_id); ?>";
              var form_data = $('#DeductionSettingsForm<?php echo $payroll->employee_id; ?>').serialize();
                   $.ajax({
                       url: posturl,
                       type: 'POST',
                       data: form_data,
                       dataType:"Json",
                       success: function(data) {
                           if (data.msg == 'YES'){
                               $('#d-msg<?php echo $payroll->employee_id; ?>').html('<div class="alert alert-success text-center">Deductions successfully updated!</div>');

                               window.location.href ="<?php echo base_url(); ?>payroll?month="+data.month+"&year="+data.year;

                           }
                           else if(data.msg == 'NO'){
                               $('#d-msg<?php echo $payroll->employee_id; ?>').html('<div class="alert alert-danger text-center">Error while updating deductions! Please try again later.</div>');
                           }
                           else{
                               $('#d-msg<?php echo $payroll->employee_id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
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
                  <th>Name</th>
                  <th>Employee ID</th>
                    <th>Gross</th>
                    <th>Earnings</th>
                    <th>Overtime</th>
                    <th>Deductions</th>
                    <th>Cash Advance</th>
                    <th>Net Pay</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                 <!-- /.card -->
      <div class="modal fade" id="newdeductionsettings">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Payroll Date</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="DeductionSettingsForm">
            <div class="modal-body">
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="form-group">
              <label>Set Period</label>
                  <input type="text" name="period" id="period" class="form-control monthpicker"/>
            </div>
                </div>
                <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="CreateDeductionsettings" class="btn btn-primary">Save changes</button>
                </div>
              </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                       <!-- /.card -->
   <div class="modal fade" id="newpayee">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Settings For This Month's Payroll</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Start Range</th>
                  <th>End Range</th>
                    <th>Rate</th>
                    <th>Deduct</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($payee as $paye) : ?>
                  <tr>
                    <td><?php echo $paye->start; ?></td>
                    <td><?php echo $paye->end; ?></td>
                    <td><?php echo $paye->rate; ?></td>
                    <td><?php echo $paye->subtract; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="CreatePayee" class="btn btn-primary">Generate For This Month</button>
             </div>
           </div>
          <!-- /.modal-content -->
          </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <!-- /.modal -->

                             <!-- /.card -->
   <div class="modal fade" id="earnings">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirm Earnings This Month's Payroll</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>Positions</th>
                  <th>Earning Description</th>
                    <th>Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($earnings as $earning) : ?>
                  <tr>
                    <td><?php echo  getallsellectedpositions(explode(',',$earning->position)); ?></td>
                    <td><?php echo $earning->description; ?></td>
                    <td><?php echo $earning->amount; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" class="btn btn-primary" id="generateEarnings">Generate For This Month</a>
             </div>
           </div>
          <!-- /.modal-content -->
          </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="overtime">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Add Overtime For Employee</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>

               <div class="modal-body">
                   <div class="card-body">
                 <form id="OvertimePaymentForm" class="form-group">
                      <?php foreach($overtimes as $overtime) : ?>
                        <div class="form-group">
                          <label for="">
                            <input type="checkbox" name="id[]" value="<?=$overtime->id; ?>">
                            <?=$overtime->employee." (Rate: ".$overtime->rate.") Hours :".$overtime->hours; ?>
                          </label>
                        </div>
                     <?php endforeach; ?>
                   </form>
                   </div>
                   <!-- /.card-body -->
               </div>
               <div class="modal-footer justify-content-between">
               <div class="card-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="button" id="PayOverTime" class="btn btn-primary">Generate For This Month</button>
                </div>
              </div>
             <!-- /.modal-content -->
             </div>
           <!-- /.modal-dialog -->
         </div>
         </div>
         <!-- /.modal -->

      <script>

$('#generateEarnings').click(function() {
                  var posturl = "<?php echo base_url('earnsettings'); ?>";
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: {data: 1},
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">Employee earnings for the month of '+data.month+'!</div>');

                                  window.location.href ="<?php echo base_url(); ?>payroll";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding employee earning  for the month of '+data.month+'! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

              $('#CreateDeductionsettings').click(function() {
                  var posturl = "<?php echo base_url('generatepayroll'); ?>";
                 var period = $('#period').val();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: {period : period},
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">Deduction settings for the month of '+data.month+'!</div>');

                                  window.location.href ="<?php echo base_url(); ?>payroll";
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding deduction settings for the month of '+data.month+'! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

                  $('#CreatePayee').click(function(){
                  var posturl = "<?php echo base_url(); ?>createpayeesettings";
                 var form_data = $('#PayeForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">Paye settings for the month of '+data.month+'!</div>');

                                  window.location.href ="<?php echo base_url(); ?>payroll";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding paye settings for the month of '+data.month+'! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

                  $('#PayOverTime').click(function() {
                  var posturl = "<?php echo base_url(); ?>Payrolls/payovertime";
                 var form_data = $('#OvertimePaymentForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">Overtime payment due this month successfully created!</div>');

                                  window.location.href ="<?php echo base_url(); ?>payroll";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while creating overtime payment schedule for the month of '+data.month+'! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });
      </script>
