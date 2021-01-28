
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newearning"><i class="fas fa-money-plus"></i>New Earning</a>
             </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Positions</th>
                  <th>Earning Description</th>                  
                    <th>Amount</th>                                   
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($earnings as $earning) : ?>
                  <tr>                   
                    <td><?php echo  getallsellectedpositions(explode(',',$earning->position)); ?></td>                    
                    <td><?php echo $earning->description; ?></td>                 
                    <td><?php echo $earning->amount; ?></td>                                  
                    <td> <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editearning<?php echo $earning->id; ?>"> <i class="fas fa-edit"></i>Edit</a> </td>
                    <div class="modal fade" id="editearning<?php echo $earning->id; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Earnings</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="EditEarningForm<?php echo $earning->id; ?>">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg<?php echo $earning->id; ?>"></div>
                <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" name="description" value="<?php echo  $earning->description; ?>">
                    </div>
                <div class="form-group">
                <label >Positions</label>                                
                    <select id="dates-field2<?php echo $earning->id; ?>" class="multiselect-ui form-control" multiple="multiple" name="positions[]">
                        <?php foreach($positions as $position): ?>
                        <option value="<?php echo $position->id; ?>"<?php if(in_array($position->id, explode(',',$earning->position))){ echo "selected";} ?>><?php echo $position->description; ?></option>
                        <?php endforeach; ?>
                    </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input type="text" class="form-control" name="amount" value="<?php echo $earning->amount; ?>">
                    </div>                   
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">          
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="EditEarning<?php echo $earning->id; ?>" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script>
              $('#EditEarning<?php echo $earning->id; ?>').click(function() {
                  var posturl = "<?php echo base_url('editearning/'.$earning->id); ?>";  
                 var form_data = $('#EditEarningForm<?php echo $earning->id; ?>').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {                          
                              if (data.msg == 'YES'){                              
                                  $('#alert-msg<?php echo $earning->id; ?>').html('<div class="alert alert-success text-center">New Earning Added!</div>');                                 
                                 
                                  window.location.href ="<?php echo base_url(); ?>earnings";
                               
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg<?php echo $earning->id; ?>').html('<div class="alert alert-danger text-center">Error while adding new earning! Please try again later.</div>');
                              }     
                              else{
                                  $('#alert-msg<?php echo $earning->id; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
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
                  <th>Positions</th>
                  <th>Earning Description</th>                  
                    <th>Amount</th>                                   
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                 <!-- /.card -->
                 <div class="modal fade" id="newearning">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create New Earnings</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="EarningForm">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" name="description">
                    </div>
                <div class="form-group">
                <label >Positions</label>                                
                    <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" name="positions[]">
                        <?php foreach($positions as $position): ?>
                        <option value="<?php echo $position->id; ?>"><?php echo $position->description; ?></option>
                        <?php endforeach; ?>
                    </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                    </div>                   
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">          
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="CreateEarning" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
          
      <script>
              $('#CreateEarning').click(function() {
                  var posturl = "<?php echo base_url('addearning'); ?>";  
                 var form_data = $('#EarningForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {                          
                              if (data.msg == 'YES'){                              
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New Earning Added!</div>');                                 
                                 
                                  window.location.href ="<?php echo base_url(); ?>earnings";
                               
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new earning! Please try again later.</div>');
                              }     
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });

      </script>