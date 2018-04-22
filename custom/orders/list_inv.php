<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pierceman Electronics</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom CSS -->
    <link href="../css/shop-item.css" rel="stylesheet">
    <script>
    $(function(){
       $('#fileContents').val(document.documentElement.innerHTML);

    });
    </script>


</head>
<body>
<center>
<?php
include('../../session.php');
$po=$_POST['bank'];
$co=$_POST['cardn'];
$gen=0;
$sel=mysql_query("select bank,debit_no from mode where bank='$po' AND debit_no='$co'");
$num_rows = mysql_num_rows($sel);
if ($num_rows==1) {
  echo "<center><font size='+1'><b>Order not Successful<br> Duplicate Debit CARD</b></font></center>";
  header("Refresh: 1.9;url=../cart.php");
}
else{
  $gen=1;
echo "<center><font size='+1'><b>PIERCEMAN ELECTRONICS</b></font></center>";

$sqli = "INSERT INTO mode (username, bank, debit_no) VALUES ('$user_check', '$po', '$co')";
if(!mysql_query($sqli,$connection))
{
    echo "Card details not filled";
    header("Refresh: 1.9;url=../custom.php");
}
else{
  echo "Card details submitted";
header("Refresh: 1.9;url=../custom.php");
}
}



 ?>
 </center>



 <!-- jQuery -->
 <script src="js/jquery.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>

 </body>

 </html>
