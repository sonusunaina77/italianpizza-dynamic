<?php
if( !( $db = mysql_connect( 'localhost' , 'root' , '' ) ) )
    die( 'Failed to connect to MySQL Database Server - #'.mysql_errno().': '.mysql_error());
if( !mysql_select_db( 'pizzadb' ) )
    die( 'Connected to Server, but Failed to Connect to Database - #'.mysql_errno().': '.mysql_error());
  $selectSQL = 'SELECT * FROM food';
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
<td><img src="logo.gif" height="150" width="160"></td>
</table>
<h1 align = "center">Item Details</h1>

<input type = "button"  class = "button" value="add" onclick="window.location = 'additem.html';">
<table border="2" class="w3-table w3-white">
  <thead>
    <tr>
      <th>image</th>
      <th>name</th>
      <th>price</th>
      <th>description</th>
	  <th>category</th>
	  <th>Update</th>
	  <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysql_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_assoc( $selectRes ) ){
		  $pid = $row["id"];
		  echo '
												<tr>
												<td><img alt="" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="200" height="200" ></td>
												<td>'.$row['name'].'</td>
												<td>'.$row['price'].'</td>
												<td>'.$row['des'].'</td>
												<td>'.$row['category'].'</td>
												<td><a href= "update.php?id='.$pid.'">Edit</a></td>
												<td><a href= "delete.php?id='.$pid.'">Delete</a></td>
												</tr>';
												
												
		}
      }
    ?>
  </tbody>
</table>
<br>
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