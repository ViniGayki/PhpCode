<?php

$keyId = 'rzp_test_cggvqgxYnCHEBN';
$keySecret = 'EqCjARFkVPgAu0oWLe7XrB3f';
$displayCurrency = 'INR';

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
define('DB_server','localhost');
define('DB_user','root');
define('DB_password','');
define('DB_name','sonademo');
$con=mysqli_connect(DB_server,DB_user,DB_password,DB_name);
if(mysqli_connect_errno()){
    echo"connection fail";
} 
   else{
//    echo"connecction is succsesfully";
}