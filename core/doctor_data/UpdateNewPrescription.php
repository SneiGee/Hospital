<?php

    include_once 'db.inc.php';
        
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editPrescriptionData'])) {
        $new_id = mysqli_real_escape_String($conn, $_POST['txtid']);
        $new_patientName = mysqli_real_escape_string($conn, $_POST['txtpatientname']);
        $new_casehistory = mysqli_real_escape_string($conn, $_POST['txtcase_history']);
        $new_medication = mysqli_real_escape_string($conn, $_POST['txtmedication']);
        $new_description = mysqli_real_escape_string($conn, $_POST['txtdescription']);
        $sqlupdate = "UPDATE doctor_prescription SET patient_name='$new_patientName', case_history='$new_casehistory',
                medication='$new_medication', description='$new_description' WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Prescription Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>