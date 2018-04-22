<?php
include('../config.php');
$user_check="mohnish123";
$email="mohnish.katware@ves.ac.in";
// include the phpmailer class file
require_once "phpmailer/PHPMailerAutoload.php";

echo $email;


// php mailer code starts
$mail = new PHPMailer;
// telling the class to use SMTP
$mail->IsSMTP();
// enable SMTP auth0entication
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

$sel=mysql_query("select bank,debit_no from mode where username='$user_check'");
while($arriy=mysql_fetch_array($sel))
{
$po=$arriy['bank'];
$co=$arriy['debit_no'];
}

$selo=mysql_query("select item from list where usern='$user_check'");
$prc=0;
while($arri=mysql_fetch_array($selo))
{
$i=$arri['item'];
$seli=mysql_query("select price,desca from items where itemno='$i'");
 while($arr=mysql_fetch_array($seli))
{
$ip=$arr['price'];
$prc=$prc+$arr['price'];
$dp=$arr['desca'];
}
}

date_default_timezone_set('Asia/Kolkata');
$dr=date("Y-m-d", time() + 345600);
$timea=date("Y-m-d H:i:s");
$sqli = "INSERT INTO corders (username, bank, amt, debit_no, till, order_d) VALUES ('$user_check', '$po', '$prc', '$co', '$dr', '$timea')";
if(!mysql_query($sqli,$connection))
{
    echo "Order not Successful";
    header("Refresh: 1.9;url=../cart.php");
}

$selp=mysql_query("select order_no from corders where username='$user_check' and order_no=(Select max(order_no) from corders)");
while($arriy=mysql_fetch_array($selp))
{
$order_no=$arriy['order_no'];
}


$sell=mysql_query("select item from list where usern='$user_check'");
while($arri=mysql_fetch_array($sell))
{
$i=$arri['item'];
$sqli = "INSERT INTO ohist (order_no, otype, username, itemno) VALUES ('$order_no','C','$user_check', '$i')";
if(!mysql_query($sqli,$connection))
{
    echo "Order not Successful";
    header("Refresh: 1.9;url=../cart.php");
}
}

}else{

  echo "<br>Email Pending ! <br> But,you can Still ";
$link_address="../orders/comp.php";
    //echo "<a href='".$link_address."'><br>CONTINUE SHOPPING..</a>";
}


?>
