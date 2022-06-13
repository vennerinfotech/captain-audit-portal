<!-- [ Session ] start -->
<?php 
    include 'session.php';
    include('process/dbh.php');

    if($_SESSION['role'] == "staff")
    {
        $result=mysqli_query($conn,"SELECT storestaff_id FROM `tbl_ststaffattendence` where store_id = '".$_SESSION['id']."' and staff_id = '".$_SESSION['staffid']."' and DATE(cdate) = date(NOW())") or die(mysqli_error($conn));
        $row=mysqli_fetch_row($result);
    }
    else
    {
        $result=mysqli_query($conn,"SELECT day_id FROM `tbl_dayselfi` where u_id = '".$_SESSION['id']."' and DATE(cdate) = date(NOW())") or die(mysqli_error($conn));
        $row=mysqli_fetch_row($result);
    }
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
                                                <h5 class="m-b-10"></h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Attendance Management</a></li>
                                                <li class="breadcrumb-item"><a href="out-attandence.php">Out Attendance</a></li>
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
                                        <div class="card-header">
                                            <!-- <h5>Complain / Suggestion / Query</h5> -->
                                        </div>
                                        <div class="card-body">
                                            <h5>Out Attendance</h5>
                                            <div class="text-right m-3">
                                                <button onclick="window.location='view-attandence.php';" type="button" class="btn btn-sm btn-primary">View Entry <?php echo $row[0]; ?></button>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" action="process/outatten.php?edit=<?php echo $row[0]; ?>" enctype="multipart/form-data">
                                                        <div class="form-group col-md-12">
                                                            <div class="form-group col-md-6">
                                                               <div id="my_camera"></div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div id="results"></div>
                                                            </div>
                                                            <input type="hidden" name="image" class="image-tag">
                                                            <label id="attend" style="color: green;"></label>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <input type="button" class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                                                            <button class="btn btn-success">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                              
<!-- Warning Section Ends -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 200,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<!-- Required Js -->
<?php include("process/script.php") ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include("footer.php") ?>

</body>

</html>