<!-- [ Session ] start -->
    <?php include ('process/dbh.php');?>
    <?php include ('process/session.php'); 
        error_reporting(0);
    ?>
    
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
                                                <li class="breadcrumb-item"><a href="add-sale.php">Add Sale</a></li>
                                                
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
                                            <h5>Add Sale</h5>
                                            <hr> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="process/addsale.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Party Name</label>
                                                            <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter Your Name" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email-Id</label>
                                                            <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter Valid Email-Id" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Contact No.</label>
                                                            <input type="number" class="form-control" id="contactno" name="contactno" placeholder="Enter Your Contact No" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Your City" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>LOI Amount</label>
                                                            <input type="number" class="form-control" id="loiamount" name="loiamount" placeholder="Enter LOI Amount">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Mode Of Payment</label>
                                                            <select class="form-control" id="mpayment" name="mpayment" required>
                                                                <option disabled="disabled" selected="selected">Default...</option>
                                                                <option value="Cash Payment">Cash Payment</option>
                                                                <!-- <option value="Sub Admin">Sub Admin</option> -->
                                                                <option value="Net Banking">Net Banking</option>
                                                                <option value="Gpay">Gpay</option>   
                                                                <option value="Paytm">Paytm</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Date of LOI</label>
                                                            <input type="Date" class="form-control" id="loidate" name="loidate" placeholder="LOIDate">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Proof of Payment</label>
                                                            <input type="file" class="form-control" id="txtphoto" name="txtphoto">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" name="btnadd" id="btnadd" class="btn btn-primary">Submit</button>
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