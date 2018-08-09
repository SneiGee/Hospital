<?php
    include_once 'db.inc.php';
    
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editNoticeboardData'])) {
        $new_id = mysqli_real_escape_String($conn, $_POST['txtid']);
        $new_title = mysqli_real_escape_String($conn, $_POST['txttitle']);
        $new_notice = mysqli_real_escape_String($conn, $_POST['txtnotice']);
        $new_day = mysqli_real_escape_String($conn, $_POST['txtday']);
        $new_month = mysqli_real_escape_String($conn, $_POST['txtmonth']);
        $new_year = mysqli_real_escape_String($conn, $_POST['txtyear']);
        $new_time = mysqli_real_escape_String($conn, $_POST['txttime']);
        $new_promp = mysqli_real_escape_String($conn, $_POST['txtpromp']);
        $sqlupdate = "UPDATE noticeboard SET title='$new_title', notice='$new_notice', day='$new_day', month='$new_month',
                 year='$new_year', time='$new_time', promp='$new_promp', WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Noticeboard Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>