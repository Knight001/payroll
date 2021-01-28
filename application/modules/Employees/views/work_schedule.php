
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#attend"><i class="fas fa-user-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Employee</th>
                  <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($attendance as $attend): ?>
                  <tr>
                    <td><?= $attend->employee; ?></td>
                    <td><?= $attend->date; ?></td>
                    <td><?= $attend->time_in; ?></td>
                    <td> <?= $attend->time_out; ?></td>
                    <td><?= $attend->num_hr; ?></td>
                    <td></td>
                  </tr>
                <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Employee</th>
                    <th>Date</th>
                      <th>Time In</th>
                      <th>Time Out</th>
                      <th>Hours</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="attend">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Schedule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="AddAttendanceForm">
            <div class="modal-body">
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="row">
                  <div class="col-md-12">
                    <h3><?php echo date('F')." ".date('Y'); ?></h3>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                          <label for="">Employee</label>
                          <select class="form-control select2" name="employee" style="width: 100% !important;">
                            <option value="">Select Employee</option>
                            <?php foreach($employees as $employee): ?>
                              <option value="<?= $employee->employee_id; ?>"><?= $employee->firstname." ".$employee->middlename." ".$employee->lastname; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                  </div>

                </div>
                <?php
                $days = date('t');
                $current = date('z');
                 for($counter = 0; $counter < $days; $counter++) :
                   $date = date('Ym').(string)$counter+1;
                   $day = date('Y-m-d', strtotime($date));
                   ?>
                <div class="row">
                   <div class="col-sm-4">
                    <div class="form-group">
                     <label for="">Day</label>
                     <input type="date" class="form-control" name="day[]" value="<?php echo $day; ?>" readonly>
                    </div>
                   </div>
                   <div class="col-sm-4">
                     <div class="form-group">
                           <label for="">Time In</label>
                           <input type="time" class="form-control" name="time_in[]" <?php if((int)$counter > (int)$current): ?>readonly<?php endif; ?>>
                         </div>
                   </div>
                   <div class="col-sm-4">
                           <div class="form-group">
                             <label for="">Time Out</label>
                             <input type="time" class="form-control" name="time_out[]"  <?php if($counter > $current): ?>readonly<?php endif; ?>>
                           </div>
                   </div>
                </div>
              <?php endfor; ?>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="AddAttendance" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
      <!-- /.modal -->

      <script type="text/javascript">
      $('#AddAttendance').click(function() {
      var posturl = "<?php echo base_url('attend'); ?>";
      var form_data = $('#AddAttendanceForm').serialize();
      $.ajax({
      url: posturl,
      type: 'POST',
      data: form_data,
      dataType:"Json",
      success: function(data) {
          if (data.msg == 'YES'){
            $('#alert-msg').html('<div class="alert alert-success text-center">Attendance register successfully updated!</div>');
            window.location.href ="<?php echo base_url('attendance'); ?>";
          }
          else if(data.msg == 'NO'){
              $('#alert-msg').html('<div class="alert alert-danger text-center">Error while submitting attendance register! Please try again later.</div>');
          }
          else{
              $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
          }
      }
      });
      return false;
      });
      </script>
