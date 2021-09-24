<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


    if(isset($_POST['facForgetSubmit']))
    {
        $facforID = strtoupper($_POST['facForgatedID']);
        $facforEmail = $_POST['facForgetedemail'];

        $sqlselect = "SELECT * FROM faculty_member_info WHERE department_id = '$facforID'";
        $result = $connection->query($sqlselect);

        $row = mysqli_fetch_array($result);
        if ( $row["department_id"] == $facforID && $row["lname"] != "" && $row["email"] == $facforEmail) {
            $facultyforid = $row["department_id"];
            $facforDoB = $row["date_of_birth"];
            $facforemail = $row["email"];
            echo $facultyforid." ".$facforDoB." ".$facforemail."<br>";
            $mail = new PHPMailer(true);
            try {
                include 'include/mail_config.php';
                
                $mail->addAddress($row["email"], $row["lname"]);
                $mail->addReplyTo('jacknayem@yahoo.com', 'Information');

                $mail->isHTML(true);
                $mail->Subject = 'Recovery Password your faculty account';

                $mail->Body    = '<p>You received this message because your university faculty account is trying to recovery password. If it is not you then avoid.</p><br><p>Hi <b>'.$row["lname"].'</b>,<br>You recently want to get your password <b>'.$row["department_id"].'</b> Account number. Your Password is <b>'.$row["password"].'</b></p>';

                $mail->AltBody = 'You received this message because your university faculty account is trying to recovery password. I f it is not you then avoid.Hi Username,
                You recently want to get your password CSE05807103 Account. Your Password is 123456';

                $mail->send();
                    echo "<script>alert('Your password has been send to your Email')</script>";
            } catch (Exception $e) {
                echo "<script>alert('Message could not be sent, Mailer Error:', $mail->ErrorInfo)</script>";
            }
        }else{
            echo "<script>alert('There are no account, Please Log in. Thank you')</script>";
        }
    }


?>
