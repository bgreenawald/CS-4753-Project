<?php
	include('apiCallsData.php');
?>


<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
	<head>
		<title>Sign In</title>
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
				<a href="index.html"><img src = images/4753logo.png></a>
				<nav id="nav">
					<ul>
						<li class="current"><a href="index.html">Home</a></li>
						<li class="current"><a href="aboutus.html">About Us</a></li>
						<li><<a href="student_sign_in.php" class="button special">Sign Up</a></li>
					</ul>
				</nav>
			</header>
			
			<!-- Main -->
			<center>
				<div id="main" class="alt"></div>
					<h3> You have successfully signed up!</h3>
					<?php
						// the message
						$msg = "First line of text\nSecond line of text";

						// use wordwrap() if lines are longer than 70 characters
						$msg = wordwrap($msg,70);
						
						// send email
						mail("bgreenawald@gmail.com","My subject",$msg);
						echo "sending";
					?>
					<br><br>
				</div>
			</center>
			
			<center>
			    <div>
			        <a href="#" class = "button special">Browse Events! </a>
					<a href="aboutus.html" class = "button special">Learn more!</a>
			        <br><br><br>
			    </div>
			</center>

			<form id="myContainer" action="startPayment.php" method="POST">
			    <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>"/>
			    Camera:<input type="text" name="camera_amount" value="300" readonly></input><br>
			    Tax:<input type="text" name="tax" value="5" readonly></input><br>
			    Insurance:<input type="text" name="insurance" value="10" readonly></input><br>
			    Handling:<input type="text" name="handling_fee" value="5" readonly></input><br>
			    Est. Shipping:<input type="text" name="estimated_shipping" value="2" readonly></input><br>
			    Shipping Discount:<input type="text" name="shipping_discount" value="-2" readonly></input><br>
			    Total:<input type="text" name="total_amount" value="320" readonly></input><br>
			    Currency:<input type="text" name="currencyCodeType" value="USD" readonly></input><br>
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
				
			

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="copyright">
								<li>&copy; Tix on Grounds</li>
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