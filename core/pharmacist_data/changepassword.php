<?php

   
if (isset($_POST['changePassword'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // check empty
    if (empty($password)) {
        $_SESSION['updateError'] = "<div class='updateError'>Oops! Password form field required</div>";
    } else {
        # if no error is found update new password
        $password = md5($password);//encrypt password before updating
        $sql = "UPDATE pharmacist SET password='$_POST[password]' WHERE id='$_POST[id]'";
        // Execute password
        if (mysqli_query($conn, $sql)) {
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'>Your New Password Is Update Successful</div>";
        } else {
            $_SESSION['updateError'] = "<div class='updateError'>Oops! Password could not change, Try again!</div>";
        }
    }
}


?>