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
		<title>Browse</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
									<div style="margin:100px">
										<style>
											table, th, td {
    											border: 1px solid black;
											}
											th, td {
											    padding: 15px;
											    text-align: center;
											}
										</style>
										<table ><!--style="float:right"-->
											<thead>
											    <tr>
											      <th>Event </th>
											      <th>Description</th>
											      <th> Date/time</th>
											      <th>Location</th>
											      <th>Price</th>
											    </tr>
											  </thead>
											  <tbody>
											    <tr>
											      <td><a href="Event1.php">Shoot for the Moon    </a></td>
											      <td>Gamma Phi Betas philanthropy 5 on 5 soccer tournament.</td>
											      <td>November 30th, 2-5 pm</td>
											      <td>Mad Bowl</td>
											      <td>$1.00</td>
											    </tr>
											    <tr>
											      <td><a href="Event2.php">ACM presents Abhi Shelat   </a></td>
											      <td>The Association for Computing Machinery is hosting a talk from associate professor Abhi Shelat. Professor Shelat will be talking how his post-graduate life ...</td>
											      <td>Decemer 7th, 5-6 pm </td>
											      <td>Olsson</td>
											      <td>$1.00</td>
											    </tr>
											    <tr>
											      <td><a href="AddamsFamily.php">The Addams Family </a></td>
											      <td>The latest production of FYP</td>
											      <td>November 19th, 7 pm</td>
											      <td>Student Activities Center</td>
											      <td>$1.00</td>
											    </tr>
											    </tbody>
										</table>
									<p> * Must be signed in to view event pages</p>
									</div>
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