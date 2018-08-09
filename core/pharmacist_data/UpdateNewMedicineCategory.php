<?php
    include_once 'db.inc.php';
    
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editMedicineCategoryData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_name = mysqli_real_escape_string($conn, $_POST['txtname']);
        $new_description = mysqli_real_escape_string($conn, $_POST['txtdescription']);
        $sqlupdate = "UPDATE medicine_category SET name='$new_name', description='$new_description'
                WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Medicine Category Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>