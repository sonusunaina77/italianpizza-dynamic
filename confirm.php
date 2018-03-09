<?php
include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Checkout</title>
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
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
	
		<h1 align = "center" >
<table align ="center">
<tr>
<td><a href ="pizzasite.html"><img src ="italian pizza/home.gif" height="80" width="200" id ="nav"></a></td><td><a href="italian pizza/menu.html"><img src ="italian pizza/menu.gif" height="60" width="200" id ="nav"></a></td>
<td><img src="italian pizza/Italian_Pizza.gif" height="270" width="270"></td>
<td><a href ="products1.php"><img src ="italian pizza/order.gif" height="60" width="200" id ="nav"></a></td>
<td><a href="italian pizza/contactus.html"><img src ="italian pizza/contactus.gif" height="63" width="240" id = "nav"></a></td>
</tr>
</table> 
</h1>
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
				<h4><span><br> Your Order Has Been Confirmed!!! <br><br>It will be out for delivery soon...</span></h4>
			</section>	
<script src="js/common.js"></script>	
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
<?php

$i=1;
								foreach($_SESSION as $name => $value){
									if($value > 0)
									{
										if(substr($name, 0, 5) == 'cart_')
										{
											$id = substr($name, 5, (strlen($name)-5));
											$get = mysql_query("SELECT * FROM food WHERE id='$id'");
											 $date = date('Y-m-d H:i:s');
											while($get_row = mysql_fetch_assoc($get)){
												$sub = $get_row['price'] * $value;
												$idBarang = $get_row['id'];
												
                                               
												$oname = $_POST["name"];
												$address = $_POST["address"];
												$email = $_POST["email"];
												$phone = $_POST["phone_number"];
												$name = $get_row['name'];
												
												$q = "INSERT INTO orders(oname,address,email,phone,name,quantity,total,order_time) values('$oname','$address','$email','$phone','$name','$value','$sub','$date')";
												mysql_query($q);

												

												$i++;
											}		
										}
										@$total += $sub;
									}
								}
                        ?>
