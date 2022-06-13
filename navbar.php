<!-- [ Session ] start -->
    <?php 
	include("process/dbh.php");
	include("session.php");


    if ($_SESSION['role'] == "staff") 
    {
    	$sql215 = "SELECT * FROM tbl_ststaffattendence where store_id = '".$_SESSION['id']."' and staff_id = '".$_SESSION['staffid']."' and DATE(cdate) = date(NOW())";
    	$result215=mysqli_query($conn,$sql215);
    	$rowcount215=mysqli_num_rows($result215);

    	$sql21= "SELECT * FROM tbl_ststaffattendence where store_id = '".$_SESSION['id']."' and staff_id = '".$_SESSION['staffid']."' and DATE(udate) = date(NOW())";
    	$result21=mysqli_query($conn,$sql21);
    	$rowcount21=mysqli_num_rows($result21);
    }
    else
    {
    	$sql215657585 = "SELECT * FROM tbl_dayselfi where u_id = '".$_SESSION['id']."' and DATE(cdate) = date(NOW())";
    	$result215657585=mysqli_query($conn,$sql215657585);
    	$rowcount215657585=mysqli_num_rows($result215657585);

    	$sql2156= "SELECT * FROM tbl_dayselfi where u_id = '".$_SESSION['id']."' and DATE(udate) = date(NOW())";
    	$result2156=mysqli_query($conn,$sql2156);
    	$rowcount2156=mysqli_num_rows($result2156);
    }

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
					<?php if($_SESSION['role']=="Admin"){?>
					<li class="nav-item pcoded-menu-caption">
						<label>Admin</label>
					</li>
					<li class="nav-item">
						<a href="userdashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-user.php" class="">Add Users</a></li>
							<li class=""><a href="show-user.php" class="">Show Users</a></li>
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
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Complain Management</span></a>
						<ul class="pcoded-submenu">
							<!-- <li class=""><a href="add-complain.php" class="">Add Complains</a></li> -->
							<li class=""><a href="view-complain.php" class="">View Complain</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if($rowcount215657585 == 0 ){ ?>
							<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
							<?php }else{ if($rowcount2156 == 0){?>
							<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }} ?>
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
							<li class=""><a href="add-staff.php" class="">Add Staff</a></li>
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
					<?php } else if($_SESSION['role']=="Employee"){?>
					<li class="nav-item pcoded-menu-caption">
						<label>Employee</label>
					</li>
					<li class="nav-item">
						<a href="emp-dashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">My Status</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
    					<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Audit</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="audit-portal.php" class="">Audit Form</a></li>
							<li class=""><a href="viewaudit.php" class="">View Audit</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="emp-projectassign.php" class="">My Tasks</a></li>
							<li class=""><a href="personaltask.php" class="">Personal Tasks</a></li>
							<li class=""><a href="emptask.php" class="">Employee Tasks</a></li>
							<li class=""><a href="projectstatus.php" class="">Task Status</a></li>
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
							<?php if($rowcount215657585 == 0 ){ ?>
							<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
							<?php }else{ if($rowcount2156 == 0){?>
							<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-staff.php" class="">Add Staff</a></li>
							<li class=""><a href="view-staff.php" class="">View Staff</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Lead Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-lead.php" class="">View Lead</a></li>
						</ul>
					</li>
				<?php } else if($_SESSION['role']=="Sub Employee"){?>
					<li class="nav-item pcoded-menu-caption">
						<label>Sub Employee</label>
					</li>
					<li class="nav-item">
						<a href="emp-dashboard.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">My Status</span></a>
					</li>
					<li class="nav-item">
						<a href="audit-portal.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Audit Form</span></a>
					</li>
					<li class="nav-item">
						<a href="emp-applyleave.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-alert-octagon"></i></span><span class="pcoded-mtext">Leave Application</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="emp-projectassign.php" class="">My Tasks</a></li>
							<li class=""><a href="personaltask.php" class="">Personal Tasks</a></li>
							<li class=""><a href="emptask.php" class="">Store Tasks</a></li>
							<li class=""><a href="projectstatus.php" class="">Task Status</a></li>
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
							<?php if($rowcount215657585 == 0 ){ ?>
							<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
							<?php }else{ if($rowcount2156 == 0){?>
							<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }} ?>
							<li class=""><a href="view-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-staff.php" class="">Add Staff</a></li>
							<li class=""><a href="view-staff.php" class="">View Staff</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Lead Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="view-lead.php" class="">View Lead</a></li>
						</ul>
					</li>
				<?php } else if($_SESSION['role']=="staff"){?>
					<li class="nav-item pcoded-menu-caption">
						<label>Staff</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Attendance Management</span></a>
						<ul class="pcoded-submenu">
							<?php if($rowcount215 == 0 ){ ?>
							<li class=""><a href="in-attandence.php" class="">IN Attendance</a></li>
							<?php }else{ if($rowcount21 == 0){?>
							<li class=""><a href="out-attandence.php" class="">OUT Attendance</a></li>
							<?php }} ?>
							<li class=""><a href="staffview-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<?php }else{?>
					<li class="nav-item">
						<a href="emp-projectassign.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Assigned Task</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Complain Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-complain.php" class="">Add Complain</a></li>
							<li class=""><a href="view-complain.php" class="">View Complain</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="add-staff.php" class="">Add Staff</a></li>
							<li class=""><a href="view-staff.php" class="">View Staff</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="admin-task.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task To Company</span></a>
					</li>
					<li class="nav-item">
						<a href="View-status.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Task Status</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Staff Attendance</span></a>
						<ul class="pcoded-submenu">
							<li class=""><a href="staffview-attandence.php" class="">View Attendance</a></li>
						</ul>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end
