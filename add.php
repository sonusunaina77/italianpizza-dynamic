<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=int], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}


input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<form action="insert.php" method="post">
<div><label for="name">oname</label><input type="text" name="name"/></div>
<div><label for="price">address</label><input type="text" name="price"/></div>
<div><label for="des">email</label><input type="text" name="des" /></div>
<div><label for="category">phone</label><input type="int" name="category" /></div>
<div><label for="category">name</label><input type="text" name="category" /></div>
<div><label for="category">quantity</label><input type="int" name="category" /></div>
<div><label for="category">total</label><input type="int" name="category" /></div>
<div><label for="category">order_time</label><input type="int" name="category" /></div>
<input type="submit" id="btn" value="submit"  />
</form>
</body>
</html>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pizzadb", $con);
$sql="INSERT INTO `orders` (oname, address,email,phone,id,name,quantity,total,order_time)
VALUES
('$_POST[oname]','$_POST[address]','$_POST[email]','$_POST[phone]','$_POST[id]','$_POST[name]','$_POST[quantity]','$_POST[total]','$_POST[order_time]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
else
	header("Location: http://localhost/p/Admin/display2.php");
mysql_close($con)
?> 