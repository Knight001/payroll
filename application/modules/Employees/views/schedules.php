
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addschedule"><i class="fas fa-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($schedules as $schedule): ?>
                  <tr>
                    <td><?php echo $schedule->time_in; ?></td>
                    <td><?php echo $schedule->time_out; ?></td>
                    <td> <a href="" class="btn btn-info" data-toggle="modal" data-target="#editschedule<?php echo $schedule->id; ?>"> <i class="fas fa-edit"></i> Edit </a> </td>
                  </tr>
              <div class="modal fade" id="editschedule<?php echo $schedule->id; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="EditScheduleForm<?php echo $schedule->id; ?>">
                  <div class="modal-body">
                      <div class="card-body">
                      <div id="alert-msg <?php echo $schedule->id; ?>"></div>
                      <div class="form-group">
                            <label for="">Time In</label>
                            <input type="time" class="form-control" name="time_in" value="<?php echo $schedule->time_in; ?>">
                          </div>
                          <div class="form-group">
                            <label for="">Time Out</label>
                            <input type="time" class="form-control" name="time_out" value="<?php echo $schedule->time_out; ?>">
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <div class="modal-footer justify-content-between">
                  <div class="card-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="Updateschedule<?php echo $schedule->id; ?>" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </div>
            <!-- /.modal -->

                     <script>
                             $('#Updateschedule<?php echo $schedule->id; ?>').click(function() {
                                 var posturl = "<?php echo base_url('Employees/editschedule/'.$schedule->id); ?>";
                                var form_data = $('#EditScheduleForm<?php echo $schedule->id; ?>').serialize();
                                     $.ajax({
                                         url: posturl,
                                         type: 'POST',
                                         data: form_data,
                                         dataType:"Json",
                                         success: function(data) {
                                             if (data.msg == 'YES'){
                                                 $('#alert-msg<?php echo $schedule->id; ?>').html('<div class="alert alert-success text-center">Schedule Updated!</div>');

                                                 window.location.href ="<?php echo base_url('schedules'); ?>";

                                             }
                                             else if(data.msg == 'NO'){
                                                 $('#alert-msg<?php echo $schedule->id; ?>').html('<div class="alert alert-danger text-center">Error while updating schedule! Please try again later.</div>');
                                             }
                                             else{
                                                 $('#alert-msg<?php echo $schedule->id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
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
                  <th>Time In</th>
                    <th>Time Out</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="addschedule">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Schedule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="AddScheduleForm">
            <div class="modal-body">
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="form-group">
                      <label for="">Time In</label>
                      <input type="time" class="form-control" name="time_in">
                    </div>
                    <div class="form-group">
                      <label for="">Time Out</label>
                      <input type="time" class="form-control" name="time_out">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="AddNewSchedule" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script>
              $('#AddNewSchedule').click(function() {
                  var posturl = "<?php echo base_url('Employees/addschedule'); ?>";
                 var form_data = $('#AddScheduleForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {
                              if (data.msg == 'YES'){
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New Schedule Added!</div>');

                                  window.location.href ="<?php echo base_url('schedules'); ?>";

                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new schedule! Please try again later.</div>');
                              }
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

      </script>
