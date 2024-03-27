<!-- [ Session ] start -->
<?php 
    include("process/session.php"); 
    include("process/dbh.php");
    
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
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="add-salary.php">Add Lead</a></li>
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
                                            <h5>Add Lead</h5>
                                            <div class="text-right m-3">
                                            <!-- <button onclick="window.location='Addcategory.php';" type="button" class="btn btn-sm btn-primary">View Category</button> -->
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" action="process/addlead.php" enctype="multipart/form-data">
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Status</label>
                                                                    <select class="form-control" id="status" name="status">
                                                                        <option default value="0">- Select -</option>
                                                                        <option value="Interested for Meeting">Interested for Meeting</option>
                                                                        <option value="Follow up in a Day">Follow up in a Day</option>
                                                                        <option value="New">New</option>
                                                                        <option value="Meeting Done">Meeting Done</option>
                                                                        <option value="Follow up in 2 days">Follow up in 2 days</option>
                                                                        <option value="Contacted">Contacted</option>
                                                                        <option value="On Hold">On Hold</option>
                                                                        <option value="Not Interested">Not Interested</option>
                                                                        <option value="Follow up in a week">Follow up in a week</option>
                                                                        <option value="Already Followed by Team">Already Followed by Team</option>
                                                                        <option value="Not Picking Up Call">Not Picking Up Call</option>
                                                                        <option value="Customer">Customer</option>
                                                                        <option value="Message Done">Message Done</option>
                                                                        <option value="Follow up next month">Follow up next month</option>
                                                                        <option value="Friend Refference">Friend Refference</option>
                                                                        <option value="Intrested">Intrested</option>
                                                                        <option value="Unreachable Contact">Unreachable Contact</option>
																		<option value="Disqualified">Disqualified</option>
																		<option value="Budget Issue">Budget Issue</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Source</label>
                                                                    <select class="form-control" id="source" name="source">
                                                                        <option default value="0">- Select -</option>
                                                                        <option value="Customer Refernce">Customer Refernce</option>
                                                                        <option value="Direct Call">Direct Call</option>
                                                                        <option value="Direct Meeting @ Store">Direct Meeting @ Store</option>
                                                                        <option value="Direct Message">Direct Message</option>
                                                                        <option value="Facebook">Facebook</option>
                                                                        <option value="Franchise India">Franchise India</option>
                                                                        <option value="Friend Refference">Friend Refference</option>
                                                                        <option value="Google">Google</option>
                                                                        <option value="Instagram">Instagram</option>
                                                                        <option value="Other">Other</option>
                                                                        <option value="Owner Reference">Owner Reference</option>
                                                                        <option value="Website">Website</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Assigned</label>
                                                                    <select class="form-control" id="assigned" name="assigned">
                                                                        <option default value="0">- Select -</option>
                                                                        <?php
                                                                            $sql_department = "SELECT * FROM tbl_users where u_role !='Store'";
                                                                            $department_data = mysqli_query($conn,$sql_department);
                                                                            while($row = mysqli_fetch_assoc($department_data) ){
                                                                                $departid = $row['u_id'];
                                                                                $depart_name = $row['u_name'];
                                                                                echo "<option value='".$departid."' >".$depart_name."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="display">
                                                                <div class="form-group col-md-4">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>City</label>
                                                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Phone No.</label>
                                                                    <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="Enter Phone Number"  required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Address</label>
                                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" >
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Description</label>
                                                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                             <button id="btnadd" type="submit" name="btnadd" class="btn btn-primary">Submit</button>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
