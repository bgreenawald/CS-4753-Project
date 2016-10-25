<?php
    /*
        * Config for PayPal specific values
    */

    //Whether Sandbox environment is being used, Keep it true for testing
    define("SANDBOX_FLAG", true);

    //PayPal REST API endpoints
    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
    define("LIVE_ENDPOINT", "https://api.paypal.com");

    
    //Merchant ID
    define("MERCHANT_ID","tixatuva-facilitator@gmail.com");
    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "AYDHTCyPudX3UvgVbUC38lNQgO3Iv6J1PP8MkK1vUvCxLJDuVpRAuAEErNDspACsErGw1ErbehkfIi6z");
    define("SANDBOX_CLIENT_SECRET", "EHre0v5wZqKjVN9Pe9NBJws1N1o-CTaiiK5w0rPIjxnUTIKGrwmqBXuObBLxNrAw7KvqzEHnOPL3mVap");

    //Environments -Sandbox and Production/Live
    define("SANDBOX_ENV", "sandbox");
    define("LIVE_ENV", "production");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("LIVE_CLIENT_ID" , "live_Client_Id");
    define("LIVE_CLIENT_SECRET" , "live_Client_Secret");

    //ButtonSource Tracker Code
    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");

?>