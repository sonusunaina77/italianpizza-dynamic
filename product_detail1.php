<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Product Details</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		
		<!-- bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">      
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="css/main.css" rel="stylesheet"/>
		<link href="css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>				
		<script src="js/superfish.js"></script>	
		<script src="js/jquery.scrolltotop.js"></script>
		<script src="js/jquery.fancybox.js"></script>
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
			
				<h4><span>Details:</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span10">
						<div class="row">
                        <?php
						  $id = $_GET['id'];
						  
						  echo $id;
						  $query = mysql_query("SELECT * FROM food WHERE id = $id") ;
						  if($query === FALSE) { 
                            die(mysql_error()); // TODO: better error handling
                              }

						  $data = mysql_fetch_array($query);
						?>
							<div class="span4">
								<?php echo '<img  src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'" width = "400px" height = "300px"/>'; ?>												
							</div>
							<div class="span5">
								<address>
									<?php echo '<strong>Name : </strong> <span> '.$data['name'].' </span><br>
									<strong>Description : </strong> <span> '.$data['des'].' </span><br>	
									<strong>Category : </strong> <span> '.$data['category'].' </span><br>'; ?>							
								</address>									
								<?php echo '<h4><strong>Price : Rs. '.$data['price'].'</strong></h4>'; ?>
							</div>
							<div class="span5">
                                <?php echo '<a class="btn btn-success" href="cart.php?add='.$data['id'].'" class="category"><h4>Add To Cart</h4></a>'; ?>
							</div>							
						</div>
                        <br>
						
					</div>
					
				</div>
			</section>
            			
			
		</div>
		<script src="js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
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