<!-- [ Session ] start -->
<?php include 'process/dbh.php';?>
    <?php include("process/session.php") ?>
<!-- [ Session ] end -->
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
                                                <li class="breadcrumb-item"><a href="add-royalty.php">Add Royalty</a></li>
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
                                            <h5>Add Royalty</h5>
                                            <div class="text-right m-3">
                                            <!--  <button onclick="window.location='viewroyalty.php';" type="button" class="btn btn-sm btn-primary">View Royalty</button> -->
                                        </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <!--  <form action="process/assignnewproject.php" method="POST" enctype="multipart/form-data"> -->
                                                        
                                        
                                                    <form method="POST" action="process/addroyalty.php">
                                                       
                                                        <div class="form-group col-md-12">
                                                            <label>Store Name</label>
                                                            <select type="text" class="form-control" id="txtselcat" name="txtselcat" placeholder="Select Store Name" required>

                                                     
                                                                <option disabled>Default</option>
                                                                <?php
                                                    $res=mysqli_query($conn,"select * from tbl_users where u_role='Store'");
                                                    while($row=mysqli_fetch_assoc($res))    
                                                    { ?>
                                                                <option value="<?php echo $row["u_id"]; ?>"><?php echo $row["u_name"]; ?></option>
                                                     <?php } ?>
                                                            </select>
                                                        </div>
                                                         
                                                        <div class="form-group col-md-12">
                                                            <label>Royalty Month</label>
                                                            <input type="month" class="form-control" id="txtmonth" name="txtmonth" placeholder="Select Royalty Month" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>From Date</label>
                                                            <input type="date" class="form-control" id="txtdat" name="txtdat" placeholder="Select Date" required>
                                                        </div>
                                                         <div class="form-group col-md-12">
                                                            <label>Due Date</label>
                                                            <input type="date" class="form-control" id="txtdate" name="txtdate" placeholder="Select Date" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Amount</label>
                                                            <input type="number" class="form-control" id="txamount" name="txamount" placeholder="Enter Royalty Amount" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Status</label>
                                                            <select type="text" class="form-control" id="txpaid" name="txpaid" placeholder="Select Amount Stuts" required>
                                                                <option disabled>Default</option>
                                                                <option>Unpaid</option>
                                                                <option>Paid</option>

                                                            </select>
                                                        </div>
                                                       
                                                        <div class="form-group col-md-12">
                                                             <button id="btnadd" type="submit" name="btnadd" class="btn btn-primary">Submit</button>
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

    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

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
