<?php
define('DB_server','localhost');
define('DB_user','root');
define('DB_password','');
define('DB_name','college_management');
$con=mysqli_connect(DB_server,DB_user,DB_password,DB_name);
if(mysqli_connect_errno())
{
  echo "failed login";
    
}
else{
    //echo "successfully";
    
}
?>

