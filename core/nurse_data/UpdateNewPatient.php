<?php
    include_once 'db.inc.php';
    
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editPatientData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_name = mysqli_real_escape_string($conn, $_POST['txtname']);
        $new_bloodgroup = mysqli_real_escape_string($conn, $_POST['txtbloodgroup']);
        $sqlupdate = "UPDATE patients SET name='$new_name', blood_group='$new_bloodgroup'
                WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Patient Blood Group Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>