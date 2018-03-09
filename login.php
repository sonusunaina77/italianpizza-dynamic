<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("pizzadb");
  if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
     //echo "select * from login where username = '$username' and password = '$password'";
	// exit();
   $p = mysql_query("select * from login where username = '$username' and password = '$password'");

  if(mysql_num_rows($p) > 0){
	header("location:buttons.html");
}
else{
	echo "incorrect Username or password";
}
  }
?>

<html>

<style>

html {
    height: 100%;

    /* The image used */
    background-image: url("download.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
#btn{
    color: #fff;
    background: #337ab7;
    padding: 5px;
    margin-left: 69%;
}	
p.thicker{
	font-weight: 900;
}
.large
{
    height:25px;
    font-size:10pt;
}
</style>
<table align = "left">
<td><img src="logo.gif" height="270" width="270"></td>
</table>
<head>
    <title>Login page</title>
	
	<h1 align = "center" >Admin Login</h1>
</head>
<table align = "center">
<div class = "frm">
<body>
    
	    <form action="" method="POST" >
		    <tr><td><p class = "thicker">
			<label>Username</label>
        <input  type="textbox" placeholder="Username" name = "username" class = "large" id = "user">
        <span class="pure-form-message"></span></p></td></tr>

			<tr><td><p class = "thicker">
			    <label>Password</label>
        <input id="password" type="password" name = "password" placeholder="Password" class = "large" id = "pass">
			</p></td></tr>
			<td><p>
			    <input type="submit" name = "submit" id="btn" value="Login"  />
			</p></td>
		</form>
</body>
</div>
</html>
			    