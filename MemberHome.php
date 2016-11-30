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
		<title>Member Home</title>
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
									</header>
									<div style="margin:100px; margin-top:0px">
									<h2>Based on your previous purchases, We suggest:</h2>
										<a href="AddamsFamily.php"><h2 style="margin-left:50px; margin-bottom:-20px">The Addams Family</h2></a>
                                        <p style="float: left;padding:25px; "><img src="images/addams.jpg" height="200px" width="250px" border="1px"></p><br>
                                        <h4>Description:</h4>The latest production by the First Year Players<br><br><h4>Review:</h4>
                                        "This is the best play that FYP has done in years. It has been really great to see the orgnaization evolve during my time on grounds and this is the best thing they have produced ... "
                                    	
                                    </div>
									<div style="margin:100px">
										<h2>Browse More Events</h2>
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
											      <td>$5.00 per player</td>
											    </tr>											    <tr>
											      <td><a href="Event2.php">ACM presents Abhi Shelat   </a></td>
											      <td>The Association for Computing Machinery is hosting a talk from associate professor Abhi Shelat. Professor Shelat will be talking how his post-graduate life ...</td>
											      <td>Dec 7th, 5-6 pm </td>
											      <td>Olsson</td>
											      <td>$1.50</td>
											    </tr>
											    </tbody>
										</table>
							
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