<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pizzadb", $con);
if(isset($_POST['submit'])) {
    $target_dir = "C:/xampp/htdocs/p";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg"); 
	$sql="INSERT INTO `food` (name, price,des,category,image)VALUES('$_POST[name]','$_POST[price]','$_POST[des]','$_POST[category]','$_post[image]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
else
	header("Location: http://localhost/p/Admin/display.php");
}

mysql_close($con)


?> 