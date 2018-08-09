<?php


    $doctor_name = $patient_name = $description = $date = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addDeathReport'])) {
        $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        // echeck for empty field
        if (empty($doctor_name) || empty($patient_name) || empty($description) || empty($date)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO death_report ( doctor_name, patient_name, description, date, register_time)
                VALUES ('$doctor_name', '$patient_name', '$description', '$date', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Bed Allotment</strong> Is Added Successful.</div>";
        }
    }


?>