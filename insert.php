<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pizzadb", $con);
 
    $uploadOk = 1;
   
    
	
	$imgData = addslashes (file_get_contents($_FILES["imageUpload"]["tmp_name"]));
    //storind the data in your database
    $query= "INSERT INTO food (name, price,des,category,image)
VALUES
('$_POST[name]','$_POST[price]','$_POST[des]','$_POST[category]','$imgData')";
   


if (!mysql_query($query,$con))
  {
  die('Error: ' . mysql_error());
  }
else
	header("Location: http://localhost/p/Admin/display.php");
mysql_close($con)
?>