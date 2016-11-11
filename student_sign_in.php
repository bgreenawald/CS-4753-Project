<?php 
//Connect to the database
$host = "127.0.0.1";
$name = "user_info";
$password = "";
$user = "root";
$port = 3306;

$connection = mysqli_connect($host, $user, $password, $name, $port) or die(mysql_error());

//Retrieve Our Information, checking if they have been set
$firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : '';
$lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$address = isset($_POST["address"]) ? $_POST["address"] : '';
$city = isset($_POST["city"]) ? $_POST["city"] : '';
$state = isset($_POST["state"]) ? $_POST["state"] : '';
$zip = isset($_POST["zip"]) ? $_POST["zip"] : 0;
$ccnum = isset($_POST['ccnum']) ? $_POST['ccnum'] : 0;
$expdate = isset($_POST['expdate']) ? $_POST['expdate'] : null;
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : 0;

//Null initialize our errors until they are set
$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$addErr = "";
$cityErr = "";
$stateErr = "";
$zipErr = "";
$ccnumErr = "";
$exedateErr = "";
$cvvErr = "";

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

if(isset($_POST['sendfeedback'])) {   
	
    if(preg_match("/[^a-zA-Z\- ]/", $firstName) || !preg_match("/[a-zA-Z]/", $firstName)){
        $fnameErr = "First name must not contain symbols or numbers and contain at least one letter";
        $fnerror_css='border-color:red; border-width:medium';
    }else $fnameErr = "";
    
    if(preg_match("/[^a-zA-Z.\- ]/", $lastName) || !preg_match("/[a-zA-Z]/", $lastName)){
        $lnameErr = "Last name must not contain symbols or numbers and contain at least one letter";
        $lnerror_css='border-color:red ; border-width:medium';
    }else $lnameErr="";
    
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
    }elseif(preg_match('/^@{1}$/',$zip)){
    	$emailErr = "Email cannot contain more than one @";
    	$emailerror_css = 'border-color:red; border-width:medium';
    }else $emailErr ="";
    
    if(!preg_match("/[a-zA-Z]/", $address)){
		$addErr = "Must contain at least one letter";
		$adderror_css='border-color:red; border-width:medium';
	}
    
    
    if(preg_match("/[^a-zA-Z.\- ]/", $city) || !preg_match("/[a-zA-Z]/", $city)){
    	$cityErr = "City name must only contain letters and must contain at least one leter";
    	$cityerror_css='border-color:red ; border-width:medium';
    }else $cityErr = "";
    
    if(preg_match('/[^a-zA-Z ]/', $state) || !preg_match("/[a-zA-Z]/", $state)){
    	$stateErr = "State name must only contain letters and must contain at least one letter";
    	$stateerror_css = 'border-color:red; border-width:medium';
    }else $stateErr = "";
    
    if(!preg_match('/^[0-9]{5}$/',$zip)){
    	$zipErr = "Zip code must be 5 digits long";
    	$ziperror_css='border-color:red; border-width:medium';
    }else $zipErr = "";

    if(!preg_match('/^[0-9]{16}$/',$ccnum)){
    	$ccnumErr = "Credit Card number must be 16 digits long";
    	$ccnumerror_css='border-color:red; border-width:medium';
    }else $ccnumErr = "";

    if(!preg_match('/^[0-9]{3}$/',$cvv)){
    	$cvvErr = "ccv code must be 3 digits long";
    	$cvverror_css='border-color:red; border-width:medium';
    }else $cvvErr = "";
    
	if(!$fnameErr && !$lnameErr && !$emailErr && !$addErr && !$cityErr && !$stateErr && !$zipErr && !$cvvErr && !$ccnumErr){
		$sql = "INSERT INTO `user_info`.`student` (`first-name`, `last-name`, `email`, `address`, `city`, `state`, `zip`, `ccnum`, `expdate`, `cvv`) 
		VALUES ('$firstName', '$lastName', '$email', '$address', '$city', '$state', '$zip', '$ccnum', '$expdate', '$cvv');";
		
		
		if($connection->query($sql) == TRUE){
			header('Location: success.php');
		    echo "Success";
		} else{
		    echo $connection->error;
		    echo 'Connectin error';
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
						<li class="current"><a href="aboutus.html">About Us</a></li>
						<li><a href="#" class="button special">Sign Up</a></li>
					</ul>
				</nav>
			</header>
			
			<!-- Main -->
			<center>
				<div id="main" class="alt" center>

					<!-- Form -->
					<h3>Student SIGN UP </h3>
					<a href="organization_sign_in.php">Organizations Sign Up Here</a>
					<br></br>
					<!-- <form action="stud_sign_in.php" method="POST" > -->
					<form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">

						<!--<div class="column uniform" id="infoWrapper">-->
						<ul>
							<!--<div id = "PersonalInfo">-->
							<li>
								<h5>Personal Information</h5>
								<div class="6u 12u$(xsmall)">
									<input type="text" name="firstName" id="firstName" value="<?PHP  if(isset($_POST['firstName']) && !$fnameErr) echo htmlspecialchars($_POST['firstName']); ?>" 
									placeholder="<?PHP if($fnameErr) echo $fnameErr; else echo "First Name"; ?>" 
									style="<?php echo $fnerror_css; ?>"
									required/>
								</div>
								
								<div class="6u 12u$(xsmall)">
									<input type="text" name="lastName" id="lastName" value="<?PHP if(isset($_POST['lastName']) && !$lnameErr) echo htmlspecialchars($_POST['lastName']); ?>" 
									placeholder="<?PHP if($lnameErr) echo $lnameErr; else echo "Last Name"; ?>" 
									style="<?php echo $lnerror_css; ?>"
									required/>
								</div>
								
								<div class="6u$ 12u$(xsmall)">
									<input type="text" name="email" id="email" value="<?PHP if(isset($_POST['email']) && !$emailErr) echo htmlspecialchars($_POST['email']); ?>" 
									placeholder="<?PHP if($emailErr) echo $emailErr; else echo "Email"; ?>"
									style="<?php echo $emailerror_css; ?>"
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
								</div>
								<br>
							<!--div-->
							</li>
							<!--<div id= "BankingInfo">-->
							<li>
								<h5>Banking Information</h5>
								<div class="6u$ 12u$(xsmall)">
									<input type="text" name="ccnum" id="ccnum" value="<?PHP if(isset($_POST['ccnum']) && !$ccnumErr) echo htmlspecialchars($_POST['ccnum']); ?>" 
									placeholder="<?PHP if($ccnumErr) echo $ccnumErr; else echo "Crecit Card Number"; ?>"
									style="<?php echo $ccnumerror_css; ?>"
									required/>
								</div>
								
								<div class="6u$ 12u$(xsmall)">
									<input type="date" name="expdate" id="expdate" value="<?PHP if(isset($_POST['expdate']) && !$exedateErr) echo htmlspecialchars($_POST['expdate']); ?>" 
									placeholder="<?PHP if($exedateErr) echo $exedateErr; else echo "Expiration Date"; ?>"
									style="<?php echo $exedateerror_css; ?>"
									required/>
								</div>
								
								<div class="6u$ 12u$(xsmall)">
									<input type="text" name="cvv" id="cvv" value="<?PHP if(isset($_POST['cvv']) && !$cvvErr) echo htmlspecialchars($_POST['cvv']); ?>" 
									placeholder="<?PHP if($cvvErr) echo $cvvErr; else echo "cvv code"; ?>"
									style="<?php echo $cvvrror_css; ?>"
									required/>
								</div><br>
							<!--</div>-->
								</li>
							<br>
							</ul>
							
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