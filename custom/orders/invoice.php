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
$sel=mysql_query("select bank,debit_no from orders where bank='$po' AND debit_no='$co'");
$num_rows = mysql_num_rows($sel);
if ($num_rows==1) {
  echo "<center><font size='+1'><b>Order not Successful<br> Duplicate Debit CARD</b></font></center>";
  header("Refresh: 1.9;url=../cart.php");
}
else{
  $gen=1;
echo "<center><font size='+1'><b>PIERCEMAN ELECTRONICS</b></font></center>";
$sel=mysql_query("select item from cart where usern='$user_check'");
$prc=0;
$num_rows = mysql_num_rows($sel);
if ($num_rows==0) {
  echo "Order not Successful";
  header("Refresh: 1.9;url=index.php");
}
else{
 while($arri=mysql_fetch_array($sel))
{
$i=$arri['item'];
$seli=mysql_query("select price,desca from items where itemno='$i'");
 while($arr=mysql_fetch_array($seli))
{

$ip=$arr['price'];
$prc=$prc+$arr['price'];
$dp=$arr['desca'];

echo "<center>
<fieldset style='width:50%'><table><tr><td>
<b>&nbsp&nbsp&nbsp </b>".$arr['desca']."
&nbsp<b>Price:</b>Rs&nbsp;".$arr['price']."
</font></td><br></tr></table></fieldset></center>";
 }
 }

 echo "<br><center><font size='+1'><b>Amount Paid : Rs. ".$prc."</b></font></center>" ;

echo "<center><font size='+1'><b>BANK : ".$po."</b></font></center>" ;
echo "<center><font size='+1'><b>DEBIT CARD : ".$co."</b></font></center><hr>" ;
date_default_timezone_set('Asia/Kolkata');
$dr=date("Y-m-d", time() + 345600);

$email="";

$seli=mysql_query("select name,email,phone,addr from register where username='$user_check'");
 while($arr=mysql_fetch_array($seli))
{
  echo "<center><font face='Lucida Sans Unicode' size='+1'>".$arr['name']."</b>
  <br><b>Phone no. : </b>".$arr['phone']."
  <br><b>The order will reach at your Address : </b>
  <br>".$arr['addr']."
  <br><b>By ".date("d-m-Y", time() + 345600)."</b>
  </font><center>";
  $email=$arr['email'];
}
$sqli = "INSERT INTO orders (username, bank, amt, debit_no, till) VALUES ('$user_check', '$po', '$prc', '$co', '$dr')";
if(!mysql_query($sqli,$connection))
{
    echo "Order not Successful";
    header("Refresh: 1.9;url=../cart.php");
}

$seli=mysql_query("select order_no from orders where debit_no='$co'");
 while($arr=mysql_fetch_array($seli))
{
echo "<br><font face='Lucida Sans Unicode' size='+1'><b>ORDER NO : </b>PIE".$arr['order_no']."</font>";
}


}

}

 ?>
 </center>

<?php if($gen){ ?>
 <form action="download.php" method="post">

         <div style="display:none;" >
           <input type="text" name="fileContents" id="fileContents" value=''/>
           <input type="text" name="fileName" id="fileName" value='invoice.pdf'/>
        </div>
         <input type="submit" id="createPdf" value="Generate Invoice .."/>
 </form>

<?php } ?>

 <!-- jQuery -->
 <script src="js/jquery.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>

 </body>

 </html>
