<?php
    include_once 'db.inc.php';
    
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['edittvCameraData'])) {
        $new_id = mysqli_real_escape_String($conn, $_POST['txtid']);
        $new_name = mysqli_real_escape_String($conn, $_POST['txtname']);
        $new_time = mysqli_real_escape_String($conn, $_POST['txttime']);
        $new_dayStart = mysqli_real_escape_String($conn, $_POST['txtdayStart']);
        $new_dayEnd = mysqli_real_escape_String($conn, $_POST['txtdayEnd']);
        $new_dateStart = mysqli_real_escape_String($conn, $_POST['txtdateStart']);
        $new_dateEnd = mysqli_real_escape_String($conn, $_POST['txtdateEnd']);
        $new_status = mysqli_real_escape_String($conn, $_POST['txtstatus']);
        $sqlupdate = "UPDATE tvCamera SET name='$new_name', time='$new_time', dayStart='$new_dayStart', dayEnd='$new_dayEnd',
               dateStart='$new_dateStart', dateEnd='$new_dateEnd', status='$new_status' WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>$new_name Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>