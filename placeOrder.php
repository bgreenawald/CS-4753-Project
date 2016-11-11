<?php
    /*
        * Place Order Page : part of the Express Checkout flow. Buyer can choose shipping option on this page.
    */
    if (session_id() == "")
        session_start();

    include('utilFunctions.php');
    include('paypalFunctions.php');

    $_SESSION['paymentID']= filter_input( INPUT_GET, 'paymentId', FILTER_SANITIZE_STRING );
    $_SESSION['payerID'] = filter_input( INPUT_GET, 'PayerID', FILTER_SANITIZE_STRING );
    $access_token = $_SESSION['access_token'];
    $lookUpPaymentInfo = lookUpPaymentDetails($_SESSION['paymentID'], $access_token);
    $recipientName= filter_var($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['recipient_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine1= filter_var($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['line1'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine2 =  (isset($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['line2']) ?  filter_var($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['line2'],FILTER_SANITIZE_SPECIAL_CHARS) :  "");
    $city= filter_var($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['city'],FILTER_SANITIZE_SPECIAL_CHARS);
    $state= filter_var($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['state'],FILTER_SANITIZE_SPECIAL_CHARS);
    $postalCode = filter_var($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['postal_code'],FILTER_SANITIZE_SPECIAL_CHARS);
    $countryCode= filter_var($lookUpPaymentInfo['payer']['payer_info']['shipping_address']['country_code'],FILTER_SANITIZE_SPECIAL_CHARS);

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
                        <li><a href="student_sign_in.php" class="button special">Sign Up</a></li>
                    </ul>
                </nav>
            </header>
            
            <!-- Main -->
            <center>
                <!--<div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">-->
                    <div id="main" class="alt">
                    
                        <h3>Ship To :</h3>
                        <?php echo($recipientName);?><br/>
                        <?php echo($addressLine1);?><br/>
                        <?php echo($addressLine2);?><br/>
                        <?php echo($city);?><br/>
                        <?php echo($state.'-'.$postalCode);?><br/>
                        <?php echo($countryCode);?>

                        <form action="pay.php" method="POST">
                            <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>" hidden readonly/>
                            <label>Delivery methods:</label>
                            <select class="form-control" name="shipping_method" id="shipping_method" style="width: 250px;" class="required-entry">
                                <optgroup label="Email Delivery" style="font-style:normal;">
                                    <option value="1.00">
                                    $1.00 Convenience Fee</option>
                                </optgroup>
                                <optgroup label="Event Pick Up" style="font-style:normal;">
                                    <option value="0.00" selected>
                                    Free</option>
                                </optgroup>
                            </select>
                            <br/>
                            <button type="submit" class="btn btn-primary">Confirm Order</button>
                        </form>
                        <br/>
                   <!-- </div>
                    <div class="col-md-4"></div>
                </div>-->
                    <a href="Browse.html" class = "button special">Browse Events! </a>
                    <a href="aboutus.html" class = "button special">Learn more!</a>
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