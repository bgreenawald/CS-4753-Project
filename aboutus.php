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
		<title>About Us</title>
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
										<h1><font size="10">About Us</font></h1>
									</header>
									<span class="image main"><center><img src="images/caplin.jpg" alt="" /></center></span>
									<p style="margin:65px">We are three undergraduate students in the University of Virginia who understand your pain.
									We are active in a variety of clubs at UVA that all have one thing in common: they host events that they want students to show up for.
									We refused to believe that tabling and updating Facebook banner photos were the most effective ways to get students to come to events, 
									so we came up with something better.
									<br> <br>
									Tix on Grounds is a one-stop-shop for finding and purchasing tickets to live events on Grounds hosted by students and student groups. 
									Any CIO or student at UVA can register and post any event right here, for free. And gone are the days where students have to find an organization's
									table on grounds, buy through a friend, or show up at the door with hopes that the event isn't sold out. Now, students can purchase their
									tickets right here with our secure payment system.
									<br> <br>
									As Wahoos ourselves, we built this website for students of UVA. In fact, our logo is based on the classic virginia 'V' that can be seen sported by UVA students everywhere. But Tix on Grounds is more than just a website; it is a framework. The problem
									of connecting students to student led events is one that plagues Universities across the nation. For more information about Tix on Grounds, or advice on how to implement this framework at your own university,
									please reach out to us. 
									<br><br><br>
									Contact us: ac8pn@virginia.edu, cap4yf@virginia.edu, bhg5yd@virginia.edu</p>
								</div>
								
							</section>
					</div>
							
			<!-- CTA -->
				<section id="cta">

					<footer>
						<ul class="buttons">
							<li><a href="student_sign_in.php" class="button special">Sign Up</a></li>
						</ul>
					</footer>
				</section>
			<!-- Footer -->
				<!-- Footer -->
					<footer id="footer">
						<!--<div class="inner">-->
							<ul class="copyright">
								<li>Tix On Grounds</li>
								<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
								
							</ul>
						
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