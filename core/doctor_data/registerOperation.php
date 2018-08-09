<?php


    $description = $date = $patient_name = $doctor_name = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addOperation'])) {
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
        $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);

        // check for empty field
        if (empty($description) || empty($date) || empty($patient_name) || empty($doctor_name)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO operation_report (description, date, patient_name, doctor_name, register_time)
                VALUES ('$description', '$date', '$patient_name', '$doctor_name', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Operation Report</strong> Is Added Successful.</div>";
        }
    }


?>