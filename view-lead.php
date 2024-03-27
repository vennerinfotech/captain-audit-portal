<!-- [ Session ] start -->
<?php

include 'process/dbh.php';
include("process/session.php");



if (isset($_POST["search"])) {
    if ($_POST['stdate'] != "" && $_POST['stdate'] != "") {
        $startdate = date("Y-m-d", strtotime($_POST['stdate']));
        $enddate = date('Y-m-d', strtotime($_POST['enddate'] . ' + 1 days'));

        if ($_SESSION['role'] == "Admin") {
            $result = mysqli_query($conn, "SELECT * FROM tbl_lead where DATE(lead_date) between '$startdate' and '$enddate' ORDER BY lead_id DESC ") or die(mysqli_error($conn));
        } else if ($_SESSION['role'] == "Employee" || $_SESSION['role'] == "Sub Employee") {
            $result = mysqli_query($conn, "SELECT * FROM tbl_lead WHERE lead_assigned = '" . $_SESSION['id'] . "' and DATE(lead_date) between '$startdate' and '$enddate' ORDER BY lead_id DESC ") or die(mysqli_error($conn));
        }
    }
} else {
    if ($_SESSION['role'] == "Admin") {
        $result = mysqli_query($conn, "SELECT * FROM tbl_lead ORDER BY lead_id DESC ") or die(mysqli_error($conn));
    } else if ($_SESSION['role'] == "Employee" || $_SESSION['role'] == "Sub Employee") {
        $result = mysqli_query($conn, "SELECT * FROM tbl_lead WHERE lead_assigned = '" . $_SESSION['id'] . "' ORDER BY lead_id DESC ") or die(mysqli_error($conn));
    }
}



if (isset($_POST["import"])) {
    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $counter = 0;
        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data123 = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($counter++ == 0) continue;
                $frandno = rand();
                mysqli_query($conn, "insert into tbl_lead (lead_status, lead_tags, lead_source, lead_assigned, lead_name, lead_city, lead_phoneno, lead_description, lead_filename, lead_date) values ('" . $_POST['status'] . "', 'New','" . $_POST['source'] . "','" . $_POST['assigned'] . "','" . $data123[0] . "','" . $data123[1] . "','" . $data123[2] . "', '" . $data123[3] . "' , '$frandno', '" . date('Y-m-d') . "')") or die(mysqli_error($conn));

                $result1 = mysqli_query($conn, "SELECT  * FROM tbl_users where u_id = '" . $_SESSION['id'] . "'");
                $row1 = mysqli_fetch_assoc($result1);
                $filenamelog = "Logfile/" . $frandno . ".txt";
                $content = $row1['u_name'] . " " . $_POST['status'] . " " . date('Y-m-d') . " " . "\n";
                $fp = fopen($filenamelog, "a");
                fwrite($fp, $content);
                fclose($fp);
            }
            fclose($handle);
            header("Location:view-lead.php");
        }
    }
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
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="view-lead.php">View Lead</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>View Records</h5>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <form action="" method="POST">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <input class="form-control" type="date" name="stdate" id="stdate" data-date-format="dd-mm-YYYY" placeholder="Please Enter First Date">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <input class="form-control" type="date" name="enddate" id="enddate" data-date-format="dd-mm-YYYY" placeholder="Please Enter Last Date">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <button style="float:right;" class='btn btn-success' onclick="record(this.value)" value="filter"><i class='feather icon-check-circle'></i>Filter Excel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>View Lead</h5>
                                            <!-- <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewroyalty.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewroyalty.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div> -->
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Date</th>
                                                            <th>Lead Status</th>
                                                            <th>Lead Tags</th>
                                                            <th>Lead Source</th>
                                                            <?php if ($_SESSION['role'] == "Admin") { ?>
                                                                <th>Lead Assigned</th>
                                                            <?php } ?>
                                                            <th>Name</th>
                                                            <th>City</th>
                                                            <th>Phone No.</th>
                                                            <th>Description</th>
                                                            <th>Add Tags</th>
                                                            <?php if ($_SESSION['role'] == "Admin") { ?>
                                                                <th>DELETE</th>
                                                            <?php } ?>
                                                            <th>View Log</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        $j = 1;
                                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>

                                                                <td><?php echo $row["lead_date"]; ?></td>
                                                                <td>
                                                                    <select class="form-control" id="leadstatus" name="leadstatus" onchange="fetch_select(this.value);">
                                                                        <?php
                                                                        $Values = array("Interested for Meeting", "Follow up in a Day", "New", "Meeting Done", "Follow up in 2 days", "Contacted", "On Hold", "Not Interested", "Follow up in a week", "Already Followed by Team", "Not Picking Up Call", "Customer", "Message Done", "Follow up next month", "Friend Refferenc", "Intrested", "Unreachable Contact", "Disqualified", "Budget Issue");

                                                                        foreach ($Values as $value) {
                                                                            if ($value == $row["lead_status"]) {
                                                                                $val = $value . "=" . $row["lead_id"] . "=" . $row['lead_filename'];
                                                                                echo "<option value='" . $val . "' selected >" . $value . "</option>";
                                                                            } else {
                                                                                $val = $value . "=" . $row["lead_id"] . "=" . $row['lead_filename'];
                                                                                echo "<option value='" . $val . "'>" . $value . "</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </td>
                                                                <td><?php echo wordwrap($row["lead_tags"], 30, "<br>\n"); ?></td>
                                                                <td><?php echo $row["lead_source"]; ?></td>
                                                                <?php if ($_SESSION['role'] == "Admin") { ?>
                                                                    <td>
                                                                        <?php
                                                                        $sql = "SELECT `u_name` FROM tbl_users WHERE u_id = '" . $row["lead_assigned"] . "'";
                                                                        $result1 = mysqli_query($conn, $sql);
                                                                        $row1 = mysqli_fetch_assoc($result1);
                                                                        echo  $row1["u_name"];
                                                                        ?>
                                                                    </td>
                                                                <?php } ?>
                                                                <td><?php echo $row["lead_name"]; ?></td>
                                                                <td><?php echo $row["lead_city"]; ?></td>
                                                                <td><?php echo $row["lead_phoneno"]; ?></td>
                                                                <td><?php echo $row["lead_description"]; ?></td>
                                                                <td><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addTags" onclick='addtagdata(<?php echo $row["lead_id"]; ?>)'>Add Tags</button></td>
                                                                <?php if ($_SESSION['role'] == "Admin") { ?>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal" onclick='removedata(<?php echo $row["lead_id"]; ?>)'>Delete</button>
                                                                    </td>
                                                                <?php } ?>
                                                                <td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#logfile<?php echo $j; ?>">View</button></td>
                                                            </tr>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="logfile<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div style="padding:30px;">
                                                                                    <?php
                                                                                    $name = $row["lead_filename"];
                                                                                    $filename = "Logfile/" . $name . ".txt";
                                                                                    echo nl2br(file_get_contents($filename));
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php $j++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_POST["btnremove"])) {
                                    $res = mysqli_query($conn, "DELETE FROM tbl_lead where lead_id='" . $_POST["hfdid"] . "'");
                                    if ($res) echo "<script>window.location='view-lead.php';</script>";
                                }
                                ?>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Remove </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    Are you sure want to delete this record ?
                                                    <input type="hidden" name="hfdid" id="hfdid">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <button type="submit" name="btnremove" class="btn btn-primary">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST["btnaddtag"])) {
                                $tags = ", " . $_POST["tagdesc"];
                                $res = mysqli_query($conn, "update tbl_lead set lead_tags= CONCAT(lead_tags,'$tags') where lead_id='" . $_POST["tagid"] . "'");
                                if ($res) echo "<script>window.location='view-lead.php';</script>";
                            }
                            ?>
                            <div class="modal fade" id="addTags" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Tags </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                        <form method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="tagid" id="tagid">
                                                <input type="text" name="tagdesc" id="tagdesc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" name="btnaddtag" class="btn btn-primary">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($_SESSION['role'] == "Admin") { ?>
                            <div class="row">
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Import Lead</h5>
                                            <div class="text-right m-3">
                                                <!-- <button onclick="window.location='Addcategory.php';" type="button" class="btn btn-sm btn-primary">View Category</button> -->
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Choose CSV File</label>
                                                                    <input type="file" name="file" id="file" accept=".csv">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Status</label>
                                                                    <select class="form-control" id="status" name="status">
                                                                        <option default value="0">- Select -</option>
                                                                        <option value="Interested for Meeting">Interested for Meeting</option>
                                                                        <option value="Follow up in a Day">Follow up in a Day</option>
                                                                        <option value="New">New</option>
                                                                        <option value="Meeting Done">Meeting Done</option>
                                                                        <option value="Follow up in 2 days">Follow up in 2 days</option>
                                                                        <option value="Contacted">Contacted</option>
                                                                        <option value="On Hold">On Hold</option>
                                                                        <option value="Not Interested">Not Interested</option>
                                                                        <option value="Follow up in a week">Follow up in a week</option>
                                                                        <option value="Already Followed by Team">Already Followed by Team</option>
                                                                        <option value="Not Picking Up Call">Not Picking Up Call</option>
                                                                        <option value="Customer">Customer</option>
                                                                        <option value="Message Done">Message Done</option>
                                                                        <option value="Follow up next month">Follow up next month</option>
                                                                        <option value="Friend Refference">Friend Refference</option>
                                                                        <option value="Intrested">Intrested</option>
                                                                        <option value="Unreachable Contact">Unreachable Contact</option>
                                                                        <option value="Disqualified">Disqualified</option>
                                                                        <option value="Budget Issue">Budget Issue</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Source</label>
                                                                    <select class="form-control" id="source" name="source">
                                                                        <option default value="0">- Select -</option>
                                                                        <option value="Customer Refernce">Customer Refernce</option>
                                                                        <option value="Direct Call">Direct Call</option>
                                                                        <option value="Direct Meeting @ Store">Direct Meeting @ Store</option>
                                                                        <option value="Direct Message">Direct Message</option>
                                                                        <option value="Facebook">Facebook</option>
                                                                        <option value="Franchise India">Franchise India</option>
                                                                        <option value="Friend Refference">Friend Refference</option>
                                                                        <option value="Google">Google</option>
                                                                        <option value="Instagram">Instagram</option>
                                                                        <option value="Other">Other</option>
                                                                        <option value="Owner Reference">Owner Reference</option>
                                                                        <option value="Website">Website</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Assigned</label>
                                                                    <select class="form-control" id="assigned" name="assigned">
                                                                        <option default value="0">- Select -</option>
                                                                        <?php
                                                                        $sql_department = "SELECT * FROM tbl_users where u_role !='Store'";
                                                                        $department_data = mysqli_query($conn, $sql_department);
                                                                        while ($row = mysqli_fetch_assoc($department_data)) {
                                                                            $departid = $row['u_id'];
                                                                            $depart_name = $row['u_name'];
                                                                            echo "<option value='" . $departid . "' >" . $depart_name . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <a class="btn btn-secondary" href="Logfile/Book1.csv">Sample File</a>
                                                            <button id="btnadd" type="submit" name="import" class="btn btn-primary">Import</button>
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
                        <?php } ?>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        function removedata(val) {
            $("#hfdid").val(val);
        }

        function addtagdata(val) {
            $("#tagid").val(val);
        }

        function fetch_select(val) {
            var myArray = val.split("=");
            $.ajax({
                type: 'post',
                url: 'process/updleadstatus.php',
                datatype: 'json',
                data: {
                    status: myArray[0],
                    id: myArray[1],
                    filename: myArray[2]
                },
                success: function(response) {
                    alert(response); //This will print you result
                }
            });
        }
    </script>
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
    <script>
        function record(val) {
            if ($("#stdate").val() != "" && $("#enddate").val() != "") {
                window.location.href = 'Excel/Viewlead.php?st=' + $("#stdate").val() + '&end=' + $("#enddate").val();
            } else {
                alert("Please Select Date Range Wisely !!");
            }
        }
    </script>
    <?php include("footer.php") ?>
</body>

</html>