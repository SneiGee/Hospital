<?php

function emailExist($email) {
    global $conn;

    $sql = "SELECT * FROM administrator WHERE email='$email'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function admin_login($email, $password) {
    global $conn;

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $admindata = admindata($email);
    if ($admindata) {
        $adminPassword = makePassword($password);
        $sql = "SELECT * FROM administrator WHERE email='$email' AND password='$adminPassword'";
        $query = $conn->query($sql);
        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function makePassword($password) {
    return md5($password);
}

function admindata($email) {
    global $conn;

    $sql = "SELECT * FROM administrator WHERE email='$email'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    if ($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }

    $conn->close();
}

function get_admin_data($id) {
    global $conn;

    $sql = "SELECT * FROM administrator WHERE id='$id'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();

    return $result;

    $conn->close();
}

function if_departmentNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM departmentfiles WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addDepartment() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO departmentfiles (name, description, register_time) 
        VALUES ($name, $description, NOW() )";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function checkUpdateDepartmentName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM departmentfiles WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateDepartment($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $description = $conn->real_escape_String($_POST['txtdescription']);

    $sql = "UPDATE departmentfiles SET name='$name', description='$description' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteDepartment($id) {
    global $conn;

    $sql = "DELETE FROM departmentfiles WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_doctorNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_doctorPhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewDoctor() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $department = $conn->real_escape_string($_POST['department']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $doctor_address = $conn->real_escape_string($_POST['doctor_address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $doctorPassword = makePassword($password);
    if ($doctorPassword) {
        $sql = "INSERT INTO doctors (name, department, email, password, doctor_address, phone, register_time)
           VALUES ('$name', '$department', '$email', '$doctorPassword', '$doctor_address', '$phone', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdateDoctorName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateDoctorData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $department = $conn->real_escape_String($_POST['txtdepartment']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE doctors SET name='$name', department='$department', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteDoctorAccount($id) {
    global $conn;

    $sql = "DELETE FROM doctors WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_NurseNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM nurses WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_NursePhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM nurses WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewNurse() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $nursePassword = makePassword($password);
    if ($nursePassword) {
        $sql = "INSERT INTO nurses (name, email, password, address, phone, register_time)
           VALUES ('$name', '$email', '$nursePassword', 'address', '$phone', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdateNurseName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM nurses WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateNurseData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE nurses SET name='$name', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteNurseAccount($id) {
    global $conn;

    $sql = "DELETE FROM nurses WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_PatientNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_PatientPhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewPatient() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $sex = $conn->real_escape_string($_POST['sex']);
    $birth_date = $conn->real_escape_string($_POST['birth_date']);
    $age = $conn->real_escape_string($_POST['age']);
    $blood_group = $conn->real_escape_string($_POST['blood_group']);

    $patientPassword = makePassword($password);
    if ($patientPassword) {
        $sql = "INSERT INTO patients (name, email, password, address, phone, sex, date, age, blood_group, register_time)
           VALUES ('$name', '$email', '$patientPassword', '$address', '$phone', '$sex', '$birth_date', '$age', '$blood_group', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdatePatientName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatePatientData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE patients SET name='$name', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deletePatientAccount($id) {
    global $conn;

    $sql = "DELETE FROM patients WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_PharmacistNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM pharmacist WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_PharmacistPhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM pharmacist WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewPharmacist() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $pharmacistPassword = makePassword($password);
    if ($pharmacistPassword) {
        $sql = "INSERT INTO pharmacist (name, email, password, address, phone, register_time)
           VALUES ('$name', '$email', '$pharmacistPassword', 'address', '$phone', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdatePharmacistName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM pharmacist WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatePharmacistData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE pharmacist SET name='$name', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deletePharmacistAccount($id) {
    global $conn;

    $sql = "DELETE FROM pharmacist WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_LaboratoryNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM laboratory WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_LaboratoryPhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM laboratory WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewLaboratory() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $laboratoryPassword = makePassword($password);
    if ($laboratoryPassword) {
        $sql = "INSERT INTO laboratory (name, email, password, address, phone, register_time)
           VALUES ('$name', '$email', '$laboratoryPassword', 'address', '$phone', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdateLaboratoryName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM laboratory WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateLaboratoryData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE laboratory SET name='$name', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteLaboratoryAccount($id) {
    global $conn;

    $sql = "DELETE FROM laboratory WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_AccountantNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM accountant WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_AccountantPhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM accountant WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewAccountant() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $accountantPassword = makePassword($password);
    if ($accountantPassword) {
        $sql = "INSERT INTO accountant (name, email, password, address, phone, register_time)
           VALUES ('$name', '$email', '$accountantPassword', 'address', '$phone', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdateAccountantName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM accountant WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateAccountantData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE accountant SET name='$name', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteAccountantAccount($id) {
    global $conn;

    $sql = "DELETE FROM laboratory WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_GuardNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM guard WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_GuardPhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM guard WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewGuard() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $guardPassword = makePassword($password);
    if ($guardPassword) {
        $sql = "INSERT INTO guard (name, email, password, address, phone, register_time)
           VALUES ('$name', '$email', '$guardPassword', 'address', '$phone', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdateGuardName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM guard WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateGuardData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE guard SET name='$name', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteGuardAccount($id) {
    global $conn;

    $sql = "DELETE FROM guard WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_CareTakerNameExist($name) {
    global $conn;

    $sql = "SELECT * FROM careTaker WHERE name ='$name'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_CareTakerPhoneExist($phone) {
    global $conn;

    $sql = "SELECT * FROM careTaker WHERE phone ='$phone'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewCareTaker() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $careTakerPassword = makePassword($password);
    if ($careTakerPassword) {
        $sql = "INSERT INTO careTaker (name, email, password, address, phone, register_time)
           VALUES ('$name', '$email', '$careTakerPassword', 'address', '$phone', NOW() )";
        $query = $conn->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function checkUpdateCareTakerName_exist($id, $name) {
    global $conn;

    $sql = "SELECT * FROM careTaker WHERE name ='$name' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateCareTakerData($id) {
    global $conn;

    $id = $conn->real_escape_String($_POST['txtid']);
    $name = $conn->real_escape_String($_POST['txtname']);
    $email = $conn->real_escape_String($_POST['txtemail']);

    $sql = "UPDATE careTaker SET name='$name', email='$email' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteCareTakerAccount($id) {
    global $conn;

    $sql = "DELETE FROM careTaker WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewNoticeboard() {
    global $conn;

    $title = $conn->real_escape_string($_POST['title']);
    $notice = $conn->real_escape_string($_POST['notice']);
    $day = $conn->real_escape_string($_POST['day']);
    $month = $conn->real_escape_string($_POST['month']);
    $year = $conn->real_escape_string($_POST['year']);
    $mytime = $conn->real_escape_string($_POST['mytime']);
    $promp = $conn->real_escape_string($_POST['promp']);

    $sql = "INSERT INTO noticeboard (title, notice, day, month, year, mytime, promp, register_time)
        VALUES ('$title', '$notice', '$day', '$month', '$year', '$mytime', '$promp', NOW() )";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateNoticeboardData($id) {
    global $conn;

    $title = $conn->real_escape_string($_POST['title']);
    $notice = $conn->real_escape_string($_POST['notice']);
    $day = $conn->real_escape_string($_POST['day']);
    $month = $conn->real_escape_string($_POST['month']);
    $year = $conn->real_escape_string($_POST['year']);
    $mytime = $conn->real_escape_string($_POST['mytime']);
    $promp = $conn->real_escape_string($_POST['promp']);

    $sql = "UPDATE noticeboard SET title='$title', notice='$notice', day='$day', month='$month', year='$year',
        mytime='$mytime, promp='$promp' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteNoticeboardAccount($id) {
    global $conn;

    $sql = "DELETE FROM noticebaord WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateSystemSetting() {
    global $conn;

    $sql = " UPDATE systemsettings SET systemName='$_POST[systemName]', systemTitle='$_POST[systemTitle]',
            systemEmail='$_POST[systemEmail]', systemAddress='$_POST[systemAddress]', systemPhone='$_POST[systemPhone]',
            systemPaypal='$_POST[systemPaypal]', systemCurrency='$_POST[systemCurrency]' WHERE id='$_POST[id]'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_administrator_exist($id, $email) {
    global $conn;

    $sql = "SELECT * FROM administrator WHERE email='$email' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateAdministratorData($id) {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE administrator SET name='$name', email='$email', address='$address', phone='$phone' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function administratorPasswordMatch($id, $password) {
    global $conn;

    $admindata = get_admin_data($id);

    $makePassword = makePassword($password);

    if ($makePassword == $admindata['password']) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function changeAdministratorPassword($id, $password) {
    global $conn;

    $makePassword = makePassword($password);

    $sql = "UPDATE administrator SET password ='$makePassword' WHERE id ='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function uploadAdministratorProfile($id) {
    global $conn;

    $sql = "UPDATE administrator SET profile = '".$_FILES['profile']['name']."' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function doctorEmailExist($email) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE email='$email'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function doctor_login($email, $password) {
    global $conn;

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $doctordata = doctordata($email);
    if ($doctordata) {
        $doctorPassword = makePassword($password);
        $sql = "SELECT * FROM doctors WHERE email='$email' AND password='$doctorPassword'";
        $query = $conn->query($sql);
        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function doctordata($email) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE email='$email'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    if ($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }

    $conn->close();
}

function get_doctor_data($id) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE id='$id'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();

    return $result;

    $conn->close();
}

function if_appointmentDateExist($appointment_date) {
    global $conn;

    $sql = "SELECT * FROM doctor_appointment WHERE appointment_date='$appointment_date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewAppointment() {
    global $conn;

    $doctor_name = $conn->real_escape_string($_POST['doctor_name']);
    $doctor_department = $conn->real_escape_string($_POST['doctor_department']);
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $appointment_date = $conn->real_escape_string($_POST['appointment_date']);

    $sql = "INSERT INTO doctor_appointment (doctor_name, doctor_department, patient_name, appointment_date, register_time)
       VALUES ('$doctor_name', '$doctor_department', '$patient_name', '$appointment_date', NOW()) ";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function check_if_appointmentUpdateDate_exist($id, $appointment_date) {
    global $conn;

    $sql = "SELECT * FROM doctor_appointment WHERE appointment_date ='$appointment_date' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateAppoinmentData($id) {
    global $conn;

    $date = mysqli_real_escape_string($conn, $_POST['txtdate']);

    $sql = "UPDATE doctor_appointment SET appointment_date='$date' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteAppointmentAccount($id) {
    global $conn;

    $sql = "DELETE FROM doctor_appointment WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_prescription_patient_dateExist($patient_name, $prescription_date) {
    global $conn;

    $sql = "SELECT * FROM doctor_prescription WHERE patient_name='$patient_name' AND prescription_date='$prescription_date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewPrescription() {
    global $conn;

    $doctor_name = $conn->real_escape_string($_POST['doctor_name']);
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $case_history = $conn->real_escape_string($_POST['case_history']);
    $medication = $conn->real_escape_string($_POST['medication']);
    $medicationfrom_pharmacist = $conn->real_escape_string($_POST['medicationfrom_pharmacist']);
    $description = $conn->real_escape_string($_POST['description']);
    $prescription_date = $conn->real_escape_string($_POST['prescription_date']);

    $sql = "INSERT INTO doctor_prescription (doctor_name, patient_name, case_history, medication, medicationfrom_pharmacist, description, prescription_date, register_time)
       VALUES ('$doctor_name', '$patient_name', '$case_history', '$medication', '$medicationfrom_pharmacist', '$description', '$prescription_date', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function check_if_precription_patient_date_UpdateDate_exist($id, $patient_name, $prescription_date) {
    global $conn;

    $sql = "SELECT * FROM doctor_prescription WHERE patient_name='$patient_name' AND prescription_date ='$prescription_date' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateprescriptionData($id) {
    global $conn;

    $patient_name = $conn->real_escape_string($_POST['txtpatientname']);
    $case_history = $conn->real_escape_string($_POST['txtcase_history']);
    $medication = $conn->real_escape_string($_POST['txtmedication']);
    $description = $conn->real_escape_string($_POST['txtdescription']);
    $prescription_date = $conn->real_escape_string($_POST['txtprescription_date']);

    $sql = "UPDATE doctor_prescription SET patient_name='$patient_name', case_history='$case_history',
        medication='$medication', description='$description', prescription_date='$prescription_date' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUe) {
        return true;
    } else {
        return false;
    }
}

function deletePrescriptionAccount($id) {
    global $conn;

    $sql = "DELETE FROM doctor_prescription WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_bedAllotment_Exist($bed_numberType) {
    global $conn;

    $sql = "SELECT * FROM bedAllotment WHERE bed_numberType='$bed_numberType'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewBedAllotment() {
    global $conn;

    $bed_numberType = $conn->real_escape_string($_POST['bed_numberType']);
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $allotmentTime = $conn->real_escape_string($_POST['allotmentTime']);
    $dischargeTime = $conn->real_escape_string($_POST['dischargeTime']);

    $sql = "INSERT INTO bedAllotment (bed_numberType, patient_name, allotmentTime, dischargeTime, register_time)
        VALUES ('$bed_numberType', '$patient_name', '$allotmentTime', '$dischargeTime', NOW()) ";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function check_if_bednumber_exist($id, $bed_numberType) {
    global $conn;

    $sql = "SELECT * FROM bedAllotment WHERE bed_numberType ='$bed_numberType' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatebedAllotmentData($id) {
    global $conn;

    $bed_numberType = $conn->real_escape_string($_POST['txtnumberType']);
    $allotmentTime = $conn->real_escape_string($_POST['txtallotment']);
    $dischargeTime = $conn->real_escape_string($_POST['txtdischargeTime']);

    $sql = "UPDATE bedallotment SET bed_numberType='$bed_numberType',
        allotmentTime='$allotmentTime', dischargeTime='$dischargeTime' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteBedAllotmentAccount($id) {
    global $conn;

    $sql = "DELETE FROM bedallotment WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_patientName_date_exist($patient_name, $date) {
    global $conn;

    $sql = "SELECT * FROM operation_report WHERE patient_name='$patient_name' AND date='$date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->clsoe();
}

function addNewOperation() {
    global $conn;

    $description = $conn->real_escape_string($_POST['description']);
    $date = $conn->real_escape_string($_POST['date']);
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $doctor_name = $conn->real_escape_string($_POST['doctor_name']);

    $sql = "INSERT INTO operation_report (description, date, patient_name, doctor_name, register_time)
        VALUES ('$description', '$date', '$patient_name', '$doctor_name', NOW()) ";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true; 
    } else {
        return false;
    }

    $con->close();
}

function deleteOperationAccount($id) {
    global $conn;

    $sql = "DELETE FROM operation_report WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_brith_patientName_date_exist($patient_name, $date) {
    global $conn;

    $sql = "SELECT * FROM birth_report WHERE patient_name='$patient_name' AND date='$date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->clsoe();
}

function addNewBirth() {
    global $conn;

    $doctor_name = $conn->real_escape_string($_POST['doctor_name']);
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $date = $conn->real_escape_string($_POST['date']);

    $sql = "INSERT INTO birth_report ( doctor_name, patient_name, description, date, register_time)
        VALUES ('$doctor_name', '$patient_name', '$description', '$date', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->clsoe();
}

function deleteBirthAccount($id) {
    global $conn;

    $sql = "DELETE FROM birth_report WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_death_patientName_date_exist($patient_name, $date) {
    global $conn;

    $sql = "SELECT * FROM death_report WHERE patient_name='$patient_name' AND date='$date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->clsoe();
}

function addNewDeath() {
    global $conn;

    $doctor_name = $conn->real_escape_string($_POST['doctor_name']);
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $date = $conn->real_escape_string($_POST['date']);

    $sql = "INSERT INTO death_report ( doctor_name, patient_name, description, date, register_time)
        VALUES ('$doctor_name', '$patient_name', '$description', '$date', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->clsoe();
}

function deleteDeathAccount($id) {
    global $conn;

    $sql = "DELETE FROM death_report WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_other_patientName_date_exist($patient_name, $date) {
    global $conn;

    $sql = "SELECT * FROM other_report WHERE patient_name='$patient_name' AND date='$date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->clsoe();
}

function addNewOther() {
    global $conn;

    $doctor_name = $conn->real_escape_string($_POST['doctor_name']);
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $date = $conn->real_escape_string($_POST['date']);

    $sql = "INSERT INTO other_report ( doctor_name, patient_name, description, date, register_time)
        VALUES ('$doctor_name', '$patient_name', '$description', '$date', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->clsoe();
}

function deleteOtherAccount($id) {
    global $conn;

    $sql = "DELETE FROM other_report WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_doctor_exist($id, $email) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE email ='$email' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateDoctorUserData($id) {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $doctor_address = $conn->real_escape_string($_POST['doctor_address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE doctors SET name='$name', email='$email', doctor_address='$doctor_address', phone='$phone' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function doctorPasswordMatch($id, $password) {
    global $conn;
    
    $doctordata = get_doctor_data($id);

    $makePassword = makePassword($password);

    if ($makePassword == $doctordata['password']) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function changeDoctorPassword($id, $password) {
    global $conn;

    $makePassword = makePassword($password);

    $sql = "UPDATE doctors SET password ='$makePassword' WHERE id ='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function uploadDoctorProfile($id) {
    global $conn;

    $sql = "UPDATE doctors SET profile = '".$_FILES['profile']['name']."' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function nurseEmailExist($email) {
    global $conn;

    $sql = "SELECT * FROM nurses WHERE email ='$email'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function nurse_login($email, $password) {
    global $conn;

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $nursedata = nursedata($email);
    if ($nursedata) {
        $nursePassword = makePassword($password);
        $sql = "SELECT * FROM nurses WHERE email ='$email' AND password ='$nursePassword'";
        $query = $conn->query($sql);
        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function nursedata($email) {
    global $conn;

    $sql = "SELECT * FROM nurses WHERE email ='$email'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    if ($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }

    $conn->close();
}

function get_nurse_data($id) {
    global $conn;

    $sql = "SELECT * FROM nurses WHERE ID='$id'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();

    return $result;

    $conn->close();
}

function if_bedNumber_type_Exist($bed_number, $bed_type) {
    global $conn;

    $sql = "SELECT * FROM bed WHERE bed_number='$bed_number' AND bed_type ='$bed_type'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewBed() {
    global $conn;

    $bed_number = $conn->real_escape_string($_POST['bed_number']);
    $bed_type = $conn->real_escape_string($_POST['bed_type']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO bed (bed_number, bed_type, description, register_time)
       VALUES ('$bed_number', '$bed_type', '$description', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function check_if_bednumber_andBedType_exist($id, $bed_number, $bed_type) {
    global $conn;

    $sql = "SELECT * FROM bed WHERE bed_number ='$bed_number' AND bed_type ='$bed_type' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatebedData($id) {
    global $conn;

    $bed_number = mysqli_real_escape_string($conn, $_POST['txtnumber']);
    $bed_type = mysqli_real_escape_string($conn, $_POST['txtType']);
    $description = mysqli_real_escape_string($conn, $_POST['txtdescription']);

    $sql = "UPDATE bed SET bed_number='$bed_number', bed_type='$bed_type', description='$description'
       WHERE id='$ID'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteBedAccount($id) {
    global $conn;

    $sql = "DELETE FROM bed WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatebloodBankData($id) {
    global $conn;

    $bloodGroup = $conn->real_escape_string($_POST['txtbloodGroup']);
    $status = $conn->real_escape_string($_POST['txtstatus']);

    $sql = "UPDATE blood_bank SET blood_group='$bloodGroup', status='$status'
        WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_NameDate_type_Exist($name, $donationDate) {
    global $conn;

    $sql = "SELECT * FROM blood_donor WHERE name='$name' AND donationDate ='$donationDate'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewBloodDonor() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $age = $conn->real_escape_string($_POST['age']);
    $sex = $conn->real_escape_string($_POST['sex']);
    $blood_group = $conn->real_escape_string($_POST['blood_group']);
    $donationDate = $conn->real_escape_string($_POST['donationDate']);

    $sql = "INSERT INTO blood_donor (name, email, address, phone,  age, sex, blood_group, donationDate, register_time)
        VALUES ('$name', '$email', '$address', '$phone', '$age', '$sex', '$blood_group', '$donationDate', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function check_if_name_andDate_exist($id, $name, $donationDate) {
    global $conn;

    $sql = "SELECT * FROM blood_donor WHERE name ='$name' AND donationDate ='$donationDate' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatebloodDonorData($id) {
    global $conn;

    $name = $conn->real_escape_string($_POST['txtname']);
    $age = $conn->real_escape_string($_POST['txtage']);
    $phone = $conn->real_escape_string($_POST['txtphone']);
    $bloodGroup = $conn->real_escape_string($_POST['txtbloodGroup']);
    $donationDate = $conn->real_escape_string($_POST['txtdonationDate']);

    $sql = "UPDATE blood_donor SET name='$name', age='$age', phone='$phone', blood_group='$bloodGroup', donationDate ='$donationDate'
        WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deletebloodDonorAccount($id) {
    global $conn;

    $sql = "DELETE FROM blood_donor WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_nurse_exist($id, $email) {
    global $conn;

    $sql = "SELECT * FROM nurses WHERE email ='$email' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateNurseUserData($id) {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE nurses SET name ='$name', email ='$email', address ='$address', phone ='$phone' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function nursePasswordMatch($id, $password) {
    global $conn;
    
    $nursedata = get_nurse_data($id);

    $makePassword = makePassword($password);

    if ($makePassword == $nursedata['password']) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function changeNursePassword($id, $password) {
    global $conn;

    $makePassword = makePassword($password);

    $sql = "UPDATE nurses SET password ='$makePassword' WHERE id ='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function uploadNurseProfile($id) {
    global $conn;

    $sql = "UPDATE nurses SET profile = '".$_FILES['profile']['name']."' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function paientEmailExist($email) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE email ='$email'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function patient_login($email, $password) {
    global $conn;

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $patientdata = patientdata($email);
    if ($patientdata) {
        $patientPassword = makePassword($password);
        $sql = "SELECT * FROM patients WHERE email ='$email' AND password ='$patientPassword'";
        $query = $conn->query($sql);
        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function patientdata($email) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE email ='$email'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    if ($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }
    
    $conn->close();
}

function get_patient_data($id) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE id ='$id'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();

    return $result;

    $conn->close();
}

function if_patient_exist($id, $email) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE email ='$email' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatePatientUserData($id) {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE patients SET name ='$name', email ='$email', address ='$address', phone ='$phone' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function patientPasswordMatch($id, $password) {
    global $conn;
    
    $patientdata = get_patient_data($id);

    $makePassword = makePassword($password);

    if ($makePassword == $patientdata['password']) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function changePatientPassword($id, $password) {
    global $conn;

    $makePassword = makePassword($password);

    $sql = "UPDATE patients SET password ='$makePassword' WHERE id ='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function uploadPatientProfile($id) {
    global $conn;

    $sql = "UPDATE patients SET profile = '".$_FILES['profile']['name']."' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function pharmacistEmailExist($email) {
    global $conn;

    $sql = "SELECT * FROM pharmacist WHERE email ='$email'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function pharmacist_login($email, $password) {
    global $conn;

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $pharmacistdata = pharmacistdata($email);
    if ($pharmacistdata) {
        $pharmacistPassword = makePassword($password);
        $sql = "SELECT * FROM pharmacist WHERE email ='$email' AND password ='$pharmacistPassword'";
        $query = $conn->query($sql);
        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function pharmacistdata($email) {
    global $conn;

    $sql = "SELECT * FROM pharmacist WHERE email ='$email'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    if ($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }
    
    $conn->close();
}

function get_pharmacist_data($id) {
    global $conn;

    $sql = "SELECT * FROM pharmacist WHERE id ='$id'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();

    return $result;

    $conn->close();
}

function addNewMedicineCategory() {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO medicine_category ( name, description, register_time)
       VALUES ('$name', '$description', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateMedicineCategoryData($id) {
    global $conn;

    $name = $conn->real_escape_string($_POST['txtname']);
    $description = $conn->real_escape_string($_POST['txtdescription']);

    $sql = "UPDATE medicine_category SET name='$name', description='$description'
        WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteMedicineCategory($id) {
    global $conn;

    $sql = "DELETE FROM medicine_category WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_medicine_alreadyExist($medicine_name, $date) {
    global $conn;

    $sql = "SELECT * FROM medicine WHERE medicine_name='$medicine_name' AND date ='$date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewMedicine() {
    global $conn;

    $medicine_name = $conn->real_escape_string($_POST['medicine_name']);
    $category_name = $conn->real_escape_string($_POST['category_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);
    $manufacturing_company = $conn->real_escape_string($_POST['manufacturing_company']);
    $date = $conn->real_escape_string($_POST['date']);
    $status = $conn->real_escape_string($_POST['status']);

    $sql = "INSERT INTO medicine ( medicine_name, category_name, description, price, manufacturing_company, date, status, register_time)
        VALUES ('$medicine_name', '$category_name', '$description', '$price', '$manufacturing_company', '$date', '$status', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function checkMedicine_andDateExist($id, $medicine_name, $date) {
    global $conn;

    $sql = "SELECT * FROM medicine WHERE medicine_name ='$medicine_name' AND date ='$date' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateMedicineData($id) {
    global $conn;

    $medicine_name = $conn->real_escape_string($_POST['txtname']);
    $category_name = $conn->real_escape_string($_POST['txtcategory']);
    $description = $conn->real_escape_string($_POST['txtdescription']);
    $price = $conn->real_escape_string($_POST['txtprice']);
    $manufacturing_company = $conn->real_escape_string($_POST['txtmanufacture']);
    $date = $conn->real_escape_string($_POST['txtdate']);
    $status = $conn->real_escape_string($_POST['txtstatus']);

    $sql = "UPDATE medicine SET medicine_name='$medicine_name', category_name='$category_name', description='$description', price='$price',
        manufacturing_company='$manufacturing_company', date='$date', status='$status' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteMedicine($id) {
    global $conn;

    $sql = "DELETE FROM medicine WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_medication_alreadyExist($medicine_name, $date) {
    global $conn;

    $sql = "SELECT * FROM medication WHERE medicine_name='$medicine_name' AND date ='$date'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewMedication() {
    global $conn;

    $medicine_name = $conn->real_escape_string($_POST['medicine_name']);
    $doctor_name = $conn->real_escape_string($_POST['doctor_name']);
    $total_medicine = $conn->real_escape_string($_POST['total_medicine']);
    $date = $conn->real_escape_string($_POST['date']);
    $status = $conn->real_escape_string($_POST['status']);

    $sql = "INSERT INTO medication ( medicine_name, doctor_name, total_medicine, date, status, register_time)
       VALUES ('$medicine_name', '$doctor_name', '$total_medicine', '$date', '$status', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function checkMedication_andDateExist($id, $medicine_name, $date) {
    global $conn;

    $sql = "SELECT * FROM medication WHERE medicine_name ='$medicine_name' AND date ='$date' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateMedicationData($id) {
    global $conn;

    $medicine_name = $conn->real_escape_string($_POST['txtname']);
    $doctor_name = $conn->real_escape_string($_POST['txtdoctorName']);
    $total_medicine = $conn->real_escape_string($_POST['txttotalMedicine']);
    $date = $conn->real_escape_string($_POST['txtdate']);
    $status = $conn->real_escape_string($_POST['txtstatus']);

    $sql = "UPDATE medication SET medicine_name='$medicine_name', doctor_name='$doctor_name', total_medicine='$total_medicine',
       date='$date', status='$status' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteMedication($id) {
    global $conn;

    $sql = "DELETE FROM medication WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function if_pharmacist_exist($id, $email) {
    global $conn;

    $sql = "SELECT * FROM pharmacist WHERE email ='$email' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updatePharmacistUserData($id) {
    global $conn;

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE pharmacist SET name ='$name', email ='$email', address ='$address', phone ='$phone' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function pharmacistPasswordMatch($id, $password) {
    global $conn;
    
    $pharmacistdata = get_pharmacist_data($id);

    $makePassword = makePassword($password);

    if ($makePassword == $pharmacistdata['password']) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function changePharmacistPassword($id, $password) {
    global $conn;

    $makePassword = makePassword($password);

    $sql = "UPDATE pharmacist SET password ='$makePassword' WHERE id ='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function uploadPharmacisProfile($id) {
    global $conn;

    $sql = "UPDATE pharmacist SET profile = '".$_FILES['profile']['name']."' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function laboratoryEmailExist($email) {
    global $conn;

    $sql = "SELECT * FROM laboratory WHERE email ='$email'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function laboratory_login($email, $password) {
    global $conn;

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $laboratorydata = laboratorydata($email);
    if ($laboratorydata) {
        $laboratoryPassword = makePassword($password);
        $sql = "SELECT * FROM laboratory WHERE email ='$email' AND password ='$laboratoryPassword'";
        $query = $conn->query($sql);
        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    $conn->close();
}

function laboratorydata($email) {
    global $conn;

    $sql = "SELECT * FROM laboratory WHERE email ='$email'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    if ($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }
    
    $conn->close();
}

function get_laboratory_data($id) {
    global $conn;

    $sql = "SELECT * FROM laboratory WHERE id ='$id'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();

    return $result;

    $conn->close();
}

function if_diagnosis_patientFile_exist($patient_name, $file) {
    global $conn;

    $sql = "SELECT * FROM diagnosis WHERE patient_name='$patient_name' AND file ='".$_FILES['file']['name']."' ";
    $query = $conn->query($sql);
    if ($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function addNewDiagnosis() {
    global $conn;

    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $report_type = $conn->real_escape_string($_POST['report_type']);
    $document_type = $conn->real_escape_string($_POST['document_type']);
    $file = $conn->real_escape_string("diagnosis/".$_FILES['file']['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $laboratory_date = $conn->real_escape_string($_POST['laboratory_date']);
    $laboratorist_name = $conn->real_escape_string($_POST['laboratorist_name']);

    $sql = "INSERT INTO diagnosis (patient_name, report_type, document_type, file, description, laboratory_date, laboratorist_name, register_time)
       VALUES ('$patient_name', '$report_type', '$document_type', '".$_FILES['file']['name']."', '$description', '$laboratory_date', '$laboratorist_name', NOW())";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->query();
}

function check_if_diagnosis_patientFile_exist($id, $patient_name, $file) {
    global $conn;

    $sql = "SELECT * FROM diagnosis WHERE patient_name ='$patient_name' AND file ='".$_FILES['file']['name']."' AND id !='$id'";
    $query = $conn->query($sql);
    if ($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function updateDiagnosisData($id) {
    global $conn;
    $id = $conn->real_escape_string($_POST['txtid']);
    $patient_name = $conn->real_escape_string($_POST['txtpatient']);
    $report_type = $conn->real_escape_string($_POST['txtreportType']);
    $document_type = $conn->real_escape_string($_POST['txtdocumentType']);
    $file = $conn->real_escape_string("diagnosis/".$_FILES['file']['name']);
    $description = $conn->real_escape_string($_POST['txtdescription']);
    $laboratorist_name = $conn->real_escape_string($_POST['txtlaboratorist']);

    $sql = "UPDATE diagnosis SET patient_name='$patient_name', report_type='$report_type', document_type='$document_type',
       file='".$_FILES['file']['name']."', description='$description', laboratorist_name='$laboratorist_name' WHERE id='$id'";
    $query = $conn->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function deleteDiagnosisReport($id) {
    global $conn;

    $sql = "DELETE FROM diagnosis WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function logged_in() {
    if (isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}

function not_logged_in() {
    if (isset($_SESSION['id']) === FALSE) {
        return true;
    } else {
        return false;
    }
}

function logout() {
    if (logged_in($_SESSION['id']) === TRUE) {
        session_unset();

        session_destroy();

        header("location: index.php");
    }
}

?>
