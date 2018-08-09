<?php

    include_once 'db.inc.php';
    
    $_SESSION['LoginError'] = "";

    if (isset($_POST['adminLogin'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // check for empty field
        if (empty($email) || empty($password)) {
            $_SESSION['LoginError'] = "Login Form Required";
        } else {
            # if there's no error allow administrator to log in
            $password = md5($password);//encrypt password before commparing to database
            $query = "SELECT * FROM administrator WHERE email ='$email' AND password='$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                # log administrator to administrator_home page
                $_SESSION['email'] = $email;
                header('location: administrator_home.php?Sigin-Success Welcome');
            } else {
                $_SESSION['LoginError'] = "<div class='LoginError'>Wrong Email-Phone/Password</div>";
            }
        }
    }
     
 
    // Profile Upload
    //Profile photo uploaded and update..
    if (isset($_POST['uploadProfile'])) {
        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name']);
        $query = mysqli_query($conn, "UPDATE administrator SET profile = '".$_FILES['file']['name']."' WHERE email = '".$_SESSION['email']."'");
                
    }


    if (isset($_GET['logout']))   {
        session_destroy();
        unset($_SESSION['logout']);
        header('location: index.php');
    }

?>