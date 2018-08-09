<?php


    $patient_name = $report_type = $document_type = $file = $description = $laboratory_date = $laboratorist_name = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addDiagnosis'])) {
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
        $report_type = mysqli_real_escape_string($conn, $_POST['report_type']);
        $document_type = mysqli_real_escape_string($conn, $_POST['document_type']);
        $file = mysqli_real_escape_string($conn, $_POST['file']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $laboratory_date = mysqli_real_escape_string($conn, $_POST['laboratory_date']);
        $laboratorist_name = mysqli_real_escape_string($conn, $_POST['laboratorist_name']);

        // echeck for empty field
        if (empty($patient_name) || empty($report_type) || empty($document_type) || empty($file) || empty($description) || empty($laboratory_date) || empty($laboratorist_name)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO diagnosis (patient_name, report_type, document_type, file, description, laboratory_date, laboratorist_name, register_time)
                VALUES ('$patient_name', '$report_type', '$document_type', '$file', '$description', '$laboratory_date', '$laboratorist_name', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Prescription</strong> Is Added Successful.</div>";
        }
    }
?>