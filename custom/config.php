<?php
//mysql_connect("localhost","root","root123");
//mysql_select_db("online");

$connection = mysql_connect("localhost", "", "");
// Selecting Database
$db = mysql_select_db("online", $connection);

?>
