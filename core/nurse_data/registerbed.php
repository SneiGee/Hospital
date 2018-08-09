<?php


    $bed_number = $bed_type = $description = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addBed'])) {
        $bed_number = mysqli_real_escape_string($conn, $_POST['bed_number']);
        $bed_type = mysqli_real_escape_string($conn, $_POST['bed_type']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        // echeck for empty field
        if (empty($bed_number) || empty($bed_type) || empty($description)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO bed (bed_number, bed_type, description, register_time)
                VALUES ('$bed_number', '$bed_type', '$description', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Bed</strong> Is Added Successful.</div>";
        }
    }


?>