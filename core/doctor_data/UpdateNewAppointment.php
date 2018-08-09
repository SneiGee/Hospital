<?php

    include_once 'db.inc.php';
        
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editAppointmentData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_date = mysqli_real_escape_string($conn, $_POST['txtdate']);
        $sqlupdate = "UPDATE doctor_appointment SET appointment_date='$new_date'
                WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Appointment Data Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>