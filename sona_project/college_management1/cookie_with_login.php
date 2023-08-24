<?php
include'college_connection.php';
@SESSION_start();
if(isset($_POST['submit']))
{
$fname=$_POST['username'];
$password=md5($_POST['password']);
$my=mysqli_query($con,"select * from user_table where username='$fname' AND password='$password'");
//    if(mysqli_num_rows($my) == 0){
//			echo"Login Failed. No user Found!";}
//          else
//          {
           $data=mysqli_fetch_all($my);
			if (isset($_POST['set'])){
				//set up cookie
				$name_cookie = "user";
				$value_cookie = $data['u_id'];//primary key
				setcookie($name_cookie, $value_cookie, time() + (86400 * 30)); // cookie will expire in a month, 86400 = 1 day
			}
	
			$_SESSION['abc']=$data['type'];
			header("location:dashboad_form.php");
		}
	
	else{

		echo "Please Login!";
	}?>
<html>
    <head>
        <style>
        
        
        
        </style>
    </head>
    <body>
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="first name"><br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="checkbox" name="set">remainder me<br> 
            <input type="submit" name="submit" value="submit">    
        
        </form></body></html>
<!--
</html>//index form codding//
<!<!DOCTYPE html>
<html>
<head>
<title>Setting Up Cookie on User Login</title>
</head>
<body>
	<h2>Login Form</h2>
	<form method="POST" action="login.php">
	<label>Username:</label> <input type="text" name="username">
	<label>Password:</label> <input type="password" name="password"><br><br>
	<input type="checkbox" name="remember"> Remember me <br><br>
	<input type="submit" value="Login" name="login">
	</form>
	
	<span>

	<?php /*
		session_start();
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
		unset($_SESSION['message']); */
	?>
</span>
</body>
</html>
-->
<?php/*
	if(isset($_POST['login'])){
		
		session_start();
		include('conn.php');
	
		$username=$_POST['username'];
		$password=$_POST['password'];
	
		$query=mysqli_query($conn,"select * from `user` where username='$username' && password='$password'");
	
		if (mysqli_num_rows($query) == 0){
			$_SESSION['message']="Login Failed. No user Found!";
			header('location:index.php');
		}
		else{
			$row=mysqli_fetch_array($query);
			
			if (isset($_POST['remember'])){
				//set up cookie
				$name_cookie = "user";
				$value_cookie = $row['userid'];
				setcookie($name_cookie, $value_cookie, time() + (86400 * 30)); // cookie will expire in a month, 86400 = 1 day
			}
	
			$_SESSION['id']=$row['userid'];
			header('location:success.php');
		}
	}
	else{
		header('location:index.php');
		$_SESSION['message']="Please Login!";
	}*/
?>

<?php/*
	session_start();
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('index.php');
		exit();
	}
	include('conn.php');
	$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
	$row=mysqli_fetch_assoc($query);*/
?>
<!--
<!DOCTYPE html>
<html>
<head>
<title>Setting Up Cookie on User Login</title>
</head>
<body>
	<h2>Login Success</h2>
	<?php/* echo $row['fullname']; */?>
	<br>
	<a href="index.php">Back</a>
</body>
</html>-->
