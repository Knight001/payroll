
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
                  <th>Description</th>                  
                    <th>Amount</th>    
                    <th>Is Taxable</th>                               
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($earnings as $earning) :
                   
                      if($earning->is_taxable == '1'){
                        $tax = "<span style='color: green'><strong>Yes</strong></span>";
                      }else {
                        $tax = "<span style='color: red'><strong>No</strong></span>";
                      }
                      ?>
                  <tr>          
                    <td><?php echo $earning->description; ?></td>                 
                    <td><?php echo $earning->amount; ?></td>  
                    <td><?php echo $tax; ?></td>                                
                    <td> <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editearning<?php echo $earning->id_earn; ?>"> <i class="fas fa-edit"></i>Edit</a> </td>
                    <div class="modal fade" id="editearning<?php echo $earning->id_earn; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Earnings</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="EditEarningForm<?php echo $earning->id_earn; ?>">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg<?php echo $earning->id_earn; ?>"></div>
                <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" class="form-control" name="description" value="<?php echo  $earning->description; ?>">
                    </div>
                    <div class="form-group">
                     <label >Apply Tax To Employee Earning</label>    <br/>      
                     <label for="">            
                     <input type="radio" name="tax" value="1"<?php if($earning->is_taxable == '1'): ?> checked <?php endif; ?>>
                     Yes
                      </label>   
                      <label for="">            
                     <input type="radio" name="tax" value="0" <?php if($earning->is_taxable == '0'): ?> checked <?php endif; ?>>
                     No
                      </label>       
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
              <button type="button" id="EditEarning<?php echo $earning->id_earn; ?>" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script>
              $('#EditEarning<?php echo $earning->id_earn; ?>').click(function() {
                  var posturl = "<?php echo base_url('Employees/editearning/'.$earning->id_earn); ?>";  
                 var form_data = $('#EditEarningForm<?php echo $earning->id_earn; ?>').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {                          
                              if (data.msg == 'YES'){                              
                                  $('#alert-msg<?php echo $earning->id_earn; ?>').html('<div class="alert alert-success text-center">New Earning Added!</div>');                                 
                                 
                                  window.location.href ="<?php echo base_url('earn/'.$id); ?>";
                               
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg<?php echo $earning->id_earn; ?>').html('<div class="alert alert-danger text-center">Error while adding new earning! Please try again later.</div>');
                              }     
                              else{
                                  $('#alert-msg<?php echo $earning->id_earn; ?>').html('<div class="alert alert-danger">' + data.msg + '</div>');
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
                    <th>Is Taxable</th>                               
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
                      <label for="">Amount</label>
                      <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                    </div>  
                    <div class="form-group">
                     <label >Apply Tax To Employee Earning</label>    <br/>                           
                     <input type="checkbox" name="tax" value="1" data-bootstrap-switch>
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
                  var posturl = "<?php echo base_url('Employees/addearning/'.$id); ?>";  
                 var form_data = $('#EarningForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {                          
                              if (data.msg == 'YES'){                              
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New Earning Added!</div>');                                 
                                 
                                  window.location.href ="<?php echo base_url('earn/'.$id); ?>";
                               
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