<!-- [ Session ] start -->

     <?php include("session.php") ?>
<!-- [ Session ] end -->
<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `project`,`tbl_users` where  `project`.u_id = `tbl_users`.u_id order by pid desc";

//echo "$sql";
$results = mysqli_query($conn, $sql);

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
	<!-- <meta name="description" content="Captain Audit Portal is specially designed for management of any brand easily. Here you can track all processes of your business. Captain Audit Portal is product of THE BRAND LANDMARK" /> -->
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
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"/>

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

	<?php include("navbar.php") ?>

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
												<h5>Home</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Analytics Dashboard</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- [ breadcrumb ] end -->
							<!-- [ Main Content ] start -->
							<div class="row">

								<!-- product profit start -->
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-red">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Due Tasks</h6>
													<h2 class="m-b-0 text-white">
														<?php
			                                                $res=mysqli_query($conn,"select * from project where status='Due'");
			                                                echo mysqli_num_rows($res);
			                                            ?>
													</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-blue">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Completed Task</h6>
													<h2 class="m-b-0 text-white">
														<?php
			                                                $res=mysqli_query($conn,"select * from project where status='Submitted'");
			                                                echo mysqli_num_rows($res);
			                                            ?>
													</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-green">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Due Task From Store</h6>
													<h2 class="m-b-0 text-white">
														<?php
			                                                $res=mysqli_query($conn,"select * from tbl_users,project  where tbl_users.u_id=project.u_id and project.status='Pending' and tbl_users.u_role='Store'");
			                                                echo mysqli_num_rows($res);
			                                            ?>
													</h2>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card prod-p-card bg-c-yellow">
										<div class="card-body">
											<div class="row align-items-center m-b-25">
												<div class="col">
													<h6 class="m-b-5 text-white">Total Complains</h6>
													<h2 class="m-b-0 text-white">
														<?php
			                                                $res=mysqli_query($conn,"select * from  tbl_complain");
			                                                echo mysqli_num_rows($res);
			                                            ?>
													</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

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
                                                            <th align = "center">Image</th>
                                                            <th align = "center">Status</th>
                                                            <th align = "center">Assign By</th>
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
                                                                echo "<td><a href='Upload/proof/".$users['proof_img']."' target='_blank'><img width='60px' heigh='60px' src='Upload/proof/".$users['proof_img']."'></a></td>";
                                                                if($users['status']=="Due")
                                                                {
                                                                    echo "<td style='color:red;'>".$users['status']."</td>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<td style='color:green;'>".$users['status']."</td>";
                                                                }
                                                                  $qry = mysqli_query($conn, "select * from tbl_users where u_id ='".$users['assige_by']."'");
                                                                $rs = mysqli_fetch_assoc($qry);
                                                                echo "<td>".$rs['u_name']."</td>";
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

                            <div class="row">
                                <!-- [ Contextual-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Store Task</h3>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example1" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Store Name</th>
                                                            <th>Project Name</th>
                                                            <th>Start Date</th>
                                                            <th>Due Date</th>
                                                            <th>Priority</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    	<?php
			                                                $count=1;
			                                                $result=mysqli_query($conn,"SELECT * FROM `tbl_admintask`, `tbl_users` where `tbl_admintask`.store_id = `tbl_users`.u_id ORDER BY `tbl_admintask`.task_id DESC") or die(mysqli_error($conn));
			                                                while($row=mysqli_fetch_assoc($result))
			                                                {
		                                                ?>
                                                		<tr>
                                                            <td><?php echo $count;$count++; ?></td>
                                                            <td><?php echo $row["u_name"]; ?></td>
                                                            <td><?php echo $row["p_naem"]; ?></td>
                                                            <td><?php echo $row["s_date"]; ?></td>
                                                            <td><?php echo $row["e_date"]; ?></td>
                                                            <td><?php echo $row["t_priority"]; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
	<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    } );
</script>
<script>
	console.log(Notification.permission);
</script>
<?php include("footer.php") ?>
</body>
</html>