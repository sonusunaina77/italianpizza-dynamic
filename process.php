<?php
    $username = $_POST['user'];
	$password = $_POST['pass'];
	
	$username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);	
	
	
	mysql_connect("localhost",  "root", "");
	mysql_select_db("pizzadb");
	
	$result = mysql_query("select * from login where username = '$username' and password =  '$password'")
	             or die("Failed to query database ".mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password ){
	    header("Location: http://localhost/p/Admin/buttons.html");
	} else{
	    echo "failed to login!";
	}
 ?>