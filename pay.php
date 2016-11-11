<?php
    /*
        * Payment Confirmation page : has call to execute the payment and displays the Confirmation details
    */
    if (session_id() == "")
        session_start();

    include('utilFunctions.php');
    include('paypalFunctions.php');


    if( isset($_GET['paymentId']) && isset($_GET['PayerID'])){ //Proceed to Checkout or Mark flow

        //call to execute payment
        $response = doPayment(filter_input( INPUT_GET, 'paymentId', FILTER_SANITIZE_STRING ), filter_input( INPUT_GET, 'PayerID', FILTER_SANITIZE_STRING ), NULL);

    } else { //Express checkout flow

        if(verify_nonce()){
            $expressCheckoutFlowArray = json_decode($_SESSION['expressCheckoutPaymentData'], true);
                    $expressCheckoutFlowArray['transactions'][0]['amount']['total'] = (float)$expressCheckoutFlowArray['transactions'][0]['amount']['total'] + (float)$_POST['shipping_method'] - (float)$expressCheckoutFlowArray['transactions'][0]['amount']['details']['shipping'];
                    $expressCheckoutFlowArray['transactions'][0]['amount']['details']['shipping'] = $_POST['shipping_method'];
                    $transactionAmountUpdateArray = $expressCheckoutFlowArray['transactions'][0];
                    $_SESSION['expressCheckoutPaymentData'] = json_encode($expressCheckoutFlowArray);

                    //call to execute payment with updated shipping and overall amount details
                    $response = doPayment($_SESSION['paymentID'], $_SESSION['payerID'], $transactionAmountUpdateArray);
        } else {
            die('Session expired');
        }
    }
    
    // REST validation; route non-HTTP 200 to error page
    if ($response['http_code'] != 200 && $response['http_code'] != 201) {       
        $_SESSION['error'] = $response;
        header( 'Location: error.php');
        
        // need exit() here to maintain session data after redirect to error page
        exit();
    }
    
    $json_response = $response['json']; 
    
    $paymentID= $json_response['id'];
    $paymentState = $json_response['state'];
    $finalAmount = $json_response['transactions'][0]['amount']['total'];
    $currency = $json_response['transactions'][0]['amount']['currency'];
    $transactionID= $json_response['transactions'][0]['related_resources'][0]['sale']['id'];

    $payerFirstName = filter_var($json_response['payer']['payer_info']['first_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $payerLastName = filter_var($json_response['payer']['payer_info']['last_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $recipientName= filter_var($json_response['payer']['payer_info']['shipping_address']['recipient_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine1= filter_var($json_response['payer']['payer_info']['shipping_address']['line1'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine2 = (isset($json_response['payer']['payer_info']['shipping_address']['line2']) ? filter_var($json_response['payer']['payer_info']['shipping_address']['line2'],FILTER_SANITIZE_SPECIAL_CHARS) :  "" );
    $city= filter_var($json_response['payer']['payer_info']['shipping_address']['city'],FILTER_SANITIZE_SPECIAL_CHARS);
    $state= filter_var($json_response['payer']['payer_info']['shipping_address']['state'],FILTER_SANITIZE_SPECIAL_CHARS);
    $postalCode = filter_var($json_response['payer']['payer_info']['shipping_address']['postal_code'],FILTER_SANITIZE_SPECIAL_CHARS);
    $countryCode= filter_var($json_response['payer']['payer_info']['shipping_address']['country_code'],FILTER_SANITIZE_SPECIAL_CHARS);
    
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
                <div id="main" class="alt">

                    <p>
                        <?php echo($payerFirstName.' '.$payerLastName.', Thank you for your Order!');?><br/><br/>

                        Payment ID: <?php echo($paymentID);?> <br/>
                        Transaction ID : <?php echo($transactionID);?> <br/>
                        State : <?php echo($paymentState);?> <br/>
                        Total Amount: <?php echo($finalAmount);?> &nbsp;  <?php echo($currency);?> <br/>
                    </p>
                    <br/>
                    Return to <a href="index.php">home page</a>.
                
           <!--     <div id="main" class="alt"></div> -->
                    <p> Sending Confirmation Email. </p>
                    <?php
                        // the message
                        $msg = "Thank you for your order ".$payerFirstName.", your transaction number is ".$transactionID;

                        // use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg,70);
                        
                        // send email
                        mail($_SESSION['email'],"Thank you for your order",$msg);
                    ?>
                    <br><br>
                    <a href="#" class = "button special">Browse Events! </a>
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