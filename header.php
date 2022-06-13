<?php

require_once ('process/dbh.php');

$sql="SELECT * FROM `project` WHERE `counter` = '0' and u_id='".$_SESSION['id']."'";
$result12=mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result12);

?>
<script type="text/javascript">

    function myFunction() {
        $.ajax({
            url: "view_notification.php",
            type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}
		});
	 }

</script>
<!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="#" class="b-brand">
        		<img src="assets/images/CAP_LOGO.png" width="140px" height="40" alt="" class="logo images">
				<img src="assets/images/AD2.png" alt="" class="logo-thumb images">
			</a>
		</div>
		<a class="mobile-menu" id="mobile-header" href="#!">
			<i class="feather icon-more-horizontal"></i>
		</a>
		<div class="collapse navbar-collapse">
			<a href="#!" class="mob-toggler"></a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<div class="main-search open">
						<!-- <div class="input-group">
							<input type="text" id="m-search" class="form-control" placeholder="Search . . .">
							<a href="#!" class="input-group-append search-close">
								<i class="feather icon-x input-group-text"></i>
							</a>
							<span class="input-group-append search-btn btn btn-primary">
								<i class="feather icon-search input-group-text"></i>
							</span>
						</div> -->
						<?php  if (isset($_SESSION['useremail'])) : ?>
						<h5><span>Welcome : &nbsp;<?php echo $_SESSION['useremail']; ?></span></h5>
						<?php endif ?>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php if($_SESSION['role'] == 'Admin'){?>
					<li>
					<div class="dropdown">
                        <a class="dropdown-toggle" href="#" onclick="myFunction()" data-toggle="dropdown"><i class="icon feather icon-bell"></i><span id="notification-count" style="position: relative;top: -10px;left: -20px;color: red;font-weight: 400;"><?php echo $num_rows;?></span></a>
						<div class="dropdown-menu dropdown-menu-right notification">
							<div class="noti-head">
								<h6 class="d-inline-block m-b-0">Notifications</h6>
								<div class="float-right">
									<a href="#!" class="m-r-10">mark as read</a>
									<a href="#!">clear all</a>
								</div>
							</div>
							<ul class="noti-body">
								<li class="n-title">
									<p class="m-b-0">NEW DUE TASK</p>
								</li>
                                <?php if($num_rows > 0 && $_SESSION['role'] != "Admin"){?>
        							<iframe style="display: none;" src="assets/images/Sms Alert.mp3" ></iframe>
									<iframe style="display: none;" src="assets/images/Sms Alert.ogg" ></iframe>
									<iframe style="display: none;" src="assets/images/Sms Alert.wav" ></iframe>
								<?php }?>
								<?php

								$id = $_SESSION['id'];

								if($_SESSION['role'] == 'Admin')
								{
									$sql123 = "SELECT * from `project`,`tbl_users` where  `project`.u_id = `tbl_users`.u_id and `project`.status = 'Due' order by subdate desc";
								}
								else
								{
									$sql123 = "SELECT * from `project`,`tbl_users` where  `project`.u_id = `tbl_users`.u_id and `project`.u_id ='$id' and `project`.status = 'Due' order by subdate desc";
								}



										//echo "$sql";
									$result123 = mysqli_query($conn, $sql123);
                                    while ($users123 = mysqli_fetch_assoc($result123)) {
                                    $date1 = new DateTime($users123['duedate']);
                                     $date2 = new DateTime($users123['subdate']);
                                    $interval = $date1->diff($date2);
                                    $interval = $date1->diff($date2);
                                    echo "<li class='notification'>";
                                    echo "<div class='media'>";
                                    echo "<img class='img-radius' src='process/$users123[u_pic]' alt='image'>";
                                    echo "<div class='media-body'>";
                                    echo "<p><strong> Name : ".$users123['u_name']."</strong><span class='n-time text-muted'><i class='icon feather icon-clock m-r-10'></i> Assign Days : ".$interval->days."</span></p>";
                                    echo "<p> Task : ".$users123['pname']."</p>";
                                    echo "<div>";
                                    echo "</div>";
                                    echo "</li>";
                                    }
                                ?>
							</ul>
							<div class="noti-footer">
								<a href="#!">show all</a>
							</div>
						</div>
					</div>
				</li>
				<?php } ?>
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon feather icon-settings"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<img src="Upload/eveningself/No.jpeg" class="img-radius" alt="User-Profile-Image">
								<span><?php echo $_SESSION['role']; ?> : <?php echo $_SESSION['name']; ?></span>
								<a href="session.php?logout='1'" class="dud-logout" title="Logout">
									<i class="feather icon-log-out"></i>
								</a>
							</div>
							
						</div>
					</div>
				</li>
			</ul>
		</div>
	</header>
<!-- [ Header ] end -->
