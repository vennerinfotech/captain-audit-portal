<!-- [ Session ] start -->
<?php
include("process/session.php");
require_once('process/dbh.php');
error_reporting(0);
if($_SESSION['role'] == "Employee"){
	$sql = "SELECT * from `tbl_users` where `u_role`='Staff' or `u_role`='Branchowner' ORDER BY u_id DESC";
}else{
	$sql = "SELECT * from `tbl_users` ORDER BY u_id DESC";
}
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
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
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
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="show-user.php">All Users</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ Contextual-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>All Users Details</h3>

                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th style="display:none;">No.</th>
                                                            <th>User Profile</th>
                                                            <th>Name</th>
                                                            <th style='display:none;'>Address</th>
                                                            <th>Email-Id</th>
                                                            <th>Password</th>
                                                            <th>Gender</th>
                                                            <th style='display:none;'>BirthDate</th>
                                                            <th>Contact No.</th>
                                                            <th>Store Contact No.</th>
                                                            <th>User Role</th>
                                                            <th style='display:none;'>Salary</th>
                                                            <th>Joining/Opening Date</th>
                                                            <?php if ($_SESSION['role'] == "Admin"  || $_SESSION['role'] == "Company"){ ?>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $counter = 1;
                                                        while ($users = mysqli_fetch_assoc($result)) {
                                                            $counter;
                                                            echo "<tr>";
                                                            echo "<td>" . $counter++ . "</td>";
                                                            echo "<td style='display:none;'>" . $users['u_id'] . "</td>";
                                                            echo "<td><a class='example-image-link' href='process/" . $users['u_pic'] . "' data-lightbox='example-1'><img class='example-image' src='process/" . $users['u_pic'] . "' height = 60px width = 60px></a></td>";
                                                            echo "<td>" . $users['u_name'] . "</td>";
                                                            echo "<td style='display:none;'>" . $users['u_address'] . "</td>";
                                                            echo "<td>" . $users['u_email'] . "</td>";
                                                            echo "<td>" . $users['u_password'] . "</td>";
                                                            echo "<td>" . $users['u_gender'] . "</td>";
                                                            echo "<td style='display:none;'>" . $users['u_birthday'] . "</td>";
                                                            echo "<td>" . $users['u_contact'] . "</td>";
                                                            echo "<td>" . $users['u_officeno'] . "</td>";
                                                            echo "<td>" . $users['u_role'] . "</td>";
                                                            echo "<td style='display:none;'>" . $users['u_salary'] . "</td>";
                                                            echo "<td>" . $users['u_joindate'] . "</td>";
                                                            if($_SESSION['role'] == "Admin"  || $_SESSION['role'] == "Company"){
                                                            echo "<td><a class='btn btn btn-sm btn-primary' href=\"edit-user.php?id=$users[u_id]\">Edit</a></td>";
                                                            echo "<td><a class='btn btn btn-sm btn-danger' href=\"delete-user.php?id=$users[u_id]\">Delete</a></td>";
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Contextual-table ] end -->
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
    <script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
    <?php include("process/script.php") ?>

    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
        <script>
            swal({
                /*title: "Good job!",*/
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok",
            });
        </script>
    <?php
        unset($_SESSION['status'], $_SESSION['status_code']);
    } ?>
    <?php include("footer.php") ?>
</body>

</html>
<!-- <a class='btn btn-sm btn-info' href=\"edit-user.php?id=$users[u_id]\">Edit</a> -->