<?php
if( !( $db = mysql_connect( 'localhost' , 'root' , '' ) ) )
    die( 'Failed to connect to MySQL Database Server - #'.mysql_errno().': '.mysql_error());
if( !mysql_select_db( 'pizzadb' ) )
    die( 'Connected to Server, but Failed to Connect to Database - #'.mysql_errno().': '.mysql_error());
  $selectSQL = 'SELECT * FROM orders';
  if( !( $selectRes = mysql_query( $selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
	  ?>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<p align = "left"><a href="buttons.html"> <img src="home.png" height="30" width="30"></a></p>
<table align = "center">

<td><img src="logo.gif" height="270" width="270"></td>
</table>

<h1 align = "center">Order Details</h1>
<table border="2"  class="w3-table w3-black">
  <thead>
    <tr>
      <th>order_id</th>
      <th>oname</th>
	  <th>address</th>
	  <th>email</th>
	  <th>phone</th>
	  <th>name</th>
	  <th>quantity</th>
	  <th>total</th>
	  <th>order_time</th>
	  <th>Remove</th>
	  
	  
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysql_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="0">No Rows Returned</td></tr>';
      }
	  else{
		   while( $row = mysql_fetch_assoc( $selectRes ) ){
			    $pid = $row["order_id"];
          echo "<tr><td>{$row['order_id']}</td><td>{$row['oname']}</td><td>{$row['address']}</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['name']}</td><td>{$row['quantity']}</td><td>{$row['total']}</td><td>{$row['order_time']}</td>\n";
		  echo '<td><a href= "delete1.php?order_id='.$pid.'">Delete</a></td></tr>';
        }
		 
   
							
      }
    ?>
  </tbody>
</table>

<style>
.button {
    background-color: 708090;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
body, html {
   

    /* The image used */
    background-image: url("download.jpg");

    /* Full height */
    

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

</style>
<?php
  }


?>
