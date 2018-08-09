<?php
    include_once 'db.inc.php';
    
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editBloodDonorData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_name = mysqli_real_escape_string($conn, $_POST['txtname']);
        $new_age = mysqli_real_escape_string($conn, $_POST['txtage']);
        $new_phone = mysqli_real_escape_string($conn, $_POST['txtphone']);
        $new_bloodGroup = mysqli_real_escape_string($conn, $_POST['txtbloodGroup']);
        $sqlupdate = "UPDATE blood_donor SET name='$new_name', age='$new_age', phone='$new_phone', blood_group='$new_bloodGroup'
                WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Blood Donor Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>