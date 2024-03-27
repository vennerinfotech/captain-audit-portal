<?php require_once ('../process/dbh.php');
require_once ('../session.php');
include('../smtp/PHPMailerAutoload.php');
include('../vendor/autoload.php'); 


            // // EMAIL CODE //

            //     $name=$_POST["pname"];
            //     $city=$_POST["cname"];
            //     $html='Respected  '.$name.'<br>
            //            Congratulations on becoming a member of FooD Mohalla family in '.$city.' <br>
            //            Our operation team will get back to you soon.';
            //     $email=$_POST["useremail"];

            //     echo smtp_mailer($email,'FooD Mohalla',$html);
            //     function smtp_mailer($to,$subject, $msg){
            //         $mail = new PHPMailer(); 
            //         $mail->SMTPDebug  = 3;
            //         $mail->IsSMTP(); 
            //         $mail->SMTPAuth = true; 
            //         $mail->SMTPSecure = 'tls'; 
            //         $mail->Host = "smtp.gmail.com";
            //         $mail->Port = 587; 
            //         $mail->IsHTML(true);
            //         $mail->CharSet = 'UTF-8';
            //         $mail->Username = "unagar2001@gmail.com";
            //         $mail->Password = "Prajapati#0@1";
            //         $mail->SetFrom("unagar2001@gmail.com");
            //         $mail->Subject = $subject;
            //         $mail->Body =$msg;
            //         $mail->AddAddress($to);
            //         $mail->SMTPOptions=array('ssl'=>array(
            //             'verify_peer'=>false,
            //             'verify_peer_name'=>false,
            //             'allow_self_signed'=>false
            //         ));
            //         if(!$mail->Send()){
            //             echo $mail->ErrorInfo;
            //         }else{
            //             header("Location:../add-sale.php");
            //         }
            //     }
            //  // EMAIL CODE //

                // INSERT CODE //        

                $name=$_FILES["txtphoto"]["name"];
                $ext=pathinfo($name,PATHINFO_EXTENSION);
                $newname="CERT".date('Ymdhis').".".$ext;
                                    
                $result = mysqli_query($conn,"insert into tbl_sale (name,emailid,phnno,city,lamount,mpayment,dateofloi,img) values
                 ('".$_POST["pname"]."','".$_POST['useremail']."','".$_POST["contactno"]."','".$_POST["cname"]."','".$_POST["loiamount"]."','".$_POST["mpayment"]."','".$_POST["loidate"]."','".$newname."')") or die(mysqli_error($conn));
                        
                if($result==true)
                {
                        move_uploaded_file($_FILES["txtphoto"]["tmp_name"], "../Upload/Sale/".$newname);

                    $_SESSION['status'] = " Your Data Added Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../add-sale.php");
                }
                else
                {
                    $_SESSION['status'] = " Data Not Added Successfully";
                    $_SESSION['status_code'] = "error";
                    header("Location:../add-sale.php");
                }
                
            // INSERT CODE //     
                   

                $number=$_POST["contactno"];
            //Your authentication key
                $authKey = "60503d9e86755";

                //Multiple mobiles numbers separated by comma
                //$mobileNumber = "contactno";

                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "FDMOHL";

                //Your message to send, Add URL encoding here.
                $message = ("FOOD MOHALLA\n\nBE INDEPENDENT WITH YOUR CHOICE.\nGET 40% OFF ON EVERY 2ND PIZZA*\n\nValid Till 22nd Aug,21\n\nContact your Nearest FooD Mohalla Outlet");

                //Define route 
                $route = "trans_dnd";
                //Prepare you post parameters
                $postData = array(
                    'apikey' => $authKey,
                    'route' => $route,
                    'sender' => $senderId,
                    'mobileno' => $number,
                    'text' => $message
                );

                //API URL
                $url="https://sms.mobileadz.in/api/push?";

                // init the resource
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));


                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


                //get response
                $output = curl_exec($ch);

                //Print error if any
                if(curl_errno($ch))
                {
                    echo 'error:' . curl_error($ch);
                }

                curl_close($ch);

                echo $output;
            
?>       
