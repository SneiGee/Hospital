<?php


    $name = $email = $password = $address = $phone = $sex = $birth_date = $age = $blood_group = "";
    $errors = array();

    $_SESSION['updateError'] = "";
    $_SESSION['updateSuccess'] = "";

    if (isset($_POST['addPatient'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);

        // chek for empty filed
        if (empty($name) || empty($email) || empty($password) || empty($address) || empty($phone) || empty($sex) || empty($birth_date) || empty($age) || empty($blood_group)) {
            $_SESSION['updateError'] = "<div class='updateError'>All form are mendatory</div>";
        } else {
            // check if email is not valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['updateError'] = "<div class='updateError'>Email is not valid</div>";
            } else {
                # check if email already exist in database
                $sql = "SELECT * FROM patients WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    # print_out email already exist message
                    $_SESSION['updateError'] = "<div class='updateError'>Email already Exist/Use by another someone</div>";
                } else {
                    # check if phone number already exist
                    $sql = "SELECT * FROM patients WHERE phone = '$phone'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        # print_out phone already exist
                        $_SESSION['updateError'] = "<div class='updateError'>Phone Number already Exist/User by another Patient</div>";
                    } else {
                        # if no error is found save patient info to database
                        if (count($errors) == 0) {
                            $password = md5($password);// encrypt password before saveing to database (Password Security)
                            $sql = "INSERT INTO patients (name, email, password, address, phone, sex, birth_date, age, blood_group, register_time)
                                VALUES ( '$name', '$email', '$password', '$address', '$phone', '$sex', '$birth_date', '$age', '$blood_group', NOW() )";
                            mysqli_query($conn, $sql);
                            // print_ nurse inserted successfully
                            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>Patient</strong> $name Is Added Successful</div>";
                        }
                    }
                }
            }
        }
    }


?>