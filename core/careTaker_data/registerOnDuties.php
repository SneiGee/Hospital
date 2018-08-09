<?php

include_once 'db.inc.php';

// ... Support ....  
$name = $time = $dayStart = $dayEnd = $dateStart = $dateEnd = $status = "";

$errors = array();

$_SESSION['updateSuccess'] = "";
$_SESSION['updateError'] = "";

// if Support Button send button is clicked.
if (isset($_POST['addcareTakerweeklyDuties'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $dayStart = mysqli_real_escape_string($conn, $_POST['dayStart']);
    $dayEnd = mysqli_real_escape_string($conn, $_POST['dayEnd']);
    $dateStart = mysqli_real_escape_string($conn, $_POST['dateStart']);
    $dateEnd = mysqli_real_escape_string($conn, $_POST['dateEnd']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // ensure the form field is fill properly
    if (empty($name) || empty($time) || empty($dayStart) || empty($dayEnd) || empty($dateStart) || empty($dateEnd) || empty($status)) 
    {
        $_SESSION['updateError'] = "<div class='updateError'>All Fields are mandatory, Fill all the empty Fields Well</div>";
    } else {
        // if all the form field is fill properly, save info to database
            
        $sql = "INSERT INTO careTaker_Duties (name, time, dayStart, dayEnd, dateStart, dateEnd, status, register_time) 
                VALUES ('$name', '$time', '$dayStart', '$dayEnd', '$dateStart', '$dateEnd', '$status', NOW() )";
        mysqli_query($conn, $sql);
        $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>$name </strong> Is Added Successful</div>";
            
    }
}


?>