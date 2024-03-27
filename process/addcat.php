  <?php require_once ('dbh.php');
require_once ('session.php'); ?>

<?php
                                        if(isset($_POST["btnadd"]))
                                        {
                                            $result = mysqli_query($conn,"insert into tbl_category (cat_name) values ('".$_POST["catname"]."')") or die(mysqli_error($conn));

                                            if($result==true)
                                            {
                                                
                                                $_SESSION['status'] = " Add Category Successfully";
                                                $_SESSION['status_code'] = "success";
                                                header("Location:../add-expcategory.php");
                                               
                                            }
                                            else
                                            {
                                                 $_SESSION['status'] = " Category Not Added Successfully";
                                                $_SESSION['status_code'] = "error";
                                                header("Location:../add-expcategory.php");
                                            }

                                        }
                                        ?>    