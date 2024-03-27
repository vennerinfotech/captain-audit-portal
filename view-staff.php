<!-- [ Session ] start -->
<?php include 'process/dbh.php'; ?>
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
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="The Brand Landmark" />

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/webl.png" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

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
    <section class="pcoded-main-container">
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
                                                <!-- <h5 class="m-b-10">Bootstrap Basic Tables</h5> -->
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Staff Management</a></li>
                                                <li class="breadcrumb-item"><a href="view-staff.php">View Staff</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->


                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>View Staff</h5>
                                            <div class="text-right m-3">

                                                <!--  <button onclick="window.location='add-staff.php';" type="button" class="btn btn-sm btn-primary">Add Staff</button> -->

                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <?php if ($_SESSION['role'] != "Store") { ?>
                                                                <th>Store Name</th>
                                                                <th>Staff Name</th>
                                                            <?php } else { ?>
                                                                <th>Staff Name</th>
                                                            <?php } ?>
                                                            <th>Address</th>
                                                            <th>Email-Id</th>
                                                            <th>Contact</th>
                                                            <th>status</th>
                                                            <th>reason</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                            if (isset($_GET["page"])) {
                                                                $page_number  = $_GET["page"];
                                                            } else {
                                                                $page_number = 1;
                                                            }
                                                            if ($_SESSION['role'] == 'Admin') {
                                                                $sql = "SELECT * FROM `tbl_users` WHERE u_role = 'Staff'";
                                                                $result = $conn->query($sql);
                                                            } elseif($_SESSION['role'] == 'Branchowner') {
                                                                $sql = "SELECT * FROM `tbl_users` WHERE u_role = 'Staff' AND u_outletid = '".$_SESSION['outlet_id']."'";
                                                                $result = $conn->query($sql);
                                                            }
                                                            else {
                                                                $out = $_SESSION['assignedoutlets'];
                                                                $arr = (json_decode($out));
                                                                $new_arr = implode(",",$arr);
                                                                $sqloutlet = "SELECT u_outletid FROM tbl_users WHERE `u_id` IN (".$new_arr.")";
                                                                $resultoutlet = $conn->query($sqloutlet);
                                                                $r = array();
                                                                while($row = $resultoutlet->fetch_assoc()) {
                                                                    $r[] = $row['u_outletid'];
                                                                }
                                                                $new_arr1 = implode(",",$r);
                                                                $sql = "SELECT * FROM tbl_users WHERE `u_outletid` IN (".$new_arr1.") AND `u_role` = 'Staff'";
                                                                $result = $conn->query($sql);
                                                            }
                                                        
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>
                                                                <?php if ($_SESSION['role'] != "Store") { ?>
                                                                    <td><?php echo $row["u_name"]; ?></td>
                                                                    <td><?php echo $row["u_name"]; ?></td>
                                                                <?php } else { ?>
                                                                    <td><?php echo $row["u_name"]; ?></td>
                                                                <?php } ?>
                                                                <td><?php echo $row["u_address"]; ?></td>
                                                                <td><?php echo $row["u_email"]; ?></td>
                                                                <td><?php echo $row["u_contact"]; ?></td>
                                                                <td><?php echo $row["u_status"]; ?></td>
                                                                <td><?php echo nl2br($row["u_reson"]); ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="removedata(<?php echo $row['u_id']; ?>)">Action</button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Give The Reason</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </div>
                                                        <form method="post" action="process/isActive-staff.php">
                                                            <div class="modal-body">

                                                                <label for="reson">Status</label>
                                                                <input type="hidden" name="staffId" id="staffId">
                                                                <select class="form-control" name="selStatus" id="selStatus">
                                                                    <option value="Active" selected>Active</option>
                                                                    <option value="Left">Left</option>
                                                                    <option value="Terminated">Terminated</option>
                                                                    <option value="On Leave">On Leave</option>
                                                                </select>
                                                                <label for="reson">Enter Description</label>
                                                                <textarea class="form-control" name="staffReson" id="staffReson" rows="5" required></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="btnreson" class="btn btn-primary">Submit</button>
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
    </section>

    <!-- Required Js -->
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
    <script type="text/javascript">
        function removedata(val) {
            $("#staffId").val(val);
        }
    </script>
    <?php include("footer.php") ?>
</body>

</html>