<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM diagnosis WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_patient = $row[1];
        $per_reportType = $row[2];
        $per_document = $row[3];
        $per_download = $row[4];
        $per_description = $row[5];
        $per_laboratorist = $row[6];
    }//end while
    //var_dump($run_sql);
    ?>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
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
                            <label class="col-sm-4 control-label" for="txtpatient">Patient Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtpatient" name="txtpatient" value="<?php echo $per_patient; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtreportType">Report Type</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtreportType" name="txtreportType" value="<?php echo $per_reportType; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdocumentType">Document Type</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtdocumentType" name="txtdocumentType" value="<?php echo $per_document; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtfile">Document File</label>
                            <div class="col-lg-6">
                                <div class="profileUploadFile">
                                    <button type="button" class="btn btn-default btn-block" name="file" id="diagnosisButtonD">
                                        click to chose document image
                                    </button>
                                    <input type="file" class="form-control" name="file" id="txtfile" value="<?php echo $per_download; ?>" accept="image/">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdescription">Description</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtdescription" name="txtdescription" value="<?php echo $per_description; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtlaboratorist">Laboratorist Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtlaboratorist" name="txtlaboratorist" value="<?php echo $per_laboratorist; ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editDiagnosisData">Update</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
