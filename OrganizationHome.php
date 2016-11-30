<?php
    if (session_id() == "")
        session_start();
        
    $inout = "";
	$inoutadd = "";
	if (isset($_SESSION['login_user'])) {
		$inout = "SIGN OUT";
	 	$inoutadd = "signout.php"; 
	} else{
		header('Location: index.php');
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
		<title>Organization Home</title>
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
									<header class="major">
										<h1><font size="10">Hello <?PHP echo $_SESSION['name']; ?>!</font></h1>
										<img src = images/fyp.jpg>
									</header>
	
									<div style="margin:50px" class="table-wrapper">
									<center><h2>Users have left reviews on your recent events!</h2></center>
										<table><!--style="float:right"-->
											<thead>
												<tr>
													<th>User</th>
													<th>Event</th>
													<th>Score</th>
													<th>Review</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Ben Greenawald</td>
													<td>The Addams Family</td>
													<td>4/5</td>
													<td>Some of the best work FYP has done in my time here</td>
												</tr>
											</tbody>
											<tbody>
												<tr>
													<td>Callie Phillips</td>
													<td>The Addams Family</td>
													<td>3.5/5</td>
													<td>A fun way to spend Friday night!</td>
												</tr>
											</tbody>
										</table>
										
                                     	<center><a href="#"><h3>See more reviews!</h3></a></center>
                                    </div>
                       
									<div>
										<ul class="buttons">
											<center><li><a href="#" style = "margin-bottom:10px" class="button special">Post some new events</a></li></center>
										</ul>
									</div>
									
								</div>
								
							</section>
						
						
			<!-- CTA -->
				<section id="cta">
					<footer>
						<ul class="buttons">
							<li><a href="Browse.php" class="button special">Browse Events</a></li>
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