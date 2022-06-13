 <?php

require_once ('../process/dbh.php');
require_once ('../session.php');

$name = $_POST['username'];
$address = $_POST['useraddress'];
$email = $_POST['useremail'];
$password = $_POST['userpassword'];
$gender = $_POST['usergender'];
$birthday =$_POST['userbirtdate'];
$contact = $_POST['usercontactno'];
$officeno = $_POST['officecontactno'];
$role = $_POST['userrole'];
$salary = $_POST['usersalary'];
$joindate = $_POST['joindate'];
//echo "$birthday";
$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png' , 'jpg' , 'jpeg');

function compressedImage($source, $path, $quality) {
  $info = getimagesize($source);
  if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);
  elseif ($info['mime'] == 'image/gif') 
      $image = imagecreatefromgif($source);
	elseif ($info['mime'] == 'image/jpg')
      $image = imagecreatefromjpg($source);
  elseif ($info['mime'] == 'image/png') 
      $image = imagecreatefrompng($source);
  imagejpeg($image, $path, $quality);
}

if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'images/'.$filename;
	/*compressedImage($filetemp,$destinationfile,70);*/
    move_uploaded_file($filetemp, $destinationfile);

$sql = "INSERT INTO `tbl_users`(`u_name`, `u_email`, `u_password`, `u_role`, `u_birthday`, `u_gender`, `u_contact`,`u_officeno`, `u_address`, `u_salary`, `u_pic`, `u_joindate`, `u_token`, `u_mtoken`) VALUES ('$name','$email','$password','$role','$birthday','$gender','$contact','$officeno','$address','$salary','$destinationfile', '$joindate', 'null', 'null')";

$result = mysqli_query($conn, $sql);

if(($result) == 1){

    $_SESSION['status'] = "Your Data Added Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: ../add-user.php");
}

else
{
    $_SESSION['status'] = "Your Data Not Added Successfully";
    $_SESSION['status_code'] = "error";
    header("Location: ../add-user.php");
}

}

else{

	$sql = "INSERT INTO `tbl_users`(`u_name`, `u_email`, `u_password`, `u_role`, `u_birthday`, `u_gender`, `u_contact`, `u_officeno`,`u_address`, `u_salary`, `u_pic`, `u_joindate`) VALUES ('$name','$email','$password','$role','$birthday','$gender','$contact','$officeno','$address','$salary','images/no.jpg', '$joindate')";

	$result = mysqli_query($conn, $sql);

	if(($result) == 1){

		$_SESSION['status'] = "Your Data Added Successfully";
		$_SESSION['status_code'] = "success";
		header("Location: ../add-user.php");
	}

	else{
		 $_SESSION['status'] = "Your Data Not Added Successfully";
		$_SESSION['status_code'] = "error";
		header("Location: ../add-user.php");
	}
}
?>