<?php
// Include the database configuration file
require_once('dbh.php');
require_once('session.php');

// File upload path
$targetDir = "../Upload/expense/";
$fileName = basename($_FILES["txtphoto"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_POST["btnadd"])) {
    if (!empty($_FILES["txtphoto"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'JPG', 'PNG', 'JPEG', 'GIF', 'PDF');
        if (in_array($fileType, $allowTypes)) {
            $imageTemp = $_FILES["txtphoto"]["tmp_name"];
            $imageSize = convert_filesize($_FILES["txtphoto"]["size"]);

            // Compress size and upload image 
            $compressedImage = compressImage($imageTemp, $targetFilePath, 30);

            // Upload file to server
            if ($compressedImage) {
                // Insert image file name into database
                $result = mysqli_query($conn, "insert into tbl_expense (cat_id,u_id,date,note,amount,image) values ('" . $_POST["selcat"] . "','" . $_SESSION['id'] . "','" . $_POST["txtdat"] . "','" . $_POST["notname"] . "','" . $_POST["amnub"] . "','" . $fileName . "')") or die(mysqli_error($conn));
                if ($result) {
                    $_SESSION['status'] = " Add Expense Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../add-expence.php");
                } else {
                    $_SESSION['status'] = " Expense Not Added Successfully";
                    $_SESSION['status_code'] = "error";
                    header("Location:../add-expence.php");
                }
            } else {
                $result = mysqli_query($conn, "insert into tbl_expense (cat_id,u_id,date,note,amount) values ('" . $_POST["selcat"] . "','" . $_SESSION['id'] . "','" . $_POST["txtdat"] . "','" . $_POST["notname"] . "','" . $_POST["amnub"] . "')") or die(mysqli_error($conn));
                if ($result) {
                    $_SESSION['status'] = " Add Expense Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../add-expence.php");
                } else {
                    $_SESSION['status'] = " Expense Not Added Successfully";
                    $_SESSION['status_code'] = "error";
                    header("Location:../add-expence.php");
                }
            }
        } else {
            $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
            $_SESSION['status_code'] = "error";
            header("Location:../add-expence.php");
        }
    } else {
        $result = mysqli_query($conn, "insert into tbl_expense (cat_id,u_id,date,note,amount) values ('" . $_POST["selcat"] . "','" . $_SESSION['id'] . "','" . $_POST["txtdat"] . "','" . $_POST["notname"] . "','" . $_POST["amnub"] . "')") or die(mysqli_error($conn));
        if ($result) {
            $_SESSION['status'] = " Add Expense Successfully";
            $_SESSION['status_code'] = "success";
            header("Location:../add-expence.php");
        } else {
            $_SESSION['status'] = " Expense Not Added Successfully";
            $_SESSION['status_code'] = "error";
            header("Location:../add-expence.php");
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
