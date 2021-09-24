<?php 
	$mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lolyonnayem@gmail.com'; 
    $mail->Password = '01840240714Na@';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('lolyonnayem@gmail.com', 'lolyon Nayem');
 ?>