<!-- [ Session ] start -->
   <?php include 'session.php';?>
    <?php include('process/dbh.php') ?>
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
                                                <!-- <h5 class="m-b-10">Form Elements</h5> -->
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="emp-projectassign.php">Assign Task</a></li>
                                                <li class="breadcrumb-item"><a href="#">Proof</a></li>
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
                                            <h5>Add Proof</h5>
                                            <div class="text-right m-3">
                                             <!-- <button onclick="window.location='viewentery.php';" type="button" class="btn btn-sm btn-primary">View Entry</button> -->
                                        </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" action="process/updateassignproject.php" enctype="multipart/form-data">
		                                                    <div class="form-group form-check">
		                                                        <input type="hidden"  name="id" value="<?php echo $_GET['pid']; ?>" id="txte1">
		                                                        <input type="radio"  name="proof" value="Without" id="txte1">
		                                                        <label for="txte1" class="form-radio-label">Without Image
		                                                        </label>&nbsp; &nbsp;
		                                                             
		                                                        <input type="radio" checked name="proof" value="With">
		                                                        <label for="txte2" class="form-radio-label">With Image
		                                                        </label>&nbsp; &nbsp;
		                                                    </div>
		                                                    <div class="form-group col-md-12">
	                                                            <label for="txtphoto">Image</label>
				                                                <input type="file" class="form-control" id="txtphoto" name="txtphoto" placeholder="Upload Image">
				                                            </div>

                                                        <div class="form-group col-md-12">
                                                        <button type="submit" name="btnadd" id="btnadd" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                              
    <!-- Warning Section Ends -->

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
