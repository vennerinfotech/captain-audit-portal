<?php 
    require_once ('dbh.php');
    require_once ('session.php'); 

    $img = $_POST['image'];
    $folderPath = "../Upload/staffateendence/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    
    date_default_timezone_set('Asia/Kolkata');
    $result = mysqli_query($conn,"insert into tbl_ststaffattendence (cimage,cdate,store_id,staff_id,uimage) values ('".$fileName."','".date( 'Y-m-d H:i:s')."' ,'".$_SESSION['id']."','".$_POST['staffname']."','No.jpeg')") or die(mysqli_error($conn));

    if($result)
    {
       $_SESSION['status'] = " Your Attendance Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../staffview-attendence.php");
    }
    else
    {
        $_SESSION['status'] = " Your Attendance Not Added!";
        $_SESSION['status_code'] = "error";
        header("Location:../staffin-attendence.php");
    }
?>
