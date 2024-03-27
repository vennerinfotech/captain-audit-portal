<?php 
    require_once ('dbh.php');
    require_once ('session.php'); 

    $img = $_POST['image'];
    $folderPath = "../Upload/eveningself/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);

    date_default_timezone_set('Asia/Kolkata');
    $result = mysqli_query($conn,"update tbl_ststaffattendence set uimage='".$fileName."',udate='".date( 'Y-m-d H:i:s')."' where storestaff_id='".$_GET['edit']."' " ) or die(mysqli_error($conn));

    if($result==true)
    {
       
        $_SESSION['status'] = " Your Attendance Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../staffview-attandence.php");
    }
    else
    {
        $_SESSION['status'] = " Your Attendance Not Added!";
        $_SESSION['status_code'] = "error";
        header("Location:../staffview-attandence.php");
    }

?>
