<?php
require_once('dbh.php');
require_once('session.php');

if (isset($_POST["btnadd"])) {
	date_default_timezone_set('Asia/Kolkata');
	$date = date('Y-m-d H:i:s');
	$proofdetail = ($_POST['prooftext'] != "") ? addslashes($_POST['prooftext']) : "";

	if ($_POST['proof'] == "With") {

		$targetDir = "../Upload/proof/";
		$fileName = basename($_FILES["txtphoto"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

		if (!empty($_FILES["txtphoto"]["name"])) {

			$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'JPG', 'PNG', 'JPEG', 'GIF', 'PDF');
			if (in_array($fileType, $allowTypes)) {
				$imageTemp = $_FILES["txtphoto"]["tmp_name"];
				$imageSize = convert_filesize($_FILES["txtphoto"]["size"]);

				// Compress size and upload image 
				$compressedImage = compressImage($imageTemp, $targetFilePath, 30);
				if ($compressedImage) {
					// Insert image file name into database
					$result = mysqli_query($conn, "UPDATE `project` SET proof_img ='" . $fileName . "', proof_info = concat(proof_info,'\n','" . $proofdetail . "'), `subdate`='$date',`status`='Submitted' WHERE pid = '" . $_POST['id'] . "' ") or die(mysqli_error($conn));
					if ($result) {
						$_SESSION['status'] = " Your Task Submitted Successfully";
						$_SESSION['status_code'] = "success";
						header("Location:../emp-projectassign.php");
					} else {
						$_SESSION['status'] = " Your Task Not Submitted";
						$_SESSION['status_code'] = "error";
						header("Location:../emp-projectassign.php");
					}
				} else {
					$result = mysqli_query($conn, "UPDATE `project` SET `proof_img` = 'No.png', `proof_info` = concat(proof_info, '\n', '" . $proofdetail . "'), `subdate`='$date', `status`='Submitted' WHERE pid = '" . $_POST['id'] . "' ") or die(mysqli_error($conn));
					if ($result) {
						$_SESSION['status'] = " Your Task Submitted Successfully";
						$_SESSION['status_code'] = "success";
						header("Location:../emp-projectassign.php");
					} else {
						$_SESSION['status'] = " Your Task Not Submitted";
						$_SESSION['status_code'] = "error";
						header("Location:../emp-projectassign.php");
					}
				}
			}
		} else {
			$_SESSION['status'] = "Please select a file to upload.";
			$_SESSION['status_code'] = "error";
			header("Location:../emp-projectassign.php");
		}
	} else {
		$result = mysqli_query($conn, "UPDATE `project` SET proof_img ='No.png', `proof_info` = concat(proof_info, '\n', '" . $proofdetail . "'), `subdate`='$date',`status`='Submitted' WHERE pid = '" . $_POST['id'] . "' ") or die(mysqli_error($conn));

		if ($result) {
			$_SESSION['status'] = " Your Task Submitted Successfully";
			$_SESSION['status_code'] = "success";
			header("Location:../emp-projectassign.php");
		} else {
			$_SESSION['status'] = " Your Task Not Submitted";
			$_SESSION['status_code'] = "error";
			header("Location:../emp-projectassign.php");
		}
	}
}

function compressImage($source, $destination, $quality)
{
	// Get image info 
	$imgInfo = getimagesize($source);
	$mime = $imgInfo['mime'];

	// Create a new image from file 
	switch ($mime) {
		case 'image/jpeg':
			$image = imagecreatefromjpeg($source);
			break;
		case 'image/png':
			$image = imagecreatefrompng($source);
			break;
		case 'image/gif':
			$image = imagecreatefromgif($source);
			break;
		default:
			$image = imagecreatefromjpeg($source);
	}

	// Save image 
	imagejpeg($image, $destination, $quality);

	// Return compressed image 
	return $destination;
}

function convert_filesize($bytes, $decimals = 2)
{
	$size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
	$factor = floor((strlen($bytes) - 1) / 3);
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}
