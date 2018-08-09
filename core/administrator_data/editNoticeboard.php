<?php

include_once 'db.inc.php';

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM noticeboard WHERE id=$id";
    $run_sql = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_sql)) {
        $per_id = $row[0];
        $per_title = $row[1];
        $per_notice = $row[2];
        $per_day = $row[3];
        $per_month = $row[4];
        $per_year = $row[5];
        $per_time = $row[6];
        $per_promp = $row[7];
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
                            <label class="col-sm-4 control-label" for="txttitle">Title</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txttitle" name="txttitle" value="<?php echo $per_title; ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtnotice">Notice</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtnotice" name="txtnotice" value="<?php echo $per_notice; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdate">Date</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtday" name="txtday" value="<?php echo $per_day; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtmonth">Month</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtdate" name="txtmonth" value="<?php echo $per_month; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtyear">Year</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" id="txtdate" name="txtyear" value="<?php echo $per_year; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txttime">Time</label>
                            <div class="col-sm-6">
                               <input type="time" class="form-control" id="txttime" name="txttime" value="<?php echo $per_time; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtpromp">Promp</label>
                            <div class="col-sm-6">
                                <select name="txtpromp" id="txtpromp" class="form-control" value="<?php echo $per_promp; ?>"> 
                                    <option value="">am</option>
                                    <option value="">pm</option>
                                    <option value="">midnight/noon</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>
            </div><!-- end modal-body -->

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-info" name="editNoticeboardData">Update</button>
            </div>
        </div>
    </form>
<?php
}//end if ?>
 
