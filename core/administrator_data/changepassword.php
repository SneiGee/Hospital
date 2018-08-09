<?php



if (isset($_POST[''])) {
    $password = md5($_POST['password']);
    $sql = "UPDATE administrator SET password='$password' WHERE id='$_POST[id]'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['updateSuccess'] = "<div class='profileSuccess'>Your password has changed Successful</div>";
    } else {
        $_SESSION['updateError'] = "<div class='updateError'>Oops! Your password do not changes </div>";
    }
}

?>