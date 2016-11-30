<?php 
//Connect to the database
include("config.php");
session_start();

//Connect to the database
$host = "127.0.0.1";
$name = "user_info";
$password = "";
$user = "root";
$port = 3306;

$connection = mysqli_connect($host, $user, $password, $name, $port) or die(mysql_error());

//Retrieve Our Information, checking if they have been set
$password = isset($_POST["password"]) ? $_POST["password"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';

$sql="";
$sql2="";
$count=0;
$count2=0;
$result="";
$result2="";

//Null initialize our errors until they are set

$passwordErr = "";
$emailErr = "";
    $inout = "";
	$inoutadd = "";
	if (isset($_SESSION['login_user'])) {
		$inout = "SIGN OUT";
	 	$inoutadd = "signout.php"; 
	} else{
		$inoutadd = "signin.php";
		$inout = "SIGN IN";
	}

$stu = 'unchecked';
$org = 'unchecked';


$selected_radio = isset($_POST['s/o']) ? $_POST['s/o'] : '';

if ($selected_radio == 'student') {
	$stu = 'checked';
}
else if ($selected_radio == 'organization') {
	$org = 'checked';
}

if(isset($_POST['sendfeedback'])) {   
    $myusername = mysqli_real_escape_string($connection,$email);
	$mypassword = mysqli_real_escape_string($connection,$password);

	if($stu == 'checked'){
		$sql = "SELECT * FROM student WHERE email = '$myusername' AND password = '$mypassword'";
		$sql2 = "SELECT * FROM student WHERE email = '$myusername'";
	}else{
		$sql = "SELECT * FROM organization WHERE email = '$myusername' AND password = '$mypassword'";
		$sql2 = "SELECT * FROM organization WHERE email = '$myusername'";
		
	}
	
	$result = mysqli_query($connection,$sql);
	$result2 = mysqli_query($connection,$sql2);
	$count2 = mysqli_num_rows($result2);
	$count = mysqli_num_rows($result);
	
	if($count == 1){
		$_SESSION['login_user'] = $email;
		$row = $result->fetch_assoc();
		if ($stu == "checked"){
			$_SESSION['name']= $row['firstname'];
		}else{
			$_SESSION['name']= $row['name'];
		}
		$_SESSION['email']=$row['email'];
		if ($stu=="checked"){
			header('Location: MemberHome.php');
		}else{
			header('Location: OrganizationHome.php');
		}
	} else{
	    if ($count2 !=1){
	    	$emailErr = "Email not in database";
        	$emailerror_css='border-color:red; border-width:medium';
	    }
        $passwordErr = "Incorrect password/email combination";
		$passworderror_css='border-color:red; border-width:medium';
	}
		
		$connection->close();
	
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
				<div id="main" class="alt" center>

					<!-- Form -->
					<h3>SIGN IN </h3>
					<br></br>
					<!-- <form action="stud_sign_in.php" method="POST" > -->
					<form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">

						<!--<div class="column uniform" id="infoWrapper">-->
						<ul>
							<!--<div id = "PersonalInfo">-->
							<li>
								<div class="6u 12u$(xsmall)">
									<input type="text" name="email" id="email" value="<?PHP  if(isset($_POST['email']) && !$emailErr) echo htmlspecialchars($_POST['email']); ?>" 
									placeholder="<?PHP if($emailErr) echo $emailErr; else echo "Email"; ?>" 
									style="<?php echo $emailerror_css; ?>"
									required/>
								</div>
								
								<div class="6u 12u$(xsmall)">
									<input type="password" name="password" id="password" value="<?PHP if(isset($_POST['password']) && !$passwordErr) echo htmlspecialchars($_POST['password']); ?>" 
									placeholder="<?PHP if($passwordErr) echo $passwordErr; else echo "password"; ?>" 
									style="<?php echo $passworderror_css; ?>"
									required/>
								</div >
							<!--	<div class="6u 12u$(xsmall)">
									<form>
										<input type ='radio' name="student"  value="student" <?php if(isset($_POST['student'])) echo "checked='checked'"; ?> required> Student
										<input type ='radio' name="organization"  value="organization" <?php if(isset($_POST['organization'])) ; ?> > Organization
									</form>
								</div> -->
								

								<br>
							<!--div-->
							</li>
							<!--<div id= "Student/Organization radio buttons">-->
							<FORM name ="form1" method ="post" action ="radioButton.php">

								<Input type = 'Radio' Name ='s/o' value= 'student' checked
								<?PHP print $stu; ?>
								>Student
								
								<Input type = 'Radio' Name ='s/o' value= 'organization' 
								<?PHP print $org; ?>
								>Organization
									
								<P>
							
							</FORM>

							<!-- Break -->
							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" name = "sendfeedback" value="Submit" class="special" /><li class="current"><a href="aboutus.php"></a></li></li>
									<li><input type="reset" value="Reset" /></li>
								</ul>
							</div>
						</div>
					</form>

				</div>
				</center>
			

				<!-- Footer -->
					<footer id="footer">
						
							<ul class="copyright">
								<li>&copy; Tix on Grounds</li>
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