<!-- [ Session ] start -->
    <?php include("session.php") ?>
<!-- [ Session ] end -->

<?php
    require_once ('process/dbh.php');
    $sql1 = "SELECT * FROM `tbl_users`";
//echo "$sql";
$result1 = mysqli_query($conn, $sql1);
?>

<?php
    $id = $_SESSION['id'];
    require_once ('process/dbh.php');
    $sql = "SELECT * FROM `project` where u_id = '$id'";
    $result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="lightbox/css/lightbox.min.css">
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
                                                <li class="breadcrumb-item"><a href="emp-projectassign.php">My Task</a></li>
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
                                            <h5>My Tasks</h5>
                                            <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Assignprojects.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Assignprojects.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>


                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th align = "center">No.</th>
                                                            <th align = "center">Task Name</th>
                                                            <th align = "center">Start Date</th>
                                                            <th align = "center">Due Date</th>
                                                            <th align = "center">Submited Date</th>
                                                            <th align = "center">Image</th>
                                                            <th align = "center">Assign By</th>
                                                            <th align = "center">Status</th>
                                                            <th align = "center">Option</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $counter = 1;
                                                            while ($users = mysqli_fetch_assoc($result)) {
                                                                $counter;
                                                                echo "<tr>";
                                                                echo "<td>".$counter++."</td>";
                                                                echo "<td>".$users['pname']."</td>";
                                                                echo "<td>".$users['startdate']."</td>";
                                                                echo "<td>".$users['duedate']."</td>";
                                                                echo "<td>".$users['subdate']."</td>";
                                                                echo "<td><a class='example-image-link' href='Upload/proof/".$users[proof_img]."' data-lightbox='example-1'><img class='example-image' width='50px' heigh='50px' src='Upload/proof/".$users[proof_img]."'></a></td>";
                                                                $qry = mysqli_query($conn, "select * from tbl_users where u_id ='".$users['assige_by']."'");
                                                                $rs = mysqli_fetch_assoc($qry);
                                                                echo "<td>".$rs['u_name']."</td>";
                                                                if($_SESSION['role']=='Employee' OR $_SESSION['role']=='Admin'){
                                                                    if($users['status']=='Due'){
                                                                        echo "<td style='color:red;'>".$users['status']."</td>";

                                                                        echo "<td><a class='btn btn-sm btn-primary' href=\"test.php?pid=$users[pid]&uid=$users[u_id]\"><i class='feather icon-thumbs-up'></i>Submit</a><a class='btn btn-sm btn-secondary' href=\"fillprojectassign.php?pid=$users[pid]&uid=$users[u_id]\"><i class='feather icon-info'></i>Edit</a></td>";
                                                                    }else{
                                                                        echo "<td style='color:green;'>".$users['status']."</td>";

                                                                        echo "<td><a style='pointer-events:none;' class='btn btn-sm btn-primary' href=\"test.php?pid=$users[pid]&uid=$users[u_id]\"><i class='feather icon-thumbs-up'></i>Submit</a><a class='btn btn-sm btn-secondary' href=\"fillprojectassign.php?pid=$users[pid]&uid=$users[u_id]\"><i class='feather icon-info'></i>Edit</a></td>";
                                                                    }

                                                                }
                                                                else if($_SESSION['role']=='Store' or $_SESSION['role']=='Sub Employee')
                                                                {
                                                                    if($users['status']=='Due'){
                                                                        echo "<td style='color:red;'>".$users['status']."</td>";


                                                                    echo "<td><a class='btn btn-sm btn-primary' href=\"test.php?pid=$users[pid]&uid=$users[u_id]\"><i class='feather icon-thumbs-up'></i>Submit</a></td>";
                                                                }
                                                                    else{

                                                                        echo "<td style='color:green;'>".$users['status']."</td>";

                                                                         echo "<td><a style='pointer-events:none;' class='btn btn-sm btn-primary' href=\"test.php?pid=$users[pid]&uid=$users[u_id]\"><i class='feather icon-thumbs-up'></i>Submit</a></td>";
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    echo "None";
                                                                }



                                                                echo "</tr>";
                                                            }
                                                        ?>

                                                    </tbody>
                                                </table>
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
	<script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
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
