<?php

    include_once 'db.inc.php';
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editDiagnosisData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_patient = mysqli_real_escape_string($conn, $_POST['txtpatient']);
        $new_reportType = mysqli_real_escape_string($conn, $_POST['txtreportType']);
        $new_documentType = mysqli_real_escape_string($conn, $_POST['txtdocumentType']);
        $new_download = mysqli_real_escape_string($conn, $_POST['txtdownload']);
        $new_description = mysqli_real_escape_string($conn, $_POST['txtdescription']);
        $new_laboratorist = mysqli_real_escape_string($conn, $_POST['txtlaboratorist']);
    
        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name']);
        $sqlupdate = "UPDATE diagnosis SET patient_name='$new_patient', report_type='$new_reportType', document_type='$new_documentType',
                download='".$_FILES['file']['name']."', description='$new_description', laboratorist_name='$new_laboratorist' WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Diagnosis Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
?>