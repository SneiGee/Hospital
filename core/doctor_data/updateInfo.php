<?php

$_SESSION['updateSuccess'] = "";
$_SESSION['updateError'] = "";

if (isset($_POST['updateProfileInfo'])) {
    $password = md5($_POST['password']);
    $sql = " UPDATE doctors SET name='$_POST[name]', email='$_POST[email]', doctor_address='$_POST[doctor_address]',
        phone='$_POST[phone]', password='$password' WHERE id='$_POST[id]'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['updateSuccess'] = "<div class='profileSuccess'>Your Date Is Update Successful! Please Logout and Login Again to Activate!!!</div>";
    } else {
        $_SESSION['updateError'] = "<div class='updateError'>Oops! Data Not Updateed</div>";
    }
}


?>