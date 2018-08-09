<?php


    $medicine_name = $category_name = $description = $price = $manufacturing_company = $status = "";

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addMedicine'])) {
        $medicine_name = mysqli_real_escape_string($conn, $_POST['medicine_name']);
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $manufacturing_company = mysqli_real_escape_string($conn, $_POST['manufacturing_company']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        // echeck for empty field
        if (empty($medicine_name) || empty($category_name) || empty($description) || empty($price) || empty($manufacturing_company) || empty($status)) {
            $_SESSION['updateError'] = "<div class='updateError'>All field are mendatory</div>";
        } else {
            # if there's no error save appointment to database
            $sql = "INSERT INTO medicine ( medicine_name, category_name, description, price, manufacturing_company, status, register_time)
                VALUES ('$medicine_name', '$category_name', '$description', '$price', '$manufacturing_company', '$status', NOW())";

            mysqli_query($conn, $sql);
            $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>New Medicine</strong> Is Added Successful.</div>";
        }
    }


?>