<?php
    /*
        * Home Page - has Sample Buyer credentials, Camera (Product) Details and Instructiosn for using the code sample
    */
    include('apiCallsData.php');
    include('paypalConfig.php');

    //setting the environment for Checkout script
    if(SANDBOX_FLAG) {
        $environment = SANDBOX_ENV;
    } else {
        $environment = LIVE_ENV;
    }

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
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Tix on Grounds </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="index">
		<div id="page-wrapper">

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

			<!-- Banner -->
				<section id="banner">

					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					<div class="inner">
						
						<header>
							<h2>Tix on Grounds</h2>
						</header>
						<p>This is <strong>the ticket seller</strong>
						<br />
						for student group 
						<br />
						<a href="http://html5up.net">live events</a></p>
						<footer>
							<ul class="buttons vertical">
								<li><a href="#main" class="button fit scrolly">Tell Me More</a></li>
							</ul>
						</footer>

					</div>

				</section>

			<!-- Main -->
				<article id="main">

					<header class="special container">
						<h2>We want you to buy and sell tickets conveniently.
						<br />
						Every show needs an audience</h2>
						<p>Students deserve a centralized ticket purchasing avenue for student run events on Grounds.
						<br />
						We offer our website to host and find events on Grounds to revel in for your entertainment.
						<br />
						</p>
					</header>

					

					<!-- One -->
						<section class="wrapper style1 container special">
							<div class="row">
								<div class="4u 12u(narrower)">

									<section>
										<span class="icon featured fa-check"></span>
										<header>
											<h3>Post Your Events</h3>
										</header>
										<p>Need to get the word out? Get your events seen by the student body.</p>
									</section>

								</div>
								<div class="4u 12u(narrower)">

									<section>
										<span class="icon featured fa-check"></span>
										<header>
											<h3>Find Events</h3>
										</header>
										<p>Don't leave your calender empty. Find the best student run events at UVA, right here.</p>
									</section>

								</div>
								<div class="4u 12u(narrower)">

									<section>
										<span class="icon featured fa-check"></span>
										<header>
											<h3>Get Your Tickets</h3>
										</header>
										<p>Have an event you want to attend? Need do sell the last few tickets to your upcoming event?
										Tickets can be bought and sold at your fingertips.</p>
									</section>

								</div>
							</div>
						</section>

					<!-- Two -->
						<section class="wrapper style3 container special">

							<header class="major">
								<h2>The best events that UVA has to offer</h2>
							</header>

							<div class="row">
								<div class="6u 12u(narrower)">

									<section>
										<a class="image featured"><img src="images/hamlet.jpg" alt="" /></a>
										<header>
											<h3>Theatre</h3>
										</header>
										<p>Anywhere from Shakespeare, to musicals, to your favorite play you read in high school.</p>
									</section>

								</div>
								<div class="6u 12u(narrower)">

									<section>
										<a class="image featured"><img src="images/hoos.jpg" alt="" /></a>
										<header>
											<h3>A Capella</h3>
										</header>
										<p>Hear the dozens of a capella groups that the university has to offer. No instruments required.</p>
									</section>

								</div>
							</div>
							<div class="row">
								<div class="6u 12u(narrower)">

									<section>
										<a class="image featured"><img src="images/zta.jpg" alt="" /></a>
										<header>
											<h3>Philanthropy</h3>
										</header>
										<p>Hoo's ready to use their resources for those who need it?</p>
									</section>

								</div>
								<div class="6u 12u(narrower)">

									<section>
										<a class="image featured"><img src="images/lawn_party.jpg" alt="" /></a>
										<header>
											<h3>Social</h3>
										</header>
										<p>A little party never killed nobody.</p>
									</section>

								</div>
							</div>
						</section>

				</article>

			<!-- CTA -->
				<section id="cta">

					<header>
						<h2>Ready to jump right in?</h2>

					</header>
					<footer>
						<ul class="buttons">
							<li><a href="post.php" class="button special">Post Event</a></li>
							<li><a href="Browse.php" class="button special">Find Events</a></li>
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
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>