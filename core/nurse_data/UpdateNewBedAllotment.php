<?php

    include_once 'db.inc.php';
        
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editBedAllotmentData'])) {
        $new_id = mysqli_real_escape_String($conn, $_POST['txtid']);
        $new_number = mysqli_real_escape_string($conn, $_POST['txtnumber']);
        $new_type = mysqli_real_escape_string($conn, $_POST['txttype']);
        $new_allotmentTime = mysqli_real_escape_string($conn, $_POST['txtallotment']);
        $new_dischargeTime = mysqli_real_escape_string($conn, $_POST['txtdischargeTime']);
        $sqlupdate = "UPDATE bedallotment SET bed_number='$new_number', bed_type='$new_type',
                allotmentTime='$new_allotmentTime', dischargeTime='$new_dischargeTime' WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>$patient_name bedallotment Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>