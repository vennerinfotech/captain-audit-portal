<?php

require_once('process/dbh.php');

$userid = $_GET["id"];

$sql = "SELECT * From `tbl_users` where `u_id` = '$userid'";
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);

$name = ($item['u_name'] != "") ? $item['u_name'] : "";
$address = ($item['u_address'] != "") ? addslashes($item['u_address']) : "";
$email = ($item['u_email'] != "") ? addslashes($item['u_email']) : "";
$password = ($item['u_password'] != "") ? addslashes($item['u_password']) : "";
$gender = ($item['u_gender'] != "") ? addslashes($item['u_gender']) : "";
$outlet = ($item['u_outletid'] != "") ? addslashes($item['u_outletid']) : "";
$birthday = ($item['u_birthday'] != "") ? addslashes($item['u_birthday']) : "";
$contact = ($item['u_contact'] != "") ? addslashes($item['u_contact']) : "";
$userresponsibility = ($item['u_responsibility'] != "") ? addslashes($item['u_responsibility']) : "";
$primeobjectives = ($item['u_primeobjectives'] != "") ? addslashes($item['u_primeobjectives']) : "";
$officeno = ($item['u_officeno'] != "") ? addslashes($item['u_officeno']) : "";
$role = ($item['u_role'] != "") ? addslashes($item['u_role']) : "";
$routinetask = ($item['u_routinetask'] != "") ? addslashes($item['u_routinetask']) : "";
$assignedoutlets = ($item['u_assignedoutlets'] != null) ? $item['u_assignedoutlets'] : [];
$salary = ($item['u_salary'] != "") ? addslashes($item['u_salary']) : "";
$joindate = ($item['u_joindate'] != "") ? addslashes($item['u_joindate']) : "";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Captain Audit Portal</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Captain Audit Portal is specially designed for management of any brand easily. Here you can track all processes of your business. Captain Audit Portal is product of THE BRAND LANDMARK" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="The Brand Landmark" />

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/webl.png" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <?php include("navbar.php") ?>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <?php include("header.php") ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="add-user.php">Edit
                                                        Users</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Edit Users</h5>
                                            <hr>
                                            <form action="process/updateuser.php?id=<?php echo $_GET["id"]; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label>User/Store</label>
                                                                <input type="text" class="form-control" id="Username" name="username" placeholder="Enter User Name" value="<?= $name ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Address</label>
                                                                <textarea class="form-control" id="Useraddress" name="useraddress" placeholder="Enter User/Store Address" rows="3" value="<?= $address ?>" required><?= $address ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Email address</label>
                                                                <input type="email" class="form-control" id="Useremail" name="useremail" placeholder="Enter Valid Email" value="<?= $email ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Password</label>
                                                                <input type="text" class="form-control" id="Userpassword" name="userpassword" placeholder="Enter User Password" value="<?= $password ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Gender</label>
                                                                <select class="form-control" id="Usergender" name="usergender" required>
                                                                    <option disabled selected value="">Select Gender</option>
                                                                    <option value="Male" <?php if ($gender == 'Male') echo 'selected' ?>>Male</option>
                                                                    <option value="Female" <?php if ($gender == 'Female') echo 'selected' ?>>Female</option>
                                                                    <option value="Other" <?php if ($gender == 'Other') echo 'selected' ?>>Other</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Outlet Name</label>
                                                                <select class="form-control" id="Useroutlet" name="useroutlet" required>
                                                                    <option disabled selected value="">Select outlet for pos</option>
                                                                    <?php
                                                                    $resultoutlet = mysqli_query($connpos, "SELECT `id`, `outlet_name` FROM `tbl_outlets` WHERE `del_status` = 'Live'") or die(mysqli_error($connpos));
                                                                    while ($rowoutlet = mysqli_fetch_assoc($resultoutlet)) { ?>
                                                                        <option value="<?= $rowoutlet['id']; ?>" <?php if ($rowoutlet['id'] == $outlet) echo 'selected' ?>><?= $rowoutlet['outlet_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Birth Date</label>
                                                                <input type="Date" class="form-control" id="Userbirtdate" name="userbirtdate" placeholder="BirthDate" value="<?= $birthday ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Contact No.</label>
                                                                <input type="number" class="form-control" id="Usercontactno" name="usercontactno" placeholder="Enter User Contact No" value="<?= $contact ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Store Contact No.</label>
                                                                <input type="number" class="form-control" id="officecontactno" name="officecontactno" placeholder="Enter Store Contact No" value="<?= $officeno ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>User Role</label>
                                                                <select class="form-control" id="Userrole" name="userrole" required>
                                                                    <option disabled value="" selected>Select role</option>
																	<?php if($_SESSION['role'] != "Employee" ){ ?>
                                                                    <option value="Admin" <?php if ($item["u_role"] == 'Admin') echo 'selected' ?>>Super Admin</option>
                                                                    <option value="Company" <?php if ($item["u_role"] == 'Company') echo 'selected' ?>>Comapny</option>
                                                                    <option value="Headmanagement" <?php if ($item["u_role"] == 'Headmanagement') echo 'selected' ?>>Head Management</option>
                                                                    <option value="Employee" <?php if ($item["u_role"] == 'Employee') echo 'selected' ?>>Employee</option>
                                                                    <option value="Storemanager" <?php if ($item["u_role"] == 'Storemanager') echo 'selected' ?>>Store Manager</option>
                                                                    <option value="Marketingteam" <?php if ($item["u_role"] == 'Marketingteam') echo 'selected' ?>>Marketing Team</option>
                                                                    <option value="Inventorymanager" <?php if ($item["u_role"] == 'Inventorymanager') echo 'selected' ?>>Inventory Manager</option>
                                                                    <option value="Staff" <?php if ($item["u_role"] == 'Staff') echo 'selected' ?>>Staff</option>
                                                                    <option value="Branchowner" <?php if ($item["u_role"] == 'Branchowner') echo 'selected' ?>>Branch Owner</option>
                                                                    <option value="Hr" <?php if ($item["u_role"] == 'Hr') echo 'selected' ?>>HR</option>
                                                                    <option value="Salesteam" <?php if ($item["u_role"] == 'Salesteam') echo 'selected' ?>>Sales Team</option>
																	<?php }else{ ?>
																	<option value="Staff" <?php if ($item["u_role"] == 'Staff') echo 'selected' ?>>Staff</option>
                                                                    <option value="Branchowner" <?php if ($item["u_role"] == 'Branchowner') echo 'selected' ?>>Branch Owner</option>
																	<?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Salary</label>
                                                                <input type="number" class="form-control" id="Usersalary" name="usersalary" placeholder="Enter User Salary" value="<?= $salary; ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Image</label>
                                                                <input type="file" class="form-control" id="File" name="file" placeholder="Upload User Image" value="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Joining/Opening Date</label>
                                                                <input type="Date" class="form-control" id="joindate" name="joindate" placeholder="Enter Joining Date" value="<?= $joindate ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Prime Objectives</label>
                                                                <textarea class="form-control" id="primeobjectives" name="primeobjectives" placeholder="Enter User Prime Objectives" rows="3" required><?= $primeobjectives ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Routine Task ( Add Multiple task with '|' )</label>
                                                                <textarea class="form-control" id="routinetask" name="routinetask" placeholder="Enter Routine Tasks" rows="3" required onkeydown="return (event.keyCode!=13);"><?php
                                                                                                                                                                                                                                $routinetaskjson = array();
                                                                                                                                                                                                                                $routinetaskjson = json_decode($item["u_routinetask"], true);
                                                                                                                                                                                                                                echo implode("|", $routinetaskjson);
                                                                                                                                                                                                                                ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Responsibility</label>
                                                                <textarea class="form-control" id="UserResponsibility" name="userresponsibility" placeholder="Enter User Responsibility" rows="3" required><?php echo $item["u_responsibility"]; ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <button type="submit" name="" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php
                                                        $alloutlets = array();
                                                        $alloutlets = json_decode($assignedoutlets, true);
                                                        $resultoutlet = mysqli_query($conn, "SELECT u_id, u_name FROM tbl_users WHERE `u_role`= 'Branchowner'") or die(mysqli_error($conn));
                                                        while ($rowoutlet = mysqli_fetch_assoc($resultoutlet)) { ?>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="assignedoutlets[]" id="inlineCheckbox<?= $rowoutlet['u_id']; ?>" value="<?= $rowoutlet['u_id']; ?>" <?php if($alloutlets != null) { if(in_array($rowoutlet['u_id'], $alloutlets)) {  echo 'checked'; }  echo ""; } ?>>
                                                                <label class="form-check-label" for="inlineCheckbox<?= $rowoutlet['u_id']; ?>"><?= $rowoutlet['u_name']; ?></label>
                                                            </div>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ form-element ] end -->
                                <!-- [ Main Content ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
        <script>
            swal({
                /*title: "Good job!",*/
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok",
            });
        </script>
    <?php
        unset($_SESSION['status'], $_SESSION['status_code']);
    } ?>
    <?php include("footer.php") ?>
</body>

</html>