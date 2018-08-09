<?php

    include_once 'db.inc.php';
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editInvoiceData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_patient = mysqli_real_escape_string($conn, $_POST['txtpatient']);
        $new_title = mysqli_real_escape_string($conn, $_POST['txttitle']);
        $new_amount = mysqli_real_escape_string($conn, $_POST['txtamount']);
        $new_date = mysqli_real_escape_string($conn, $_POST['txtdate']);
        $new_status = mysqli_real_escape_string($conn, $_POST['txtstatus']);
        $sqlupdate = "UPDATE invoice SET patient_name='$new_patient', title='$new_title', amount='$new_amount',
                date='$new_date', status='$new_status' WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>$new_patient Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
    
?>