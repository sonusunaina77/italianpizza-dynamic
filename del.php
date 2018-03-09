<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pizzadb", $con);
$sql="DELETE FROM orders WHERE name='".$_POST['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
else
	header("Location: http://localhost/p/Admin/display2.php");
mysql_close($con)

?> 