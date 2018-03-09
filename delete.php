<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pizzadb", $con);
$sql="DELETE FROM food WHERE id='".$_GET['id']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
else
	header("Location: http://localhost/p/Admin/display.php");
mysql_close($con)

?> 