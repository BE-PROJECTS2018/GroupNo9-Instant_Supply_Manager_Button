<?php
include('../../session.php');
$sql = "DELETE FROM cart WHERE usern = '$user_check'";

            $retval = mysql_query( $sql, $connection );

            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
               header("Refresh: 1.9;url=index.php");
            }
            else{
              echo "CART IS EMPTY NOW";
              header("Refresh: 1;url=../index.php");
            }

            ?>
