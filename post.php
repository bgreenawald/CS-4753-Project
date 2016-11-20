<?php 
    if (session_id() == "")
        session_start();
        
    $inout = "";
	$inoutadd = "";
	if (isset($_SESSION['login_user'])) {
		$inout = "SIGN OUT";
	 	$inoutadd = "signout.php"; 
	} else{
		$inoutadd = "signin.php";
		$inout = "SIGN IN";
	}
?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
	<head>
		<title>Post an Event</title>
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
			<center>
				<div id="main" class="alt"></div>
				<div style="margin-right:150px;margin-left:150px; font-size: 25px;">
					<p>Organizations that wish to post an event on <i>Tix on Grounds</i> should email us at <underline>tixongrounds@gmail.com</underline>.	</p>
					<p>Within the email, include your Organization's name, a picture for the event (if relevent), the event name, time, location, ticket cost and extended description.</p>
					<p>You must have a Tix on Grounds Organization account to post events.</p>
					<br><br>
				</div>
			</center>
			
			<center>
			    <div>
			        <a href="Browse.php" class = "button special">Browse Events! </a>
					<a href="aboutus.php" class = "button special">Learn more!</a>
			        <br><br><br>
			    </div>
			</center>
			

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