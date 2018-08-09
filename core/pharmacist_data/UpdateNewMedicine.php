<?php

    include_once 'db.inc.php';
    
    $_SESSION['updateDataSuccess'] = "";
    
    if (isset($_POST['editMedicineData'])) {
        $new_id = mysqli_real_escape_string($conn, $_POST['txtid']);
        $new_name = mysqli_real_escape_string($conn, $_POST['txtname']);
        $new_category = mysqli_real_escape_string($conn, $_POST['txtcategory']);
        $new_description = mysqli_real_escape_string($conn, $_POST['txtdescription']);
        $new_price = mysqli_real_escape_string($conn, $_POST['txtprice']);
        $new_manufacture = mysqli_real_escape_string($conn, $_POST['txtmanufacture']);
        $new_status = mysqli_real_escape_string($conn, $_POST['txtstatus']);
        $sqlupdate = "UPDATE medicine SET medicine_name='$new_name', category_name='$new_category', description='$new_description', price='$new_price',
                manufacturing_company='$new_manufacture', status='$new_status' WHERE id='$new_id'";
        $result_update = mysqli_query($conn, $sqlupdate);
        if ($result_update) {
            //echo '<script>window.location.href="administrator_department.php"</script>';
            $_SESSION['updateDataSuccess'] = "<div class='profileSuccess'><strong>Medicine Data</strong> Is Updated Successful</div>";
        } else {
            echo '<script>alert("Update Fail. Try Again")</script>';
        }
    }
    
     
?>