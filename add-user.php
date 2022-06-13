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
                                                <li class="breadcrumb-item"><a href="add-user.php">Add Users</a></li>
                                                
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
                                            <h5>Add Users</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>User/Store</label>
                                                            <input type="text" class="form-control" id="Username" name="username" placeholder="Enter User Name" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Address</label>
                                                            <textarea class="form-control" id="Useraddress" name="useraddress" placeholder="Enter User/Store Address" rows="3" required></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email address</label>
                                                            <input type="email" class="form-control" id="Useremail" name="useremail" placeholder="Enter Valid Email" required>
                                                        </div>
                                                        <div class="form-group col-md-6" >
                                                            <label>Password</label>
                                                            <input type="text" class="form-control" id="Userpassword" name="userpassword" placeholder="Enter User Password" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Gender</label>
                                                            <select class="form-control" id="Usergender" name="usergender" required>
                                                                <option disabled="disabled" selected="selected">Default...</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Birth Date</label>
                                                            <input type="Date" class="form-control" id="Userbirtdate" name="userbirtdate" placeholder="BirthDate">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Contact No.</label>
                                                            <input type="number" class="form-control" id="Usercontactno" name="usercontactno" placeholder="Enter User Contact No" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Store Contact No.</label>
                                                            <input type="number" class="form-control" id="officecontactno" name="officecontactno" placeholder="Enter Store Contact No">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>User Role</label>
                                                            <select class="form-control" id="Userrole" name="userrole" required>
                                                                <option disabled="disabled" selected="selected">Default...</option>
                                                                <option value="Admin">Admin</option>
                                                                <!-- <option value="Sub Admin">Sub Admin</option> -->
                                                                <option value="Employee">Employee</option>
                                                                <option value="Sub Employee">Sub Employee</option>   
                                                                <option value="Store">Store</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Salary</label>
                                                            <input type="number" class="form-control" id="Usersalary" name="usersalary" placeholder="Enter User Salary">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control" id="File" name="file" placeholder="Upload User Image">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Joining/Opening Date</label>
                                                            <input type="Date" class="form-control" id="joindate" name="joindate" placeholder="Enter Joining Date" required>
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