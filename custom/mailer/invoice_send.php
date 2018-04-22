<?php
$email=$_REQUEST['email'];
// include the phpmailer class file
require_once "phpmailer/PHPMailerAutoload.php";

echo $email;


// php mailer code starts
$mail = new PHPMailer;
// telling the class to use SMTP
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->SMTPAuth = true;
// sets the prefix to the server
$mail->SMTPSecure = "ssl";
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
$mail->Port = 465;

// set your username here
$mail->Username = '';
$mail->Password = '';

// set your subject
$mail->Subject = trim("Pierceman Electronics Invoice");
date_default_timezone_set('Asia/Kolkata');
$dr=date("d-m-Y");

$message = "Receipt for Your Transaction on $dr";

// sending mail from
$mail->SetFrom('piercemanelec@gmail.com', 'Pierce');
// sending to
$mail->AddAddress($email);
// set the message
$mail->MsgHTML($message);

$file_to_attach = '../orders/invoice.pdf';

$mail->AddAttachment( $file_to_attach , 'invoice.pdf' );

  if($mail->send())
  {
    echo "<br>Invoice Mail successfully sent";
    echo "<br>CONTINUE SHOPPING..";
    header('Refresh: 2; URL=../../index.php');
}else{

  echo "<br>Email Pending ! <br> But,you can Still ";
$link_address="../orders/comp.php";
    echo "<a href='".$link_address."'><br>CONTINUE SHOPPING..</a>";
}


?>
