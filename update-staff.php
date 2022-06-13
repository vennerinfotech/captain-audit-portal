<!-- [ Session ] start -->
<?php include 'process/dbh.php'; ?>
    <?php include("session.php") ?>
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
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="view-staff.php">View Staff</a></li>
                                                <li class="breadcrumb-item"><a href="update-staff.php">Update Staff</a></li>
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
                                           <!-- <h5>Basic Componant</h5> -->
                                        </div>
                                        <div class="card-body">
                                            <h5>Update Staff</h5>
                                            <div class="text-right m-3">
                                             <button onclick="window.location='view-staff.php';" type="button" class="btn btn-sm btn-primary">View Staff</button>
                                         </div>
                                            <hr>

                                           
                                            <div class="row">
                                               <div class="col-md-12">



                                                  
                                         <?php
                            if(isset($_GET["edit"]))
                            {
                               $res=mysqli_query($conn,"select * from tbl_staff where ustaff_id='".$_GET["edit"]."'");     
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    ?>

                                                    <form method="POST" action="process/updatestaff.php?edit=<?php echo $_GET["edit"]; ?>">
                                                <input type="hidden" name="hfadminid" value="<?php echo $row["ustaff_id"]; ?>">
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleInputPassword1">Staff Name</label>
                                                            <input type="text" class="form-control" name="username1" id="username1" placeholder="Enter name"  value="<?php echo $row["staffame"]; ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleInputPassword1">Address</label>
                                                            <input type="text" class="form-control" name="txtadd" id="txtadd" placeholder="Enter AddressLine"  value="<?php echo $row["staff_address"]; ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="row">

                                                        <div class="form-group col-md-6">
                                                            <label>Email address</label>
                                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email"  value="<?php echo $row["email_id"]; ?>">

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputPassword1">Contact</label>
                                                            <input type="number" class="form-control" name="txtcon" name="username" id="txtcon" placeholder="Enter Phone Number"  value="<?php echo $row["contact"]; ?>">
                                                        </div>
                                                    </div>
                                                        </div>
                                                     
                                                                 <button id="btnupdate" type="submit" name="btnupdate" class="btn btn-primary">Submit</button>
                                                        
                                                    </form>
                                                
                                                 <?php  }
        
                                        }

                                     ?>       
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
