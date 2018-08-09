<?php


    $name = $email = $address = $phone = $age = $sex = $blood_group = $donationDate = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addBloodDonor'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
        $donationDate = mysqli_real_escape_string($conn, $_POST['donationDate']);

        // echeck for empty field
        if (empty($name) || empty($email) || empty($address) || empty($phone) || empty($age) || empty($sex) || empty($blood_group) || empty($donationDate)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO blood_donor (name, email, address, phone,  age, sex, blood_group, donationDate, register_time)
                VALUES ('$name', '$email', '$address', '$phone', '$age', '$sex', '$blood_group', '$donationDate', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Blood Bonation</strong> Is Added Successful.</div>";
        }
    }


?>