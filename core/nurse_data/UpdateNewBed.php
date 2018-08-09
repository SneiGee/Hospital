<?php
    include_once 'db.inc.php';
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editBedData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_number = mysqli_real_escape_string($conn, $_POST['txtnumber']);
        $new_type = mysqli_real_escape_string($conn, $_POST['txtType']);
        $new_description = mysqli_real_escape_string($conn, $_POST['txtdescription']);
        $sqlupdate = "UPDATE bed SET bed_number='$new_number', bed_type='$new_type', description='$new_description'
                WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Bed Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>