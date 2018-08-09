<?php


    $medicine_name = $doctor_name = $total_medicine = $status = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addMedication'])) {
        $medicine_name = mysqli_real_escape_string($conn, $_POST['medicine_name']);
        $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
        $total_medicine = mysqli_real_escape_string($conn, $_POST['total_medicine']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        // echeck for empty field
        if (empty($medicine_name) || empty($doctor_name) || empty($total_medicine) || empty($status)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO medication ( medicine_name, doctor_name, total_medicine, status, register_time)
                VALUES ('$medicine_name', '$doctor_name', '$total_medicine', '$status', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Medication</strong> Is Added Successful.</div>";
        }
    }


?>