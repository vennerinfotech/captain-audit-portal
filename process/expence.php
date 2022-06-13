 <?php require_once ('../process/dbh.php');
require_once ('../session.php'); ?>

 <?php

                                        if(isset($_POST["btnadd"]))
                                        {

                                                $name=$_FILES["txtphoto"]["name"];
                                                $ext=pathinfo($name,PATHINFO_EXTENSION);
                                                $newname="CERT".date('Ymdhis').".".$ext;
                                                
                                           $result = mysqli_query($conn,"insert into tbl_expense (cat_id,u_id,date,note,amount,image) values ('".$_POST["selcat"]."','".$_SESSION['id']."','".$_POST["txtdat"]."','".$_POST["notname"]."','".$_POST["amnub"]."','".$newname."')") or die(mysqli_error($conn));

                                            if($result==true)
                                            {
                                                  move_uploaded_file($_FILES["txtphoto"]["tmp_name"], "../Upload/expense/".$newname);
                                                $_SESSION['status'] = " Add Expense Successfully";
                                                $_SESSION['status_code'] = "success";
                                                header("Location:../add-expence.php");
                                            }
                                            else
                                            {
                                                $_SESSION['status'] = " Expense Not Added Successfully";
                                                $_SESSION['status_code'] = "error";
                                                header("Location:../add-expence.php");
                                            }

                                        }
                                        ?>       
