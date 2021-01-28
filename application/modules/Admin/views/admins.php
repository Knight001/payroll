
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#useradd"><i class="fas fa-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>                   
                    <th>Name</th>                    
                    <th>Status</th>                  
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $user): ?>
                  <tr>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->firstname." ".$user->lastname; ?></td>
                    <td><?php echo $user->status; ?></td>
                    <td> <a href="" class="btn btn-info"> <i class="fas fa-edit"></i>Edit </a> </td>  
                  </tr>     
                  <?php endforeach; ?>            
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Username</th>                   
                    <th>Name</th>                    
                    <th>Status</th>                  
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="useradd">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>               
              </div>
                <!-- /.card-header -->
            </div>
            </div>
                 <!-- form start -->
             <form id="addForm">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="form-group">
                    <label for="exampleInputFname1">First Name</label>
                    <input type="text" class="form-control" name="fname" id="exampleInputFname1" placeholder="Enter Firstname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputLname1"> Last Name</label>
                    <input type="text" class="form-control" name="lname" id="exampleInputLname1" placeholder="Enter Lastname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputUsername1" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                        <label>User Role</label>
                        <select class="custom-select" name="role">
                          <option>Select Role</option>
                          <?php foreach($roles as $role) : ?>
                          <option value="<?php echo $role->id; ?>"><?php echo $role->role ?></option>  
                          <?php endforeach; ?>                      
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCPassword1">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="exampleInputCPassword1" placeholder="Confirm Password">
                  </div>
                
                </div>
                <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">          
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="createUser" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
      <!-- /.modal -->
