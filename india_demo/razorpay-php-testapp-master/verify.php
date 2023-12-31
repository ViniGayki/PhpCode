<?php

require('config.php');

session_start();
$con=mysqli_connect(DB_server,DB_user,DB_password,DB_name);
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $razorpay_order_id =$_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
   $email=$_SESSION['email'];
   $price=$_SESSION['price'];
    $sql="INSERT INTO `payment ledger` (`payment_id`, `order_id`, `status`, `email`,`price`) VALUES ( '$razorpay_payment_id', '$razorpay_order_id', 'success', '$email','$price')";
    if(mysqli_query($con,$sql)){
        
        // echo"payment details inserted to database";
    }
    
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
?>
<a href="pay.php">BACK TO THE FRONT PAGE</a>
