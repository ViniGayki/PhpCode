<?php
define('DB_server','localhost');
define('DB_user','root');
define('DB_password','');
define('DB_name','sonademo');

$con= new mysqli(DB_server,DB_user,DB_password,DB_name);
if(mysqli_connect_error())
                   {
    echo"database file is not connected";

} else {
//    echo "database file is  connected";
}
//   $host = "localhost";
//	$user       = "root";
//	$pass       = "";
//	$database   = "sonademo";
//	
//	$connect    = new mysqli($host, $user, $pass, $database) or die("Error : ".mysql_error());		

?>
