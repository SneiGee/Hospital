<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM medication WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_name = $row[1];
        $per_doctorName = $row[2];
        $per_totalMedicine = $row[3];
        $per_date = $row[4];
        $per_status = $row[5];
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
                            <label class="col-sm-4 control-label" for="txtname">Medicine Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $per_name; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdoctorName">Doctor Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtdoctorName" name="txtdoctorName" value="<?php echo $per_doctorName; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttotalMedicine">Total Medicine</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txttotalMedicine" name="txttotalMedicine" value="<?php echo $per_totalMedicine; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdate">Date</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtdate" name="txtdate" value="<?php echo $per_date; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtstatus">Status</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_status; ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editMedicationData">Update Data</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
