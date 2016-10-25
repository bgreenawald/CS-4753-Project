<?php
	session_start();
	$quantity = "";
	$price = number_format(1.00, 2, '.', ',');
	$result = "";
	$emailErr="";
	$emailerror_css="";
	$total = number_format(0.00, 2, '.', ',');

	//Start our database
	$host = "127.0.0.1";
	$name = "user_info";
	$password = "";
	$user = "root";
	$port = 3306;

	$connection = mysqli_connect($host, $user, $password, $name, $port) or die(mysql_error());

	if($connection && !empty($_POST['email'])){
		$email = $_POST['email'];
		$result = mysqli_query($connection, "SELECT * FROM student WHERE email = '$email'");
	}

	function between ($this, $that, $inthat){
	    return before($that, after($this, $inthat));
	};
	function after ($this, $inthat){
	    if (!is_bool(strpos($inthat, $this)))
	    return substr($inthat, strpos($inthat,$this)+strlen($this));
	};
	function before ($this, $inthat){
	    return substr($inthat, 0, strpos($inthat, $this));
	};

	if (!empty($_POST["quantity"])) {
	   $quantity = $_POST["quantity"];
	   $total = number_format((intval($quantity) * intval($price)), 2, '.', ',');
	  }
	if(!empty($_POST['email'])){
	  	$email = $_POST["email"];
	  
	  if(!preg_match('/@/', $email)){
	        $emailErr = "Email must contain a @";
	        $emailerror_css='border-color:red; border-width:medium';
	    }elseif(!preg_match('/\./', $email)){
	    	$emailErr = "Email must contain a '.' ";
	    	$emailerror_css = 'border-color:red; border-width:medium';
	    }elseif(preg_match('/@/', substr($email, 0, 2))){
	    	$emailErr = "Email name is not long enough";
	    	$emailerror_css = 'border-color:red; border-width:medium';
	    }elseif(!ctype_alpha(substr($email, -2, 2))){
	    	$emailErr = "Email domain contains invalid characters";
	    	$emailerror_css = 'border-color:red; border-width:medium';
	    }elseif(!ctype_alpha(between('@', '.', $email)) || strlen(between('@', '.', $email))<2){
	    	$emailErr = "Website name must be at least 2 characters";
	    	$emailerror_css = 'border-color:red; border-width:medium';
	    }elseif(preg_match('/^@{1}$/',$email)){
	    	$emailErr = "Email cannot contain more than one @";
	    	$emailerror_css = 'border-color:red; border-width:medium';
	    }elseif(mysqli_num_rows($result) == 0){
	    	$emailErr = "Email not found, please register as a student";
	    	$emailerror_css = 'border-color:red; border-width:medium';
	    }else $emailErr ="";
	  }



	if(isset($_POST['purchase'])&& !$emailErr) {
		$_SESSION['email'] = $_POST['email'];
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

		<title>Event1</title>
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
										<h1><font size="10">Event1</font></h1>
									</header>
									<div style="margin:100px; margin-top:0px">
                                        <p style="float: left;padding:25px"><img src="http://archive.thesabre.com/wahoowa/wallpaper/images/vsabres1280.jpg" height="200px" width="250px" border="1px"></p>
                                        <br><br><p>This is the extended description of Event1.  It's a really great event, you should buy a ticket, it will be so great.  Seriously you will really want to come.  words words words Seriously words words words I mean you will love it, I really encourage you to come.  It is only $1 so you should buy it. This is the extended description of Event1.  It's a really great event, you should buy a ticket, it will be so great.  Seriously you will really want to come.  words words words Seriously words words words I mean you will love it, I really encourage you to come.  It is only $1 so you should buy it.</p>
                                    </div>
                                    <div style="margin:150px">
                                    	<form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">
                                        <!--<p style="float:right;">-->
	                                    <table id= "cart" style="width:600px; float:right; margin-top:-100px">
	                                          <thead>
											    <tr>
											      <th colspan="2">Buy Tickets</th>
											    </tr>
											  </thead>
										    <tbody>
										    <tr>
										      <td style="width: 125px"><?PHP echo '$'.$price; ?></td>
										      <td style="width: 475px"><input type="number" id="quantity" name = "quantity" min="1" max="100" value="<?PHP if(isset($_POST['quantity'])) echo htmlspecialchars($_POST['quantity']); ?>" required/>    <input type="submit" value="select quantity" class="button" style="width:5px;height:43px;"></td>
										    </tr>
										  </tbody>
										  <tfoot>
										    <tr>
										      <td>Total</td>
										      <td><?PHP echo ('$'.$total); ?></td>
										    </tr>
										    <tr>
										    	<td>Confirmation Email</td>
										    	<td><input type="text" name="email" id="email" value="<?PHP if(isset($_POST['email']) && !$emailErr) echo htmlspecialchars($_POST['email']); ?>" 
													placeholder="<?PHP if($emailErr) echo $emailErr; else echo "Email"; ?>"
													style="<?php echo $emailerror_css; ?>"
													required/>
												</td>
										    </tr>
										  </tfoot>
										</table>
										<p style="float:left; margin-top:-50px"><ul>
                                    		<li>Location: Rice Hall</li>
                                    		<li>Date/Time: Somwhere @sometime</li>
                                    	</ul>
                                    	</p>
										<p>
							
										</form>

										<?php if(isset($email) && !$emailErr) : ?>
											<form id="myContainer" action="startPayment.php" method="POST">
										    <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>"/>
										    Camera:<input type="text" name="camera_amount" value="<?php echo($_POST['quantity']);?>" readonly></input><br>
										    Tax:<input type="text" name="tax" value="0" readonly></input><br>
										    Insurance:<input type="text" name="insurance" value="0" readonly></input><br>
										    Handling:<input type="text" name="handling_fee" value="0" readonly></input><br>
										    Est. Shipping:<input type="text" name="estimated_shipping" value="0" readonly></input><br>
										    Shipping Discount:<input type="text" name="shipping_discount" value="0" readonly></input><br>
										    Total:<input type="text" name="total_amount" value="0" readonly></input><br>
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
										<?php endif; ?>
							
                                    </div>
								
							</section>
							
			<!-- CTA -->
				<section id="cta">

					<footer>
						<ul class="buttons">
							<li><a href="Browse.html" class="button special">Back to Browsing</a></li>
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
