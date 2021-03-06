<!-- [ Session ] start -->
    <?php include("session.php") ?>
<!-- [ Session ] end -->

<?php 
    $id = $_SESSION['id'];
    require_once ('process/dbh.php');
     /*$sql1 = "SELECT * FROM `tbl_users` where id = '$id'";
     $result1 = mysqli_query($conn, $sql1);
     $usersname = mysqli_fetch_array($result1);
     $userName = ($usersname['u_name']);*/

    
    $sql1 = "SELECT * FROM `project` WHERE u_id = $id and status = 'Due' order by pid desc" ;

    $sql2 = "Select * From tbl_users, tbl_userleave Where tbl_users.u_id = $id and tbl_userleave.ul_uid = $id order by tbl_userleave.ul_id";


//echo "$sql";
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
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
                                            
                                                <li class="breadcrumb-item"><a href="emp-dashboard.php">My Status</a></li>
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
                                            <h3>Due Task List</h3>
                                             <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Dueprojects.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Dueprojects.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th align = "center">No.</th>
                                                            <th align = "center">Task Name</th>
                                                            <th align = "center">start Date</th>
                                                            <th align = "center">Due Date</th>
                                                            <th align = "center">Priority</th>
                                                            <th align = "center">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $counter=1;
                                                            while ($users = mysqli_fetch_assoc($result1)) {
                                                                $counter;
                                                                echo "<tr>";
                                                                echo "<td>".$counter++."</td>";
                                                                echo "<td>".$users['pname']."</td>";
                                                                echo "<td>".$users['startdate']."</td>";
                                                                echo "<td>".$users['duedate']."</td>";
                                                                echo "<td>".$users['priority']."</td>";
                                                                echo "<td style='color:red;'>".$users['status']."</td>";
                                                                echo "</tr>";
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
                            <!-- [ Main Content ] start -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <script>
    $(document).ready(function() {
        $('#example1').DataTable();
    } );
</script>
<?php include("footer.php") ?>
</body>

</html>
