<?php
    /*
        * Cancel Order page
    */

    if (session_id() == "")
        session_start();

$inout = "";
$inoutadd = "";
if (isset( $_SESSION['login_user'] )) {
	$inout = "SIGN OUT";
 	$inoutadd = "signout.php"; 
} else{
	$inoutadd = "signin.php";
	$inout = "SIGN IN";
}


    
    $arr = $_SESSION["error"];
    
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
                    <div class="col-md-4">
                        <div class="alert alert-danger" role="alert">                    
                            <p class="text-center"><strong>The payment could not be completed.</strong></p>
                        </div>

                        <br />
                        <strong>Reason: </strong> <?php echo $arr["json"]["name"]; ?> <br />
                        <br />
                        <strong>Message: </strong> <?php echo $arr["json"]["message"]; ?> <br />
                        
                        <br />
                        <br />

                        Return to <a href="index.php">home page</a>.
                    </div>
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