<?php
    require_once ('../process/dbh.php');
	require_once ('../session.php');
?>

<?php
    if(isset($_POST["btnadd"]))
    {
    	date_default_timezone_set('Asia/Kolkata');
        $date = date( 'Y-m-d H:i:s');
    	if($_POST['proof']=="With"){
    		$name=$_FILES["txtphoto"]["name"];
	        $ext=pathinfo($name,PATHINFO_EXTENSION);
	        $newname="CERT".date('Ymdhis').".".$ext;

	        $result = mysqli_query($conn,"UPDATE `project` SET proof_img ='".$newname."' , `subdate`='$date',`status`='Submitted' WHERE pid = '".$_POST['id']."' ") or die(mysqli_error($conn));

	        if($result)
	        {
	            move_uploaded_file($_FILES["txtphoto"]["tmp_name"], "../Upload/proof/".$newname);

	            $_SESSION['status'] = " Your Task Submitted Successfully";
	            $_SESSION['status_code'] = "success";
	            header("Location:../emp-projectassign.php");
	        }
	        else
	        {
	            $_SESSION['status'] = " Your Not Task Submitted";
	            $_SESSION['status_code'] = "error";
	        	header("Location:../emp-projectassign.php");
	        }
    	}
    	else
    	{
    		$result = mysqli_query($conn,"UPDATE `project` SET proof_img ='No.png' , `subdate`='$date',`status`='Submitted' WHERE pid = '".$_POST['id']."' ") or die(mysqli_error($conn));

	        if($result)
	        {
	            move_uploaded_file($_FILES["txtphoto"]["tmp_name"], "../Upload/proof/".$newname);

	            $_SESSION['status'] = " Your Attendance Successfully";
	            $_SESSION['status_code'] = "success";
	            header("Location:../emp-projectassign.php");
	        }
	        else
	        {
	            $_SESSION['status'] = " Your Attendance Not Added!";
	            $_SESSION['status_code'] = "error";
	        	header("Location:../emp-projectassign.php");
	        }
    	}


    }
?>
