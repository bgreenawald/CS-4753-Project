<?php
    if (session_id() == "")
        session_start();
        
    $inout = "";
	$inoutadd = "";
	if (isset($_SESSION['login_user'])) {
		$inout = "SIGN OUT";
	 	$inoutadd = "signout.php"; 
	} else{
		header('Location: Browse.php');
		$inoutadd = "signin.php";
		$inout = "SIGN IN";
	}

	$quantity = "";
	$price = number_format(1.00, 2, '.', ',');

	$total = number_format(0.00, 2, '.', ',');

	//Start our database
	$host = "127.0.0.1";
	$name = "user_info";
	$password = "";
	$user = "root";
	$port = 3306;

	$connection = mysqli_connect($host, $user, $password, $name, $port) or die(mysql_error());

	if (!empty($_POST["quantity"])) {
	   $quantity = $_POST["quantity"];
	   $total = number_format((floatval($quantity) * floatval($price)), 2, '.', ',');
	}


	$connection->close();

?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>

		<title>Event2</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header" class="alt">
					<a href="index.php"><img src = images/4753logo.png></a>
					<nav id="nav">
						<ul>
							<li class="current"><a href="index.php">Home</a></li>
							<li class="current"><a href="aboutus.php">About Us</a></li>
							<li class="current"><a href="<?PHP echo $inoutadd;?>"><?PHP echo $inout; ?></a></li>
							<li><a href="student_sign_in.php" class="button special">Sign Up</a></li>
						</ul>
					</nav>
				</header>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1><font size="10">ACM presents Abhi Shelat</font></h1>
									</header>
									<div style="margin:100px; margin-top:0px">
                                        <p style="float: left;padding:25px"><img src="images/abhi.jpeg" height="200px" width="250px" border="1px"></p>
                                        <br><br><p>The Association for Computing Machinery is hosting a talk from associate professor Abhi Shelat. Professor Shelat will be talking how his post-graduate life applying his computational skills to the financial markets, and his recent works in applying cryptography to create secure and anonymous polls. </p>
                                    </div>
                                    <div style="margin:150px">
                                    	<form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">
                                        <!--<p style="float:right;">-->
	                                    <table id= "cart" style="width:600px; float:right; margin-top:-100px">
	                                          <thead>
											    <tr>
											      <th colspan="2"><stong>Buy Tickets<stong></th>
											    </tr>
											  </thead>
										    <tbody>
										    <tr>
										      <td style="width: 125px"><?PHP echo '$'.$price; ?></td>
										      <td style="width: 475px"><input type="number" id="quantity" name = "quantity" min="1" max="100" value="<?PHP if(isset($_POST['quantity'])) echo htmlspecialchars($_POST['quantity']); ?>" required/>    </td>
										    </tr>
										  </tbody>
										  <tfoot>
										    <tr>
										      <td>Total</td>
										      <td><?PHP echo ('$'.$total); ?></td>
										    </tr>
										    <tr>
										    	<td></td>
										    	<td><input type="submit" value="select quantity" class="button" ></td>
										    </tr>
										  </tfoot>
										</table>
										<p style="float:left; margin-top:-50px"><ul>
                                    		<li>Location: Olsson Hall</li>
                                    		<li>Date/Time: December 7th, 5-6 pm</li>
                                    	</ul>
                                    	</p>
                                    	</form>

                                    	<form id="myContainer" action="startPayment.php" method="POST">
										    <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>"/>
										    <input type="hidden" name="camera_amount" value="<?php echo($_POST['quantity']);?>" readonly></input><br>
										    <input type="hidden" name="tax" value="0" readonly></input><br>
										    <input type="hidden" name="insurance" value="0" readonly></input><br>
										    <input type="hidden" name="handling_fee" value="0" readonly></input><br>
										    <input type="hidden" name="estimated_shipping" value="0" readonly></input><br>
										    <input type="hidden" name="shipping_discount" value="0" readonly></input><br>
										    <input type="hidden" name="total_amount" value="0" readonly></input><br>
										    <input type="hidden" name="currencyCodeType" value="USD" readonly></input><br>
										</form>
                               
											<script type="text/javascript">
											   window.paypalCheckoutReady = function () {
											       paypal.checkout.setup('Your merchant id', {
											           container: 'myContainer', //{String|HTMLElement|Array} where you want the PayPal button to reside
											           environment: 'sandbox' //or 'production' depending on your environment
											       });
											   };
											</script>
											<script src="//www.paypalobjects.com/api/checkout.js" async></script>
							</div>
                                    
								
							</section>
							
			<!-- CTA -->
				<section id="cta">

					<footer>
						<ul class="buttons">
							<li><a href="Browse.php" class="button special">Back to Browsing</a></li>
						</ul>
					</footer>

				</section>

			<!-- Footer -->
				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="copyright">
								<li>Tix On Grounds</li>
								<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
								
							</ul>
						</div>
					</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
