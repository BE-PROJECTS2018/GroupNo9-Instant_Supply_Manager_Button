<?php
include('../../session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pierceman Electronics</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom CSS -->
    <link href="../css/shop-item.css" rel="stylesheet">
    <script>
    function goBack() {
        window.history.back();
    }
    </script>


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Pierceman Electronics</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="Mobile/index.php">Mobiles</a>
                    </li>
                    <li>
                        <a href="Laptop/index.php">Laptops</a>
                    </li>
                    <li>
                        <a href="ACCESORIES/index.php">Accesories</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">DEFAULT PAYMENT MODE</p>
                <div class="list-group">
                    <a href="#" class="list-group-item" onclick="goBack()">BACK</a>
                    <a href="" class="list-group-item active"><?php echo $user_check ?></a>
                    <a href="../custom.php" class="list-group-item">BACK TO LIST</a>
                    <a href="../../logout.php" class="list-group-item">LOGOUT</a>
                </div>
            </div>

            <div class="col-md-9">
<?php
$seli=mysql_query("select name,email,phone,addr from register where username='$user_check'");
 while($arr=mysql_fetch_array($seli))
{
  $result=mysql_query("SELECT count(item) from cart where usern='$user_check'");
  $data=mysql_fetch_assoc($result);

  echo "
  <center>
  <fieldset style='width:50%'><table border='0' >";

  echo "
  <tr>
  <td >
  <b><font face='Lucida Sans Unicode' size='+1'>".$arr['name']."</b>
  <br><b>Email : </b>&nbsp;".$arr['email']."
  <br><b>Phone no. : </b>".$arr['phone']."
  <br><b>Address : <br></b>".$arr['addr']."<hr>
  </font>
  </td></tr>

  </font></td></tr></table></fieldset></center><hr>";
}
 ?>

 <div  class="form">
   <form id="orderform" name="orderform" method="post" action="list_inv.php">
     <div class="form-group">
    <b><label for="bank">BANK</label></b>
    <select class="form-control" id="bank" name="bank" required>
      <option value="SBI" selected="selected">Select Bank..</option>
     <option value="SBI">SBI</option>
     <option value="PNB">Punjab National Bank</option>
     <option value="CAN">CANARA BANK</option>
     <option value="UNO">UNION BANK</option>
     <option value="IOB">INDIAN OVERSEAS BANK</option>
     <option value="others">COD</option>
     </select><br><br>
   </div>
     <div class="form-group">
    <label for="cardn">DEBIT CARD </label>
    <input type="text" class="form-control" id="cardn" name="cardn" required pattern="^[0-9]*$">
    <small id="emailHelp" class="form-text text-muted">We'll never share the cardholder details with anyone else.</small>
  </div>
  <button type="submit" class="btn btn-primary">Payment mode</button>
  </div>
  </form>

</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
