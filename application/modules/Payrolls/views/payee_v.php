
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right">
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newpayee"><i class="fas fa-money-plus"></i>New Band</a>
                <a href="<?php echo base_url('payeemonthsetting'); ?>" class="btn btn-primary btn-sm" data-toggle="modal"><i class="fas fa-money-plus"></i>Setting For the Month</a>
                 
              </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>ID</th>
                  <th>Rate</th>                  
                    <th>Start</th>
                    <th>End</th>
                    <th>Status</th>                    
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($payees as $payee) : ?>
                  <tr>
                  <td><?php echo $payee->id_payee_tax_band; ?></td>    
                    <td><?php echo $payee->rate; ?></td>                    
                    <td><?php echo $payee->start; ?></td>
                    <td><?php echo $payee->end; ?></td>
                    <td><?php echo $payee->status; ?></td>                                  
                    <td> <a href="" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i>Edit</a> </td>
                  </tr>   
                  <?php endforeach; ?>              
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                  <th>Rate</th>                  
                    <th>Start</th>
                    <th>End</th>
                    <th>Status</th>                    
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                 <!-- /.card -->
                 <div class="modal fade" id="newpayee">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create New Tax Band</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="PayeeForm">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="form-group">
                      <label for="">Minimum Salary</label>
                      <input type="text" class="form-control" name="start" placeholder="Enter Minimum Salary To Apply Tax Rate">
                    </div>
                    <div class="form-group">
                      <label for="">Maximum Salary</label>
                      <input type="text" class="form-control" name="end" placeholder="Enter Maximum Salary To Apply Tax Rate">
                    </div>
                    <div class="form-group">
                      <label for="">Tax Rate</label>
                      <input type="text" class="form-control" name="rate" placeholder="Enter Tax Rate">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">          
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="Createpayee" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
          
      <script>
              $('#Createpayee').click(function() {
                  var posturl = "<?php echo base_url('addpayee'); ?>";  
                 var form_data = $('#PayeeForm').serialize();
                      $.ajax({
                          url: posturl,
                          type: 'POST',
                          data: form_data,
                          dataType:"Json",
                          success: function(data) {                          
                              if (data.msg == 'YES'){                              
                                  $('#alert-msg').html('<div class="alert alert-success text-center">New Tax Band Added!</div>');                                 
                                 
                                  window.location.href ="<?php echo base_url(); ?>payee";
                               
                              }
                              else if(data.msg == 'NO'){
                                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error while adding new tax band! Please try again later.</div>');
                              }     
                              else{
                                  $('#alert-msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                              }
                          }
                      });
                      return false;
                  });
      </script>