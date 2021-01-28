
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $section ?></h3>
                <span class="float-right"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addrole"><i class="fas fa-plus"></i>Add</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>    
                    <th>Role</th>                  
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($roles as $role): ?>
                  <tr>
                    <td><?php echo $role->id; ?></td>
                    <td><?php echo $role->role; ?></td>                   
                    <td> <a href="" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i>Edit </a> </td>  
                  </tr>  
                  <?php endforeach; ?>               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Role</th>  
                    <th>Status</th>                  
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="addrole">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Role</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="addRoleForm">
            <div class="modal-body">   
                <div class="card-body">
                <div id="alert-msg"></div>
                <div class="form-group">
                    <label for="exampleInputRole1">Role Name</label>
                    <input type="text" class="form-control" name="role" id="exampleInputRole1" placeholder="Enter Role">
                  </div>  
                </div>
                <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">          
            <div class="card-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="createRole" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->