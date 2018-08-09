<?php

    include_once 'db.inc.php';
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editMedicationData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_name = mysqli_real_escape_string($conn, $_POST['txtname']);
        $new_doctorName = mysqli_real_escape_string($conn, $_POST['txtdoctorName']);
        $new_totalMedicine = mysqli_real_escape_string($conn, $_POST['txttotalMedicine']);
        $new_status = mysqli_real_escape_string($conn, $_POST['txtstatus']);
        $sqlupdate = "UPDATE medication SET medicine_name='$new_name', doctor_name='$new_doctorName', total_medicine='$new_totalMedicine',
                status='$new_status' WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Provide Medicine Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>