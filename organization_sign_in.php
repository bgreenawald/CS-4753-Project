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
//Connect to the database
$host = "127.0.0.1";
$name = "user_info";
$password = "";
$user = "root";
$port = 3306;

$connection = mysqli_connect($host, $user, $password, $name, $port) or die(mysql_error());

//Retrieve Our Information

$name = isset($_POST["name"]) ? $_POST['name'] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$address = isset($_POST["address"]) ? $_POST["address"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
$password2 = isset($_POST["password2"]) ? $_POST["password2"] : '';
$city = isset($_POST["city"]) ? $_POST["city"] : '';
$state = isset($_POST["state"]) ? $_POST["state"] : '';
$zip = isset($_POST["zip"]) ? $_POST["zip"] : 0;

$nameErr = "";
$emailErr = "";
$passErr = "";
$passErr2 = "";
$addErr = "";
$cityErr = "";
$stateErr = "";
$zipErr = "";


/*current checks include
	name (first and last) all letters
	email:
		has @
		has .
		first 2 chars not @
		last 2 letters are alphabetic
		at least 2 letters between @ and .
	address: none yet
	city and state: all letters
	zip: must be 5 numbers
*/
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

if($connection && !empty($_POST['email'])){
		$email = $_POST['email'];
		$result = mysqli_query($connection, "SELECT * FROM organization WHERE email = '$email'");
};

if(isset($_POST['sendfeedback'])) { 
	
	if(!preg_match("/[a-zA-Z]/", $name)){
		$nameErr = "Must contain at least one letter";
		$nerror_css ='border-color:red; border-width:medium';
	}
    
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
    }elseif(preg_match('/^@{1}$/', $email)){
    	$emailErr = "Email cannot contain more than one @";
    	$emailerror_css = 'border-color:red; border-width:medium';
    }elseif(mysqli_num_rows($result) != 0){
	    	$emailErr = "Email already registered, please sign in";
	    	$emailerror_css = 'border-color:red; border-width:medium';
	}else $emailErr ="";
    
    if($password != $password2){
    	$passErr = "Passwords do not match";
    	$passErr2 = "Passwords do not match";
    	$passerror_css='border-color:red ; border-width:medium';
    }else{
    	$passErr = "";
    	$passErr2 = "";
    }
    
    if(!preg_match("/[a-zA-Z]/", $address)){
		$addErr = "Must contain at least one letter";
		$adderror_css='border-color:red; border-width:medium';
	}
    
    if(preg_match("/[^a-zA-Z.\- ]/", $city) || !preg_match("/[a-zA-Z]/", $city)){
    	$cityErr = "City name must only contain letters and must contain at least one letter";
    	$cityerror_css='border-color:red ; border-width:medium';
    }else $cityErr = "";
    
    if(preg_match('/[^a-zA-Z ]/', $state) || !preg_match("/[a-zA-Z]/", $state)){
    	$stateErr = "State name must only contain letters and must contain at least one letter";
    	$stateerror_css = 'border-color:red; border-width:medium';
    }else $stateErr = "";
    
    if(!preg_match('/^[0-9]{5}$/',$zip)){
    	$zipErr = "Zip code must be 5 digets long";
    	$ziperror_css='border-color:red; border-width:medium';
    }else $zipErr = "";
    
	if(!$nameErr && !$emailErr && !$addErr && !$cityErr && !$stateErr && !$zipErr && !$passErr && !$passErr2){
		$sql = "INSERT INTO `user_info`.`organization` (`name`, `email`, `password`, `address`, `city`, `state`, `zip`) 
        VALUES ('$name', '$email', '$password', '$address', '$city', '$state', '$zip');";
		
		
		if($connection->query($sql) == TRUE){
			$_SESSION['login_user'] = $email;
			$_SESSION['name']= $name;
			$_SESSION['email']= $email;
			header('Location: MemberHome.php');
		} else{
		    echo $connection->error;
		}
		$connection->close();
	}
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
					<h3>ORGANIZATION SIGN UP</h3>

					<form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">
						<div class="column uniform">
							<div class="6u 12u$(xsmall)">
								<input type="text" name="name" id="name" value="<?PHP  if(isset($_POST['name']) && !$nameErr) echo htmlspecialchars($_POST['name']); ?>" 
								placeholder="<?PHP if($nameErr) echo $nameErr; else echo "Name"; ?>" 
								style="<?php echo $nerror_css; ?>"
								required/>
							</div>
							
							<div class="6u$ 12u$(xsmall)">
								<input type="text" name="email" id="email" value="<?PHP if(isset($_POST['email']) && !$emailErr) echo htmlspecialchars($_POST['email']); ?>" 
								placeholder="<?PHP if($emailErr) echo $emailErr; else echo "Email"; ?>"
								style="<?php echo $emailerror_css; ?>" 
								required/>
							</div>
							
								
							<div class="6u 12u$(xsmall)">
								<input type="password" name="password" id="password" value="<?PHP if(isset($_POST['password']) && !$passErr) echo htmlspecialchars($_POST['password']); ?>" 
								placeholder="<?PHP if($passErr) echo $passErr; else echo "Password"; ?>" 
								style="<?php echo $passerror_css; ?>"
								required/>
							</div>
							
							<div class="6u 12u$(xsmall)">
								<input type="password" name="password2" id="password2" value="<?PHP if(isset($_POST['password2']) && !$passErr2) echo htmlspecialchars($_POST['password2']); ?>" 
								placeholder="<?PHP if($passErr2) echo $passErr2; else echo "Re-enter password"; ?>" 
								style="<?php echo $passerror_css; ?>"
								required/>
							</div>

							<div class="6u$ 12u$(xsmall)">
								<input type="text" name="address" id="address" value="<?PHP if(isset($_POST['address']) && !$addErr) echo htmlspecialchars($_POST['address']); ?>"
								placeholder="<?PHP if($addErr) echo $addErr; else echo "Street Address"; ?>"
								style="<?php echo $adderror_css; ?>"
								required/>
							</div>
							
							<div class="6u$ 12u$(xsmall)">
								<input type="text" name="city" id="city" value="<?PHP if(isset($_POST['city']) && !$cityErr) echo htmlspecialchars($_POST['city']); ?>" 
								placeholder="<?PHP if($cityErr) echo $cityErr; else echo "City"; ?>"
								style="<?php echo $cityerror_css; ?>"
								required/>
							</div>
							
							<div class="6u$ 12u$(xsmall)">
								<input type="text" name="state" id="state" value="<?PHP if(isset($_POST['state']) && !$stateErr) echo htmlspecialchars($_POST['state']); ?>" 
								placeholder="<?PHP if($stateErr) echo $stateErr; else echo "State"; ?>"
								style="<?php echo $stateerror_css; ?>"
								required/>
							</div>
							
							<div class="6u$ 12u$(xsmall)">
								<input type="text" name="zip" id="zip" value="<?PHP if(isset($_POST['zip']) && !$zipErr) echo htmlspecialchars($_POST['zip']); ?>" 
								placeholder="<?PHP if($zipErr) echo $zipErr; else echo "Zip Code"; ?>"
								style="<?php echo $ziperror_css; ?>" 
								required/>
							</div><br>
							
							<div class="6u$ 12u$(small)">
								<input type="checkbox" id="demo-human" name="demo-human" value="your value" <?php if(isset($_POST['demo-human'])) echo "checked='checked'"; ?> required/>
								<label for="demo-human">I am a human</label>
							</div>
							<br>
							<!-- Break -->
							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" name = "sendfeedback" value="Submit" class="special" /></li>
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