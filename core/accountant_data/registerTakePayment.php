<?php


    $patient_name = $title = $amount = $description = $method = $status = $date = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addInvoice'])) {
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        // echeck for empty field
        if (empty($patient_name) || empty($title) || empty($amount) || empty($description) || empty($method) || empty($status) || empty($date)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO invoice (patient_name, title, amount, description, method, status, date, register_time)
                VALUES ('$patient_name', '$title', '$amount', '$description', '$method', '$status', '$date', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Prescription</strong> Is Added Successful.</div>";
        }
    } 
?>