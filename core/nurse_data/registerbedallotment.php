<?php


    $bed_number = $bed_type = $patient_name = $allotmentTime = $dischargeTime = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addBedAllotment'])) {
        $bed_number = mysqli_real_escape_string($conn, $_POST['bed_number']);
        $bed_type = mysqli_real_escape_string($conn, $_POST['bed_type']);
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
        $allotmentTime = mysqli_real_escape_string($conn, $_POST['allotmentTime']);
        $dischargeTime = mysqli_real_escape_string($conn, $_POST['dischargeTime']);

        // echeck for empty field
        if (empty($bed_number) || empty($bed_type) || empty($patient_name) || empty($allotmentTime) || empty($dischargeTime)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO bedallotment (bed_number, bed_type, patient_name, allotmentTime, dischargeTime, register_time)
                VALUES ('$bed_number', '$bed_type', '$patient_name', '$allotmentTime', '$dischargeTime', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Bed Allotment</strong> Is Added Successful.</div>";
        }
    }


?>