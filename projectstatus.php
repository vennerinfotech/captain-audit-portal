<!-- [ Session ] start -->
    <?php include("session.php") ?>
<!-- [ Session ] end -->
<?php

require_once ('process/dbh.php');
if($_SESSION['role']=="Admin"){
    $sql = "SELECT * from `project`,`tbl_users` where  `project`.u_id = `tbl_users`.u_id order by subdate desc";
}
else{
    $sql = "SELECT * from `project`,`tbl_users` where  `project`.u_id = `tbl_users`.u_id and assige_by='".$_SESSION['id']."' order by subdate desc";
}

//echo "$sql";
$results = mysqli_query($conn, $sql);

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
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Project Status</a></li>
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
                                            <h3>All Employee/Store Task Status</h3>
                                             <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Employeeprostatus.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Employeeprostatus.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th align = "center">No.</th>
                                                            <th align = "center" style='display:none;'>pid</th>
                                                            <th align = "center" style='display:none;'>uid</th>
                                                            <th align = "center">Employee/Store Name</th>
                                                            <th align = "center">Task Name</th>
                                                            <th align = "center">Start Date</th>
                                                            <th align = "center">Due Date</th>
                                                            <th align = "center">Priority</th>
                                                            <th align = "center">Submission Date</th>
                                                            <th align = "center">Total Due Days</th>
                                                            <th align = "center">Status</th>
                                                            <th align = "center">Image</th>
                                                            <th align = "center">Assign By</th>
                                                            <th align = "center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $counter=1;
                                                            while ($users = mysqli_fetch_assoc($results)) {
                                                                $counter;

                                                                $date1_ts = strtotime($users['duedate']);
                                                                    $date2_ts = strtotime($users['subdate']);
                                                                    $diff = $date2_ts - $date1_ts;
                                                                    $dateDiff =  round($diff / 86400);

                                                                echo "<tr>";
                                                                echo "<td style='display:none;'>".$users['pid']."</td>";
                                                                echo "<td style='display:none;'>".$users['u_id']."</td>";
                                                                echo "<td>".$counter++."</td>";
                                                                echo "<td>".$users['u_name']."</td>";
                                                                echo "<td>".$users['pname']."</td>";
                                                                echo "<td>".$users['startdate']."</td>";
                                                                echo "<td>".$users['duedate']."</td>";
                                                                echo "<td>".$users['priority']."</td>";
                                                                echo "<td>".$users['subdate']."</td>";
                                                                if($users['subdate']=="")
                                                                {
                                                                    echo "<td>".""."</td>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<td>".$dateDiff."</td>";
                                                                }
                                                                 if($users['status']=="Due")
                                                                {
                                                                    echo "<td style='color:red;'>".$users['status']."</td>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<td style='color:green;'>".$users['status']."</td>";
                                                                }
																echo "<td><a class='example-image-link' href='Upload/proof/".$users['proof_img']."' data-lightbox='example-1'><img class='example-image' src='Upload/proof/".$users['proof_img']."' height = 60px width = 60px></a></td>";
                                                                 $qry = mysqli_query($conn, "select * from tbl_users where u_id ='".$users['assige_by']."'");
                                                                $rs = mysqli_fetch_assoc($qry);
                                                                echo "<td>".$rs['u_name']."</td>";
                                                                echo "<td>"?>

                                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal" onclick='removedata(<?php echo $users["pid"]; ?>)'>Delete</button>


                                                                 <button type="button" onclick="window.location='taskupdate.php?edit=<?php echo $users["pid"]; ?>'" class="btn btn-sm btn-info">Edit</button> </td>


                                                                <?php  "</td>";
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
            if(isset($_POST["btnremove"]))
            {

                $res=mysqli_query($conn,"delete from project where pid='".$_POST["hfdid"]."'");
                if($res)
                    echo "<script>window.location='projectstatus.php';</script>";
            }

        ?>
        <!-- Modal -->
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
    
    <!-- Required Js -->
    <!-- Required Js -->
	<script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
    <?php include("process/script.php") ?>
    <script type="text/javascript">
            function removedata(val)
            {
                
                $("#hfdid").val(val);
            }

        </script>
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
