<?php

require_once ('process/dbh.php');
error_reporting(0);
$uid=$_GET["id"];
$sql = "SELECT * from `tbl_users` where u_id='$uid'";

$result = mysqli_query($conn, $sql);
$item=mysqli_fetch_assoc($result);

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
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="process/updateuser.php?id=<?php echo $_GET["id"]; ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>User/Store</label>
                                                            <input type="text" class="form-control" id="Username" name="username" placeholder="Enter User Name" value="<?php echo $item["u_name"]; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Address</label>
                                                            <textarea class="form-control" id="Useraddress" name="useraddress" placeholder="Enter User/Store Address" rows="3" value="<?php echo $item["u_address"]; ?>" required><?php echo $item["u_address"]; ?></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email address</label>
                                                            <input type="email" class="form-control" id="Useremail" name="useremail" placeholder="Enter Valid Email" value="<?php echo $item["u_email"]; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6" >
                                                            <label>Password</label>
                                                            <input type="text" class="form-control" id="Userpassword" name="userpassword" placeholder="Enter User Password" value="<?php echo $item["u_password"]; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Gender</label>
                                                            <select class="form-control" id="Usergender" name="usergender" required>
                                                                <option disabled="disabled" selected="selected">Default</option>
                                                                <option value="Male" <?php if($item["u_gender"]=='Male') echo 'selected'?>>Male</option>
                                                                <option value="Female" <?php if($item["u_gender"]=='Female') echo 'selected'?>>Female</option>
                                                                <option value="Other" <?php if($item["u_gender"]=='Other') echo 'selected'?>>Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Birth Date</label>
                                                            <input type="Date" class="form-control" id="Userbirtdate" name="userbirtdate" placeholder="BirthDate" value="<?php echo $item["u_birthday"]; ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Contact No.</label>
                                                            <input type="number" class="form-control" id="Usercontactno" name="usercontactno" placeholder="Enter User Contact No" value="<?php echo $item["u_contact"]; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Store Contact No.</label>
                                                            <input type="number" class="form-control" id="officecontactno" name="officecontactno" placeholder="Enter Store Contact No" value="<?php echo $item["u_officeno"]; ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>User Role</label>
                                                            <select class="form-control" id="Userrole" name="userrole" required>
                                                                <option disabled="disabled" selected="selected">Default</option>
                                                                <option value="Admin" <?php if($item["u_role"]=='Admin') echo 'selected'?>>Admin</option>
                                                                <option value="Employee" <?php if($item["u_role"]=='Employee') echo 'selected'?>>Employee</option>
                                                                <option value="Sub Employee" <?php if($item["u_role"]=='Sub Employee') echo 'selected'?>>Sub Employee</option>
                                                                <option value="Store" <?php if($item["u_role"]=='Store') echo 'selected'?>>Store</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Salary</label>
                                                            <input type="number" class="form-control" id="Usersalary" name="usersalary" placeholder="Enter User Salary" value="<?php echo $item["u_salary"]; ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control" id="File" name="file" placeholder="Upload User Image" value="<?php echo $item["u_pic"]; ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Joining/Opening Date</label>
                                                            <input type="Date" class="form-control" id="joindate" name="joindate" placeholder="Enter Joining Date" value="<?php echo $item["u_joindate"]; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" name="" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
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
    <?php if(isset($_SESSION['status']) && $_SESSION['status'] != ''){?>
    <script>
        swal({
          /*title: "Good job!",*/
          text: "<?php echo $_SESSION['status'];?>",
          icon: "<?php echo $_SESSION['status_code'];?>",
          button: "Ok",
        });
    </script>
    <?php
    unset($_SESSION['status'],$_SESSION['status_code']);
}?>
<?php include("footer.php") ?>
</body>
</html>