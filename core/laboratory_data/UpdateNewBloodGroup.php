<?php
    include_once 'db.inc.php';
    
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editBloodGroupData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_bloodGroup = mysqli_real_escape_string($conn, $_POST['txtbloodGroup']);
        $new_status = mysqli_real_escape_string($conn, $_POST['txtstatus']);
        $sqlupdate = "UPDATE blood_bank SET blood_group='$new_bloodGroup', status='$new_status'
                WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Blood Group Status</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>