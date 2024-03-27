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
                                                <li class="breadcrumb-item"><a href="#!">Pay Advance</a></li>
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
                                            <h5>Pay Advance</h5>
                                            <div class="text-right m-3">
                                            <!-- <button onclick="window.location='Addcategory.php';" type="button" class="btn btn-sm btn-primary">View Category</button> -->
                                        </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                <form method="POST" action="process/addadvance.php" enctype="multipart/form-data">
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Staff Name</label>
                                                                    <select class="form-control" id="sel_depart" name="sel_depart">
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
                                                                <div class="form-group col-md-6">
                                                                    <label>Advance Date</label>
                                                                    <input type="date" class="form-control" id="advdate" name="advdate" placeholder="Advance date" max="<?= date('Y-m-d'); ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="display">
                                                                <div class="form-group col-md-6">
                                                                    <label>Amount</label>
                                                                    <input type="text" class="form-control" id="advamount" name="advamount" placeholder="Advance Amount" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Description</label>
                                                                    <input type="text" class="form-control" id="advdescription" name="advdescription" placeholder="Advance Detail" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                             <button id="btnadd" type="submit" name="btnadd" class="btn btn-primary">PAY</button>
                                                        </div>
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
