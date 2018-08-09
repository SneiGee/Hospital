<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM bed WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_number = $row[1];
        $per_type = $row[2];
        $per_description = $row[3];
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
                            <label class="col-sm-4 control-label" for="txtid">Bed Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtnumber" name="txtnumber" value="<?php echo $per_number; ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttype">Bed Type</label>
                            <div class="col-sm-6">
                                <?php
                                    $query = "SELECT * FROM bed";
                                    $result1 = mysqli_query($conn, $query);
                                        
                                ?>
                                <select name="txtType" class="form-control" id="txttype">
                                    <?php while ($row = mysqli_fetch_array($result1)): ?>
                                        <option name="txtType"><?php echo $row[2];?></option>
                                    <?php endwhile?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttype">Description</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txdescription" name="txtdescription" value="<?php echo $per_description; ?>">
                            </div>
                        </div>

                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editBedData">Update</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
