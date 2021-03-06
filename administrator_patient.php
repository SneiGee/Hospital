   
<!-- ============================================
     MYBLOGSITE HOSPITAL MANAGEMENT SYSTEM
     ONINE ADVANCE MANAGEMENT SOFTWARE
     BUILD BY: SCHNEIDER MICHAEL
 ==============================================
-->
<?php

    require_once 'core/init.php';

    if (not_logged_in() === TRUE) {
        header("location: index.php?Login-to-access-your-account/");
    }

    $admindata = get_admin_data($_SESSION['id']);

    $_SESSION['updateSuccess'] = "";
    $_SESSION['updateError'] = "";

    if (isset($_POST['addPatient'])) {// add PAtient
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $address = $conn->real_escape_string($_POST['address']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $sex = $conn->real_escape_string($_POST['sex']);
        $birth_date = $conn->real_escape_string($_POST['birth_date']);
        $age = $conn->real_escape_string($_POST['age']);
        $blood_group = $conn->real_escape_string($_POST['blood_group']);

        if (empty($name) || empty($email) || empty($password) || empty($address) || empty($phone) || empty($sex) || empty($birth_date) || empty($age) || empty($blood_group)) {
            $_SESSION['updateError'] = "<div class='updateError'>All form are mendatory</div>";
        }

        if ($name && $email && $password && $address && $phone && $sex && $birth_date && $age && $blood_group) {
            if (if_PatientNameExist($name) === TRUE) {
                $_SESSION['updateError'] = "<div class='updateError'>Patient! $name name already exist</div>";
            } else {
                if (if_PatientPhoneExist($phone) === TRUE) {
                    $_SESSION['updateError'] = "<div class='updateError'>Patient! $name name already exist</div>";
                } else {
                    if (addNewPatient() === TRUE) {
                        $_SESSION['updateSuccess'] = "<div class='profileSuccess'><strong>$name</strong> Is Added Successful.</div>";
                    } else {
                        $_SESSION['updateError'] = "<div class='updateError'><strong>Error While adding new nurse.</div>";
                    }
                }
            }
        }
    }

    if (isset($_POST['editPatientData'])) { // update deapartment data
        $id = $conn->real_escape_String($_POST['txtid']);
        $name = $conn->real_escape_String($_POST['txtname']);
        $email = $conn->real_escape_String($_POST['txtemail']);

        if (empty($name) || empty($email)) {
            $_SESSION['updateError'] = "<div class='updateError'>updating field required</div>";
        }

        if ($name && $email) {
            $updatePatientName_exist = checkUpdatePatientName_exist($id, $name);
            if ($updatePatientName_exist) {
                $_SESSION['updateError'] = "<div class='updateError'>Nurse! $name already exist</div>";
            } else {
                if (updatePatientData($id) === TRUE) {
                    $_SESSION['updateSuccess'] = "<div class='profileSuccess'>Successfull updated patient data</div>";
                } else {
                    $_SESSION['updateError'] = "<div class='updateError'>Error while updating data</div>";
                }
            }
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        if (deletePatientAccount($id) === TRUE) { // delete Patient account
            echo "<script>window.location.href='administrator_patient.php'</script>";
        } else {
            echo "<script>alert('deleteing data fail. try again')</script>";
        }
    }

?>

<!DOCTYPE Html>
<Html lang="en">
<head>    
     <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Online Advance Management Software. This Software is Expert and manage all Clinic and more..?">
		<meta name="author" content="Schneider Michael">
    <title>Manage Patient | myBlogsite Hospital</title>
    
    <?php include('includes/adminoverall-header.php'); ?>

    <link rel="stylesheet" href="css/style/administrator/allstyle.css">    
    


</head>
    <style>
    </style>

<body>

    <header>
        <?php include('includes/header/admin-header.php'); ?>
    </header>
<br>
    <div id="container" class="container">
        <div class="sidebar">
            <ul id="nav" class="nav sidebar-nav">
                <li class="myBlogsiteDashboard_profile">
                    <?php
                        if ($admindata['profile'] == "") {
                            echo "<span class='dashboardProfileDefault'><img width='53' height='53' id='defaultProfile' src='uploads/default.png' alt='Default Profile'></span>";
                        } else {
                            echo "<span class='dashboardProfileDefault'><img width='53' height='53' id='defaultProfile' src='uploads/".$admindata['profile']."' alt='Upload Profile'></span>";
                        }
                        
                        echo "<span>".$admindata['name']."</span>";
                    ?>
                </li>
                <li>
                    <a href="administrator_home.php">
                       <i class="fa fa-desktop fa-2x"></i> 
                       <span> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="administrator_department.php">
                        <i class="fa fa-sitemap fa-2x"></i> 
                        <span> Department</span>
                    </a>
                </li>
                <li>
                    <a href="administrator_doctor.php">
                       <i class="fa fa-user-md fa-2x"></i> 
                       <span> Doctor</span>
                    </a>
                </li> 
                <li>
                    <a href="administrator_nurse.php">
                       <i class="fa fa-plus-square fa-2x"></i> 
                       <span> Nurse</span>
                    </a>
                </li>
                <li class="active">
                    <a href="administrator_patient.php">
                       <i class="fa fa-user fa-2x"></i> 
                       <span> Patient</span>
                    </a>
                </li>
                <li>
                    <a href="administrator_pharmacist.php">
                       <i class="fa fa-medkit fa-2x"></i> 
                       <span> Pharmacist</span>
                    </a>
                </li>
                <li>
                    <a href="administrator_laboratory.php">
                       <i class="fa fa-flask fa-2x"></i> 
                       <span> Laboratorist</span>
                    </a>
                </li>
                <li>
                    <a href="administrator_accountant.php">
                       <i class="fa fa-money fa-2x"></i> 
                       <span> Accountant</span>
                    </a>
                </li>
                <li>
                    <a href="administrator_guard.php">
                       <i class="fa fa-reddit-alien fa-2x"></i> 
                       <span> Guard</span>
                    </a>
                </li>
                <li>
                    <a href="administrator_careTaker.php">
                       <i class="fa fa-google-wallet fa-2x"></i> 
                       <span> CareTaker</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                       <i class="fa fa-crosshairs fa-2x"></i> 
                       <span>Manage Hospital <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewAppointment.php">
                                <i class="fa fa-exchange"></i> View Appointments
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewPayment.php">
                               <i class="fa fa-credit-card"></i> View Payment
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewMedicine.php">
                                <i class="fa fa-medkit"></i> View Medicine
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewBedStatus.php">
                                <i class="fa fa-hdd-o"></i> View Bed Status
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewBloodBank.php">
                                <i class="fa fa-fire"></i> View Blood Bank
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewOperation.php">
                                <i class="fa fa-bars"></i> View Operation
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewBirthReport.php">
                                <i class="fa fa-reddit-alien"></i>View Birth Report
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="administrator_viewDeathReport.php">
                                <i class="fa fa-minus-circle"></i>View Death Report
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                       <i class="fa fa-gear fa-2x"></i> 
                       <span> Settings <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="administrator_manageNoticBoard.php">
                           <i class="fa fa-columns"></i> Manage Noticboard
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="administrator_systemSetting.php">
                           <i class="fa fa-h-square"></i> System Setting
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="administrator_profile.php">
                            <i class="fa fa-globe"></i> Profile
                        </a></li>
                    </ul>
                </li> 
            </ul>
        </div>
    </div>

    <!-- second navbar -->
    <div id="second-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form>
                        <div class="form-group page-header">
                            <h3> <i class="fa fa-info-circle"></i> Manage Patient</h3>
                        </div>
                    </form><!-- end form -->
                </div>
            </div><!-- end row -->
        </div>
    </div><!-- end second-navbar -->
<br>
    <div class="container" id="PageContainer">
        <div class="departmentlistTable col-lg-8 col-lg-offset-2">
            <ul class="nav nav-tabs">
               <li class="active departmentTab" data-toggle="tab" data-target="#departmentList"><a href="#"><i class="fa fa-reorder"></i> Patient List</a></li>
               <li class="departmentTab" data-toggle="tab" data-target="#departmentAdd"><a href="#"><i class="fa fa-plus"></i> Add Patient</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active fade in" id="departmentList">
                    <!-- Displaying Error Here -->
                    <div class="displayError">
                        <?php if (isset($_SESSION['updateSuccess'])):?>
                            <span class='closebtn' onclick='this.parentElement.style.display="none";'>&times;</span>
                            <p>
                                <?php
                                   echo $_SESSION['updateSuccess'];
                                   unset($_SESSION['updateSuccess']);
                                ?>
                                 <?php
                                   echo $_SESSION['updateError'];
                                   unset($_SESSION['updateError']);
                                ?>
                            </p>
                        <?php endif ?>
                    </div>
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> <i class="fa fa-hashtag"></i> </th>
                                <th>Patient Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Phone</th>
                                <th>Blood Group</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th> <i class="fa fa-hashtag"></i> </th>
                                <th>Patient Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Phone</th>
                                <th>Blood Group</th>
                                <th>Action</th>
                            </tr>
                       </tfoot>
                    </table>

                    <!-- create modal dialog detail info for edit on button  cell click -->
                    <div class="modal fade" id="myModalEdit" role="dialog">
                        <div class="modal-dialog">
                            <div id="content-data">
                                
                            </div><!-- end content-data -->
                        </div><!-- end-modal-dialog -->
                    </div>
                    
                </div><!-- end tab pane for Department List  -->

                <div class="tab-pane fade" id="departmentAdd">
                    <div class="departmentForm">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="patient-name" class="control-label col-lg-4">Patient Name</label>
                                <div class="col-lg-6">
                                   <input type="text" class="form-control" name="name">
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-email" class="control-label col-lg-4">Email</label>
                                <div class="col-lg-6">
                                   <input type="text" class="form-control" name="email">
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-password" class="control-label col-lg-4">Password</label>
                                <div class="col-lg-6">
                                   <input type="password" class="form-control" name="password">
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-address" class="control-label col-lg-4">Address</label>
                                <div class="col-lg-6">
                                   <input type="text" class="form-control" name="address">
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-phone" class="control-label col-lg-4">Phone</label>
                                <div class="col-lg-6">
                                   <input type="text" class="form-control" size=20 maxlength=10 onkeypress='return isNumberKey(event)' name="phone">
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-sex" class="control-label col-lg-4">Sex</label>
                                <div class="col-lg-6">
                                    <select name="sex" class="form-control" id="">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Both">Both</option>
                                    </select>
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-birthDate" class="control-label col-lg-4">Birth Date</label>
                                <div class="col-lg-6">
                                   <input type="date" class="form-control" name="birth_date">
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-birthDate" class="control-label col-lg-4">Age</label>
                                <div class="col-lg-6">
                                   <input type="text" class="form-control" size=20 maxlength=3 onkeypress='return isNumberKey(event)' name="age">
                                </div>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="patient-birthDate" class="control-label col-lg-4">Blood Group</label>
                                <div class="col-lg-6">
                                    <select name="blood_group" class="form-control" id="">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div><!-- end form-group -->
                            <br>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-4">
                                   <button type="submit" name="addPatient" class="btn btn-info">Add Patient</button>
                                </div>
                            </div><!-- end form-group -->
                        </form>
                    </div>
                </div><!--  end tab pane for Add department  -->
            </div>
        </div>
    </div><!-- end container -->
    
    
    <div class="contaienr"></div>

    <!-- Footer -->
    <footer>
        <form class="AdminFooter">
            <?php include('includes/footer/footer.php'); ?>
        </form>
    </footer>

    <script>
        $(document).ready(function() {
            var dataTable = $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url:"core/administrator_data/patientFetch.php",
                    type:"post"
                }
            });
        });

        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <!--  Script for getEdit data  -->
    <script> 
        $(document).on('click', '#getEdit', function(e) {
            e.preventDefault();
            var per_id=$(this).data('id');
            $('#content-data').html('');
            $.ajax({
                url: 'core/administrator_data/editPatinet.php',
                type: 'POST',
                data: 'id='+per_id,
                dataType: 'html'
            }).done(function(data) {
                $('#content-data').html('');
                $('#content-data').html(data);
            }).fial(function() {
                $('#content-data').html('<p>Error</p>');
            });
        });
    </script>
	
	
	<!-- script src="js/main/bootstrap.js"></script -->
    
</body>
</Html>

