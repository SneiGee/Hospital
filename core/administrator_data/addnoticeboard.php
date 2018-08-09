<?php

$title = $notice  = $day  = $month  = $year  = $mytime  = $promp = "";

$_SESSION['updateSuccess'] = "";
$_SESSION['updateError'] = "";

if (isset($_POST['addNoticeboard'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $notice = mysqli_real_escape_string($conn, $_POST['notice']);
    $day = mysqli_real_escape_string($conn, $_POST['day']);
    $month = mysqli_real_escape_string($conn, $_POST['month']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $mytime = mysqli_real_escape_string($conn, $_POST['mytime']);
    $promp = mysqli_real_escape_string($conn, $_POST['promp']);

    // echeck for empty field
    if (empty($title) || empty($notice) || empty($day) || empty($month) || empty($year) || empty($mytime) || empty($promp)) {
        $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
    } else {
        # if there's no error save appointment to database
        $sql = "INSERT INTO noticeboard ( title, notice, day, month, year, mytime, promp, register_time)
        VALUES ('$title', '$notice', '$day', '$month', '$year', '$mytime', '$promp', NOW())";

        mysqli_query($conn, $sql);
        $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Notice</strong> Is Added Successful.</div>";
    }
}





?>