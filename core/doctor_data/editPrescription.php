<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM doctor_prescription WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_name = $row[1];
        $per_casehistory = $row[3];
        $per_medication = $row[4];
        $per_description = $row[6];
        $per_prescription_date = $row[7];
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
                            <label class="col-sm-4 control-label" for="txtid">Patient Name</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtpatientname" name="txtpatientname" value="<?php echo $per_name; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Case History</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtcase_history" name="txtcase_history" value="<?php echo $per_casehistory; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Medication</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtmedication" name="txtmedication" value="<?php echo $per_medication; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">Description</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtdescription" name="txtdescription" value="<?php echo $per_description; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtprescription_date">Date</label>
                            <div class="col-sm-6">
                               <input type="date" class="form-control" id="txtprescription_date" name="txtprescription_date" value="<?php echo $per_prescription_date; ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editPrescriptionData">Update</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
