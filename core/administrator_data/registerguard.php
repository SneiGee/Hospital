<?php


    $name = $email = $password = $address = $phone = "";

    $_SESSION['updateError'] = "";
    $_SESSION['updateSuccess'] = "";

    if (isset($_POST['addGuard'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        // chek for empty filed
        if (empty($name) || empty($email) || empty($password) || empty($address) || empty($phone)) {
            $_SESSION['updateError'] = "<div class='updateError'>All form are mendatory</div>";
        } else {
            // check if email is not valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['updateError'] = "<div class='updateError'>Email is not valid</div>";
            } else {
                # check if email already exist in database
                $sql = "SELECT * FROM guard WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    # print_out email already exist message
                    $_SESSION['updateError'] = "<div class='updateError'>Email already Exist/Use by someone</div>";
                } else {
                    # check if phone number already exist
                    $sql = "SELECT * FROM guard WHERE phone = '$phone'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        # print_out phone already exist
                        $_SESSION['updateError'] = "<div class='updateError'>Phone Number already Exist/User by another Doctor</div>";
                    } else {
                        # if no error is found save Laboratory info to database
                        $password = md5($password);// encrypt password before saveing to database (Password Security)
                        $sql = "INSERT INTO guard (name, email, password, address, phone, register_time)
                            VALUES ( '$name', '$email', '$password', '$address', '$phone', NOW() )";
                        mysqli_query($conn, $sql);
                        // print_ Laboratory inserted successfully
                        $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>$name</strong> Is Added Successful</div>";
                        
                    }
                }
            }
        }
    }


?>