<?php


    $doctor_name = $doctor_department = $patient_name = $appointment_date = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addAppointment'])) {
        $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
        $doctor_department = mysqli_real_escape_string($conn, $_POST['doctor_department']);
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
        $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);

        // echeck for empty field
        if (empty($doctor_name) || empty($doctor_department) || empty($patient_name) || empty($appointment_date)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO doctor_appointment (doctor_name, doctor_department, patient_name, appointment_date, register_time)
                VALUES ('$doctor_name', '$doctor_department', '$patient_name', '$appointment_date', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Appointment</strong> Is Added Successful.</div>";
        }
    }


?>