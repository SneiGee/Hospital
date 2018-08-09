<?php
    include_once 'db.inc.php';
    
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editAccountantData'])) {
        $new_id = mysqli_real_escape_String($conn, $_POST['txtid']);
        $new_name = mysqli_real_escape_String($conn, $_POST['txtname']);
        $new_email = mysqli_real_escape_String($conn, $_POST['txtemail']);
        $sqlupdate = "UPDATE accountant SET name='$new_name', email='$new_email'
                WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>$new_name Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>