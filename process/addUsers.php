 <?php

	require_once('dbh.php');
	require_once('session.php');

	$name = ($_POST['username'] != "") ? addslashes($_POST['username']) : "";
	$address = ($_POST['useraddress'] != "") ? addslashes($_POST['useraddress']) : "";
	$email = ($_POST['useremail'] != "") ? addslashes($_POST['useremail']) : "";
	$password = ($_POST['userpassword'] != "") ? addslashes($_POST['userpassword']) : "";
	$gender = ($_POST['usergender'] != "") ? addslashes($_POST['usergender']) : "";
	$outlet = ($_POST['useroutlet'] != "") ? addslashes($_POST['useroutlet']) : "";
	$birthday = ($_POST['userbirtdate'] != "") ? addslashes($_POST['userbirtdate']) : "";
	$contact = ($_POST['usercontactno'] != "") ? addslashes($_POST['usercontactno']) : "";
	$userresponsibility = ($_POST['userresponsibility'] != "") ? addslashes($_POST['userresponsibility']) : "";
	$primeobjectives = ($_POST['primeobjectives'] != "") ? addslashes($_POST['primeobjectives']) : "";
	$officeno = ($_POST['officecontactno'] != "") ? addslashes($_POST['officecontactno']) : "";
	$role = ($_POST['userrole'] != "") ? addslashes($_POST['userrole']) : "";
	$routinetask = ($_POST['routinetask'] != "") ? addslashes($_POST['routinetask']) : "";
	$assignedoutlets = ($_POST['assignedoutlets'] != null) ? json_encode($_POST['assignedoutlets']) : "";
	$salary = ($_POST['usersalary'] != "") ? addslashes($_POST['usersalary']) : "";
	$joindate = ($_POST['joindate'] != "") ? addslashes($_POST['joindate']) : "";
	$files = $_FILES['file'];

	if ($routinetask != "") {
		$routinetaskarray = array();
		$routinetaskarray = explode("|", $routinetask);
		$jsonroutinetask = json_encode($routinetaskarray);
	}

	if ($files != "") {
		$filename = $files['name'];
		$filrerror = $files['error'];
		$filetemp = $files['tmp_name'];
		$fileext = explode('.', $filename);
		$filecheck = strtolower(end($fileext));
		$fileextstored = array('png', 'jpg', 'jpeg');
	}

	function compressedImage($source, $path, $quality)
	{
		$info = getimagesize($source);
		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/jpg')
			$image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source);
		imagejpeg($image, $path, $quality);
	}

	if (in_array($filecheck, $fileextstored)) {

		$destinationfile = "images/" . $filename;
		move_uploaded_file($filetemp, $destinationfile);
	} else {
		$destinationfile = "images/no.jpg";
	}

	$sql = "INSERT INTO `tbl_users`(`u_name`, `u_outletid`, `u_email`, `u_password`, `u_role`, `u_birthday`, `u_gender`, `u_contact`,`u_officeno`, `u_address`, `u_salary`, `u_pic`, `u_joindate`, `u_token`, `u_mtoken`, `u_responsibility`, `u_primeobjectives`, `u_routinetask`, `u_assignedoutlets`, `u_status`, `u_reson`	) 
			VALUES ('$name','$outlet','$email','$password','$role','$birthday','$gender','$contact','$officeno','$address','$salary','$destinationfile', '$joindate', 'null', 'null','$userresponsibility','$primeobjectives','$jsonroutinetask', '$assignedoutlets', 'Active', 'Welcome')";
	$result = mysqli_query($conn, $sql);
	if (($result) == 1) {
		$_SESSION['status'] = "Your Data Added Successfully";
		$_SESSION['status_code'] = "success";
		header("Location: ../add-user.php");
	} else {
		$_SESSION['status'] = "Your Data Not Added Successfully";
		$_SESSION['status_code'] = "error";
		header("Location: ../add-user.php");
	}

	?>