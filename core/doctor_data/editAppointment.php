<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM doctor_appointment WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_date = $row[4];
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
                            <label class="col-sm-4 control-label" for="txtid">Appointment Date</label>
                            <div class="col-sm-6">
                               <input type="date" class="form-control" id="txtdate" name="txtdate" value="<?php echo $per_date; ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editAppointmentData">Update</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
