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
									</header>
									<div style="margin:100px; margin-top:0px">
									<h2>Based on your previous purchases, We suggest this event:</h2>
										<a href="Event2.php"><h2 style="margin-left:50px; margin-bottom:-20px">Event2</h2>
                                        <p style="float: left;padding:25px; "><img src="http://archive.thesabre.com/wahoowa/wallpaper/images/vsabres1280.jpg" height="200px" width="250px" border="1px"></p>
                                        <br><p style="width:75%;">Description: <br>Event 2 will involve a more complex demonstration of some sort or something<br>Review:<br>
                                        "If you liked Event 1, you'll REALLY like Event 2.  Honestly has all the great aspects that Event 1 had, but even better.  You will receive a much deeper understanding and ... "</p>
                                    	</a>
                                    </div>
									<div style="margin:100px">
										<h2>Browse More Events</h2>
										<table>
											<thead>
											    <tr>
											      <th scope="col" >Event </th>
											      <th scope="col">Description</th>
											      <th scope="col"> Date/time</th>
											      <th scope="col">Location</th>
											      <th scope="col">Price</th>
											    </tr>
											  </thead>
											  <tbody>
											    <tr>
											      <td><a href="Event1.php">Event1    </a></td>
											      <td>Event 1 will involve a demonstration of some sort or something</td>
											      <td>Some day @ some time</td>
											      <td>Rice</td>
											      <td>$1.00</td>
											    </tr>											    <tr>
											      <td><a href="Event2.php">Event2    </a></td>
											      <td>Event 2 will involve a more complex demonstration of some sort or something</td>
											      <td>Some day @ some time</td>
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