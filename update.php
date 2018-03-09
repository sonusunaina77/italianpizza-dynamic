<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pizzadb", $con);



if(count($_POST)>0) {
	if($_FILES["imageUpload"]["tmp_name"] == ""){
			$sql = "UPDATE food set name='" . $_POST["name"] . "', price='" . $_POST["price"] . "', des='" . $_POST["des"] . "', category='" . $_POST["category"] . "' WHERE id='" . $_POST["id"] . "'";

		
	}else{
	$imgData = addslashes (file_get_contents($_FILES["imageUpload"]["tmp_name"]));
	$sql = "UPDATE food set name='" . $_POST["name"] . "', price='" . $_POST["price"] . "', des='" . $_POST["des"] . "', image='" . $imgData . "', category='" . $_POST["category"] . "' WHERE id='" . $_POST["id"] . "'";
	}
	if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
else
	header("Location: http://localhost/p/Admin/display.php");
	
	$message = "Record Modified Successfully";
}
  $select_query = "SELECT * FROM food WHERE id='" . $_GET["id"] . "'";
$result = mysql_query($select_query,$con);
$row = mysql_fetch_assoc($result);




?> 



<html><br/><br/><br/>
<style>
@import url(https://fonts.googleapis.com/css?family=Cabin+Sketch:700|Patrick+Hand+SC|Waiting+for+the+Sunrise);
body{
  font-family:Patrick Hand SC;
  font-size:25px;
  background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSs5FtRG4p7xaINAsAJvCHPI6pwOsn3_SIupRyiZxWtG9ubWAzm');
  background-size:cover;
}
h1{
  font-family:Cabin Sketch;
  font-size:50px;
}
form{
  background-color:#211e1e;
  color:white;
  border-radius:5px;
  height:auto;
  width:450px;
}
#wrapper{
  margin-top:-50px;
 float:center;
}
input{
  font-family:Waiting for the Sunrise;
  font-size:17px;
  font-weight:bold;
}
</style>
<body>

<div id="inputs">
<div id ="wrapper">
<center><form action="" method="post" enctype = "multipart/form-data">
<h1>item details</h1>
<div><input type="hidden" name="id" value= "<?php echo $row['id']; ?>"/></div>

<div><label for="name">name</label><input type="text" name="name" value= "<?php echo $row['name']; ?>"/></div>
<div><label for="price">price</label><input type="text" name="price"  value= "<?php echo $row['price']; ?>" /></div>
<div><label for="des">des</label><input type="text" name="des"  value= "<?php echo $row['des']; ?>" /></div>
<div><label for="category">category</label><input type="int" name="category"   value= "<?php echo $row['category']; ?>" /></div>
<div><label for="image">image</label><input type="file" name="imageUpload" id="imageUpload" value = ""></div><br/>
<input type="submit" id="btn" value="Submit" name = "submit"  />
</form>
</body>
</html>