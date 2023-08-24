<?php
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

?>