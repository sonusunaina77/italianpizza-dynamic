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
	<script>
	
		function CheckPhone() {
  var flag = true;
  var obj = document.getElementById('divPhone');
  document.getElementById("phone").style.visibility = "hidden";
  obj.innerHTML = '';
  if (info.length < 10 || info.length >10) {document.getElementById("phone").style.visibility = "visible"; flag = false; }
  return flag;
}
	
	</script>
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
				<h4><span>Check Out</span></h4>
			</section>	
			<section class="main-content">
				<div class="row">
					<div class="span12">
                    	<form name="selesai" action="confirm.php" method="post">
                          <div class="row-fluid">
                                <div class="span6">
                                    <h4>Enter your details:</h4>
                                    <div class="control-group">
                                        <label class="control-label">Name</label>
                                        <div class="controls">
                                            <input type="text" required placeholder="Name" name="name" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Address</label>
                                        <div class="controls">
											<textarea required  placeholder="Address" name="address" class="input-xlarge"> </textarea>
                                        </div>
                                    </div>					  
                                    <div class="control-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <input type="email" required placeholder="Email" name="email" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Phone Number</label>
                                        <div class="controls">
                                            <input type="tel" required placeholder="phone number" name="phone_number" class="input-xlarge">
											<p hidden id= "phone">*Invalid Phone Number</p>
										</div>
                                    </div>
                                    <button type="submit" name="confirm" class="btn btn-primary" onsubmit = "CheckPhone()">Confirm Order!</button>
                                </div>
                                </form>
                                <div class="span5">
                                    <h4>Order Summary:</h4>
                                    <div class="block">																
                                        <ul class="small-product">
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
                                                                <li>
                                                                    <h5>'.$i.' .  '.$get_row['name'].'&nbsp; &nbsp; &nbsp; '.$value.' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SubTotal : Rs. '.$sub.'</h5>
																	
																</li>';
												$i++;
											}		
										}
										@$total += $sub;
									}
								}
                                              ?>
                                              <?php echo '<h5 style="color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total : Rs. '.@$total.' </h5>'; ?>
                                        </ul>
                                    </div>
                                </div>          
               
                          </div>
                          <input type="hidden" value="<?php echo abs((int)$_GET['total']); ?>" name="total">
                          				
					</div>
				</div>
			</section>			
			
		</div>
		<script src="themes/js/common.js"></script>
    </body>
</html>