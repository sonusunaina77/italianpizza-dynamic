<?php
include('config.php');
session_start();

if(isset($_GET['add'])){
	$id = $_GET['add'];
	$qt = mysql_query("SELECT id FROM food WHERE id='$id'");
	while($qt_row = mysql_fetch_assoc($qt)){
		
			$_SESSION['cart_'.$_GET['add']]+='1';
			header("Location: cart.php");
		
	}
}


if(isset($_GET['remove'])){
	$_SESSION['cart_'.$_GET['remove']]--;
	header("Location: cart.php");
}

if(isset($_GET['delete'])){
	$_SESSION['cart_'.$_GET['delete']]='0';
	header("Location: cart.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>MY CART</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">      
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="css/flexslider.css" rel="stylesheet"/>
		<link href="css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>				
		<script src="js/superfish.js"></script>	
		<script src="js/jquery.scrolltotop.js"></script>
		
	</head>
    <body>		
	
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="products1.php">Veg</a></li>															
							<li><a href="products2.php">Non-Veg</a>
								
							</li>							
							<li><a href="products3.php">Snacks</a></li>
							<li><a href="products4.php">Desserts</a></li>
							<li><a href="cart.php">Cart</a></li>
							
						</ul>
					</nav>
				</div>
			</section>				
			<section class="header_text sub">
				<h4><span>MY CART</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>Cart</strong> Details</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Item</th>
									<th>Item Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
                                    <th>Options</th>
								</tr>
							</thead>
							<tbody>
								
                                <?php 
								$i=1;
								foreach($_SESSION as $name => $value){
									if($value > 0)
									{
										if(substr($name, 0, 5) == 'cart_')
										{
											$id = substr($name, 5, (strlen($name)-5));
											$get = mysql_query("SELECT * FROM food WHERE id='$id'");
											while($get_row = mysql_fetch_assoc($get)){
												$sub = $get_row['price'] * $value;
												$idBarang = $get_row['id'];
												echo '
												<tr>
												<td>'.$i.'</td>
												<td><img alt="" src="data:image/jpeg;base64,'.base64_encode( $get_row['image'] ).'" width="100" height="200" ></td>
												<td>'.$get_row['name'].'</td>
												<td>'.$value.'</td>
												<td>'.$get_row['price'].'</td>
												<td>'.$sub.'</td>
												<td>
													<a href="cart.php?remove='.$id.'"><img src = "images/minus.png" width = "15px" height = "5px"></a> | 
													<a href="cart.php?add='.$id.'"><img src = "images/plus.png" width = "15px" height = "5px"></a> | 
													<a href="cart.php?delete='.$id.'"><img src = "images/delete.png" width = "15px" height = "5px"></a>
												</td>
												<br>
												</tr>';
												$i++;
												$name = $get_row['name'];
												$price = $get_row['price'];
											    mysql_query("INSERT INTO `checkout` (No,Name,price,Quantity,Total)values('$i','$name','$price','$value','$sub')");
											}		
										}
										@$total += $sub;
									}
								}
								
								?>
											  		  
							</tbody>
						</table>
						
						<p class="cart-total right">
							<?php //echo '<strong>Total Cost</strong>: '.@$total.'<br>'; ?>
						</p>
						<hr/>
						<p class="buttons center">	
                        <?php 
							if(@$total == 0){
									echo 'Shopping cart empty!';
									echo '<br>
											<a href="products1.php">Continue Shopping</a>
											
										  </br>
										  <br>';
								} else {
									echo '<strong>Total Cost</strong>: '.@$total.'<br>';
									echo '<a href="products1.php" class="btn" type="button">Continue Ordering</a> ';
									echo '<a href="checkout.php?total='.$total.'" class="btn btn-inverse" type="submit">Checkout</a>';
								}
						?>			
							</p>					
					</div>
					
				</div>
			</section>	
		<script src="js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>	

<div style="color:white;background-color: black;">

  <footer align = "center" >
 follow us :<a href ="https://www.facebook.com/" target ="_blank"> <img src ="italian pizza/facebook.png" height ="50" width ="50"> </a><a href ="https://twitter.com/" target ="_blank"><img src ="italian pizza/twitter.png" height ="50" width ="50"></a><a href="https://www.instagram.com/?hl=en" target ="_blank"><img src ="italian pizza/instagram.gif" height ="50" width ="50"></a><a href ="https://plus.google.com/" target ="_blank"><img src ="italian pizza/googleplus.png" height ="50" width ="50"></a>
  <p>Copyright&copy Italian Pizza
,All rights reserved</p>
  <p>Contact information: <a href="mailto:italianpizza@gmail.com">italianpizza@gmail.com</a>.</p>
</footer>
</div> 
<style>
#nav {
  height: 60px;
 -webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
       -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
          transition: all 1s ease;

  
}

#nav:hover {
    height: 80px;
}

#tilt {
  -webkit-transition: all 0.5s ease;
     -moz-transition: all 0.5s ease;
       -o-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
          transition: all 0.5s ease;
}
 
#tilt:hover {
  -webkit-transform: rotate(+10deg);
     -moz-transform: rotate(+10deg);
       -o-transform: rotate(+10deg);
      -ms-transform: rotate(+10deg);
          transform: rotate(+10deg);
}

</style>		
    </body>
</html>