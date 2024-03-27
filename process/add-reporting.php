 <?php

    require_once('dbh.php');
    require_once('session.php');

    $uid = $_SESSION['id'];
    $uname = $_SESSION['name'];
    $outlets = $_POST['outlets'];
    $tdate = $_POST['tdate'];
    $attendtask = $_POST['attendtask'];
    $pendingtask = ($_POST['pendingtask'] != "") ? addslashes($_POST['pendingtask']) : "";
    $challenges = ($_POST['challenges'] != "") ? addslashes($_POST['challenges']) : "";
    $routinetask = ($_POST['routinetask'] != null) ? implode(",", $_POST['routinetask']) : "";
    $waiting = ($_POST['waiting'] != "") ? addslashes($_POST['waiting']) : "";
    $alarmingtask = ($_POST['alarmingtask'] != "") ? addslashes($_POST['alarmingtask']) : "";
    $uploadPath = "rep_Attachment/";
    $sql = "";

    echo "<pre>";
    print_r($outlets);
    print_r($routinetask);
    
    foreach ($outlets as $key => $outlet) {
        $nameID = explode("_", $outlet);
        $id = $nameID[0];
        $name = $nameID[1];
        $task = addslashes($attendtask[$key]);
        if ($_FILES["file"]["name"][$key] != "") {
            $fileName = basename($_FILES["file"]["name"][$key]);
            $imageUploadPath = $uploadPath . $fileName;
            $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF', 'pdf', 'PDF');
            if (in_array($fileType, $allowTypes)) {
                // Image temp source and size 
                $imageTemp = $_FILES["file"]["tmp_name"][$key];
                $imageSize = convert_filesize($_FILES["file"]["size"][$key]);

                // Compress size and upload image 
                $compressedImage = compressImage($imageTemp, $imageUploadPath, 75);
                if ($compressedImage) {
                    $compressedImageSize = filesize($compressedImage);
                    $compressedImageSize = convert_filesize($compressedImageSize);
                    $sql .= "INSERT INTO `tbl_reporting`(`r_uid`, `r_uname`, `r_oid`, `r_outletname`, `r_date`, `r_attend`, `r_attachment`) VALUES ('$uid','$uname','$id','$name','$tdate','$task','$imageUploadPath');";
                } else {
                    $sql .= "INSERT INTO `tbl_reporting`(`r_uid`, `r_uname`, `r_oid`, `r_outletname`, `r_date`, `r_attend`) VALUES ('$uid','$uname','$id','$name','$tdate','$task');";
                }
            }
        } else {
            $sql .= "INSERT INTO `tbl_reporting`(`r_uid`, `r_uname`, `r_oid`, `r_outletname`, `r_date`, `r_attend`) VALUES ('$uid','$uname','$id','$name','$tdate','$task');";
        }
    }

    $sql .= "INSERT INTO `tbl_reporting`(`r_uid`, `r_uname`, `r_oid`, `r_outletname`, `r_date`, `r_ptask`, `r_ctask`, `r_wtask`, `r_altask`, `r_routinetask`) VALUES ('$uid','$uname','$id','$name','$tdate','$pendingtask', '$challenges', '$waiting', '$alarmingtask', '$routinetask');";

    if (mysqli_multi_query($conn, $sql)) {
        $_SESSION['status'] = "Your Data Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: ../add-reporting.php");
    } else {
        $_SESSION['status'] = "Your Data Not Added Successfully";
        $_SESSION['status_code'] = "error";
        header("Location: ../add-reporting.php");
    }


    function convert_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
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
    ?>