<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM blood_donor WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_name = $row[1];
        $per_age = $row[5];
        $per_phone = $row[4];
        $per_bloodGroup = $row[7];
        $per_donationDate = $row[8];
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
                            <label class="col-sm-4 control-label" for="txtname">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $per_name; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtAge">Age</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtage" name="txtage" value="<?php echo $per_age; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtphone">Phone</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtphone" name="txtphone" value="<?php echo $per_phone; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtbloodGroup">Blood Group</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtbloodGroup" name="txtbloodGroup" value="<?php echo $per_bloodGroup; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdonationDate">Donation Date</label>
                            <div class="col-sm-6">
                               <input type="date" class="form-control" id="txtdonationDate" name="txtdonationDate" value="<?php echo $per_donationDate; ?>">
                            </div>
                        </div>

                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editBloodDonorData">Update Data</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
