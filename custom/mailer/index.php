<?php
$emaili=$_REQUEST['email'];
// include the phpmailer class file
require_once "phpmailer/PHPMailerAutoload.php";

echo $emaili;



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
$mail->Subject = trim("Successful registeration at Pierceman Electronics");

$message = "You are successfully registered. Have a joyfull shopping.";

// sending mail from
$mail->SetFrom('piercemanelec@gmail.com', 'Pierce');
// sending to
$mail->AddAddress($emaili);
// set the message
$mail->MsgHTML($message);



  if($mail->send())
  {
    echo "<br>Confirmation Mail successfully sent";
    $link_address="../../login/index.php";
    echo "<br><br><a href='".$link_address."'>LOGIN</a>";

}else{

  echo "<br>Confirmation Pending ! <br> But,you can Still ";
$link_address="../../login/index.php";
    echo "<a href='".$link_address."'>LOGIN</a>";
}
?>
