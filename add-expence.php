<!-- [ Session ] start -->
    <?php include("process/session.php") ?>
<!-- [ Session ] end -->
    <?php include("process/dbh.php") ?>
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
                                                <li class="breadcrumb-item"><a href="add-expence.php">Add Expense</a></li>
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
                                            <h5>Add Expense</h5>
                                            <div class="text-right m-3">
                                            <!-- <button onclick="window.location='Addcategory.php';" type="button" class="btn btn-sm btn-primary">View Category</button> -->
                                        </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <!--  <form action="process/assignnewproject.php" method="POST" enctype="multipart/form-data"> -->
                                                      
                                                <form method="POST" action="process/expence.php" enctype="multipart/form-data">
                                                        <div class="form-group col-md-12">
                                                            <label>Category Name</label>
                                                            <select type="text" class="form-control" id="selcat" name="selcat" placeholder="Select Category" required>

                                                     
                                                                <option disabled>Default</option>
                                                                <?php
                                                                $res=mysqli_query($conn,"select * from tbl_category");
                                                                while($row=mysqli_fetch_assoc($res))    
                                                                { ?>
                                                                <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                         <div class="form-group col-md-12">
                                                            <label>Date</label>
                                                            <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="txtdat" name="txtdat" placeholder="Select Date" required>
                                                        </div>
                                                         <div class="form-group col-md-12">
                                                            <label>Amount</label>
                                                            <input type="number" class="form-control" id="amnub" name="amnub" placeholder="Expense Amount" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="txtphoto">Image</label>
                                                             <input type="file" class="form-control" id="txtphoto" name="txtphoto">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Note</label>
                                                            <textarea type="text"  class="form-control" id="notname" name="notname" placeholder="Note" required></textarea>
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
