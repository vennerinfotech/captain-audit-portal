<!-- [ Session ] start -->
<?php
include("process/dbh.php");
include("process/session.php");

$sql215657585 = "SELECT * FROM tbl_dayselfi where u_id = '" . $_SESSION['id'] . "' and DATE(cdate) = date(NOW())";
$result215657585 = mysqli_query($conn, $sql215657585);
$rowcount215657585 = mysqli_num_rows($result215657585);

$sql2156 = "SELECT * FROM tbl_dayselfi where u_id = '" . $_SESSION['id'] . "' and DATE(udate) = date(NOW())";
$result2156 = mysqli_query($conn, $sql2156);
$rowcount2156 = mysqli_num_rows($result2156);

?>
<!-- [ Session ] end -->

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
	<div class="navbar-wrapper ">
		<div class="navbar-brand header-logo">
			<a href="#" class="b-brand">
				<img src="assets/images/CAP_LOGO.png" width="140px" height="40" alt="" class="logo images">
				<img src="assets/images/AD2.png" alt="" class="logo-thumb images">
			</a>
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
		</div>
		<div class="navbar-content scroll-div">
			<ul class="nav pcoded-inner-navbar">
				<?php if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Company") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-user.php" class="">Add Users</a></li>
							<li class=""><a href="view-users.php" class="">View Users</a></li>
							<li class=""><a href="emp-leaveapprove.php" class="">User Leave Approve</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="assignproject.php" class="">Assign Task</a></li>
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
							<li class=""><a href="projectstatus.php" class="">Task Status</a></li>
							<li class=""><a href="personaltask.php" class="">Personal Task</a></li>
							<li class=""><a href="taskby-store.php" class="">Task By Store</a></li>
							<li class=""><a href="evaluation.php" class="">Task Evaluation</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-reporting.php" class="">Add Reporting</a></li>
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-warning.php" class="">Add Warning</a></li>
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Notification</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-notification.php" class="">Add Notification</a></li>
							<li class=""><a href="view-notification.php" class="">View Notification</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expcategory.php" class="">Add Category</a></li>
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-navigation-2"></i></span><span class="pcoded-mtext">Royalty Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-royalty.php" class="">Add Royalty</a></li>
							<li class=""><a href="view-royalty.php" class="">View Royalty</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Audit</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="audit-portal.php" class="">Audit Form</a></li>
							<li class=""><a href="viewaudit.php" class="">View Audit</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Request Management</span></a>
						<ul class="pcoded-submenu">
							<!-- <li class=""><a href="add-complain.php" class="">Add Request</a></li> -->
							<li class=""><a href="view-request.php" class="">View Requests</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Store Staff Attandance</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="staffview-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-staff.php" class="">View Staff</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Salary Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-salary.php" class="">Add Salary</a></li>
							<li class=""><a href="view-salary.php" class="">View Salary</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user-plus"></i></span><span class="pcoded-mtext">Lead Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-lead.php" class="">Add Lead</a></li>
							<li class=""><a href="view-lead.php" class="">View Lead</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Advance Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-advance.php" class="">Add Advance</a></li>
							<li class=""><a href="view-advance.php" class="">View Advance</a></li>

						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Sale Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-sale.php" class="">Add Sale</a></li>
							<li class=""><a href="view-sale.php" class="">View Sale</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Cost Conversion</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-product-ingridient.php" class="">Add Product Recipe</a></li>
							<li class=""><a href="add-daily-consumption.php" class="">Add Closing</a></li>
							<li class=""><a href="view-consumption.php" class="">View Consumption</a></li>
							<li class=""><a href="view-recipe-consumption.php" class="">View Product Consumption</a></li>
							<li class=""><a href="view-productqty.php" class="">Product Sale Qty</a></li>
							<li class=""><a href="view-posdailySale.php" class="">Daily Sale</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibility</span></a>
					</li>
				<?php } elseif ($_SESSION['role'] == "Headmanagement") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-users.php" class="">View Users</a></li>
							<li class=""><a href="emp-leaveapprove.php" class="">User Leave Approve</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="assignproject.php" class="">Assign Task</a></li>
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
							<li class=""><a href="projectstatus.php" class="">Task Status</a></li>
							<li class=""><a href="personaltask.php" class="">Personal Task</a></li>
							<li class=""><a href="taskby-store.php" class="">Task By Store</a></li>
							<li class=""><a href="evaluation.php" class="">Task Evaluation</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-reporting.php" class="">Add Reporting</a></li>
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-warning.php" class="">Add Warning</a></li>
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-navigation-2"></i></span><span class="pcoded-mtext">Royalty Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-royalty.php" class="">Add Royalty</a></li>
							<li class=""><a href="view-royalty.php" class="">View Royalty</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Audit</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="audit-portal.php" class="">Audit Form</a></li>
							<li class=""><a href="viewaudit.php" class="">View Audit</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Request Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-request.php" class="">Add Request</a></li>
							<li class=""><a href="view-request.php" class="">View Requests</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-staff.php" class="">View Staff</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Cost Conversion</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-product-ingridient.php" class="">Add Product Recipe</a></li>
							<li class=""><a href="add-daily-consumption.php" class="">Add Closing</a></li>
							<li class=""><a href="view-consumption.php" class="">View Consumption</a></li>
							<li class=""><a href="view-recipe-consumption.php" class="">View Product Consumption</a></li>
							<li class=""><a href="view-productqty.php" class="">Product Sale Qty</a></li>
							<li class=""><a href="view-posdailySale.php" class="">Daily Sale</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibilities</span></a>
					</li>
					
				<?php } elseif ($_SESSION['role'] == "Employee") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="assignproject.php" class="">Assign Task</a></li>
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
							<li class=""><a href="projectstatus.php" class="">Task Status</a></li>
							<li class=""><a href="personaltask.php" class="">Personal Task</a></li>
							<li class=""><a href="taskby-store.php" class="">Task By Store</a></li>
							<li class=""><a href="evaluation.php" class="">Task Evaluation</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-user.php" class="">Add Users</a></li>
							<li class=""><a href="view-users.php" class="">View Users</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-reporting.php" class="">Add Reporting</a></li>
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Audit</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="audit-portal.php" class="">Audit Form</a></li>
							<li class=""><a href="viewaudit.php" class="">View Audit</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Request Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-request.php" class="">Add Request</a></li>
							<li class=""><a href="view-request.php" class="">View Requests</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-staff.php" class="">View Staff</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Cost Conversion</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-product-ingridient.php" class="">Add Product Recipe</a></li>
							<li class=""><a href="add-daily-consumption.php" class="">Add Closing</a></li>
							<li class=""><a href="view-consumption.php" class="">View Consumption</a></li>
							<li class=""><a href="view-recipe-consumption.php" class="">View Product Consumption</a></li>
							<li class=""><a href="view-productqty.php" class="">Product Sale Qty</a></li>
							<li class=""><a href="view-posdailySale.php" class="">Daily Sale</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibilities</span></a>
					</li>
				<?php } elseif ($_SESSION['role'] == "Storemanager") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-reporting.php" class="">Add Reporting</a></li>
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Audit</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="viewaudit.php" class="">View Audit</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Request Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-request.php" class="">Add Request</a></li>
							<li class=""><a href="view-request.php" class="">View Requests</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-staff.php" class="">View Staff</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Cost Conversion</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-product-ingridient.php" class="">Add Product Recipe</a></li>
							<li class=""><a href="add-daily-consumption.php" class="">Add Closing</a></li>
							<li class=""><a href="view-consumption.php" class="">View Consumption</a></li>
							<li class=""><a href="view-recipe-consumption.php" class="">View Product Consumption</a></li>
							<li class=""><a href="view-productqty.php" class="">Product Sale Qty</a></li>
							<li class=""><a href="view-posdailySale.php" class="">Daily Sale</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibilities</span></a>
					</li>
					<?php } elseif ($_SESSION['role'] == "Marketingteam" || $_SESSION['role'] == "Inventorymanager" || $_SESSION['role'] == "Staff") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-reporting.php" class="">Add Reporting</a></li>
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibilities</span></a>
					</li>
					
				<?php } elseif ($_SESSION['role'] == "Branchowner") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Audit</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="audit-portal.php" class="">Audit Form</a></li>
							<li class=""><a href="viewaudit.php" class="">View Audit</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Request Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-request.php" class="">Add Request</a></li>
							<li class=""><a href="view-request.php" class="">View Requests</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Cost Conversion</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-product-ingridient.php" class="">Add Product Recipe</a></li>
							<li class=""><a href="add-daily-consumption.php" class="">Add Closing</a></li>
							<li class=""><a href="view-consumption.php" class="">View Consumption</a></li>
							<li class=""><a href="view-recipe-consumption.php" class="">View Product Consumption</a></li>
							<li class=""><a href="view-productqty.php" class="">Product Sale Qty</a></li>
							<li class=""><a href="view-posdailySale.php" class="">Daily Sale</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibilities</span></a>
					</li>
				<?php } elseif ($_SESSION['role'] == "Hr") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="assignproject.php" class="">Assign Task</a></li>
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
							<li class=""><a href="projectstatus.php" class="">Task Status</a></li>
							<li class=""><a href="personaltask.php" class="">Personal Task</a></li>
							<li class=""><a href="taskby-store.php" class="">Task By Store</a></li>
							<li class=""><a href="evaluation.php" class="">Task Evaluation</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-reporting.php" class="">Add Reporting</a></li>
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibilities</span></a>
					</li>
				<?php } elseif ($_SESSION['role'] == "Salesteam") { ?>
					<li class="nav-item pcoded-menu-caption">
						<label><?= $_SESSION['role']; ?></label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="emp-projectassign.php" class="">My Task</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Reporting</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-reporting.php" class="">Add Reporting</a></li>
							<li class=""><a href="view-reporting.php" class="">View Reporting</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Warning Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-warning.php" class="">View Warnings</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Expense Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-expence.php" class="">Add Expense</a></li>
							<li class=""><a href="view-expense.php" class="">View Expense</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if ($rowcount215657585 == 0) { ?>
								<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
								<?php } else {
								if ($rowcount2156 == 0) { ?>
									<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }
							} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="view-responsibiity.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">My Responsibilities</span></a>
					</li>
					
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<!-- [ navigation menu ] end