<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM doctors WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_name = $row[1];
        $per_department = $row[2];
        $per_email = $row[3];
    }//end while
    //var_dump($run_sql);
    ?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Information</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">ID</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Department Name</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtdepartment" name="txtname" value="<?php echo $per_name; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Department</label>
                            <div class="col-sm-6">
                                <?php
                                    $sql = "SELECT * FROM departmentfiles";
                                    $query = $conn->query($sql);
                                        
                                ?>
                                <select name="txtdepartment" class="form-control" id="">
                                    <?php while ($row = $query->fetch_array()): ?>
                                        <option name="txtdepartment" value="<?php echo $per_department; ?>"><?php echo $row[1];?></option>
                                    <?php endwhile?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Email</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtemail" name="txtemail" value="<?php echo $per_email; ?>">
                            </div>
                        </div>

                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editDoctorData">Update</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
