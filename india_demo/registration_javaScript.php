<?php
include 'database_connection.php';
$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(preg_match("/\S+/", $_POST['username']) === 0){
		$errors['username'] = "* username is required.";
	}
	if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
		$errors['email'] = "* Not a valid e-mail address.";
	}
	if(preg_match("/.{8,}/", $_POST['password']) === 0){
		$errors['password'] = "* Password Must Contain at least 8 Chanacters.";
	}
      if(count($errors) === 0){

		 $username = $_POST['username'];
		 $email = $_POST['email'];
		 $password = md5($_POST['password']);
//		function createSalt(){
//   			$string = md5(uniqid(rand(), true));
//    		return substr($string, 0, 3);
//		}
//		$salt = createSalt();
		$password =md5($password);
 
		$search_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			$errors['email'] = "Email address is unavailable.";
		}else{
		$sql = "INSERT INTO users(`username`, `email`,`password`) VALUES ('$username', '$email', '$password')";
			$query = mysqli_query($con, $sql);
//			$_POST['fname'] = '';
			$_POST['username'] = '';
			$_POST['email'] = '';
             header("location:login.php");
			$successful = "<h3> You are successfully registered.</h3>";
		}
	}
	}

?>
<html>
	<head>
	
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
		
     <style>
	body {
    background: #3e4144;
}
.form {
    margin: 50px auto;
    width: 300px;
    padding: 30px 25px;
    background: white;
}
h1.login-title {
    color: #666;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
}
.login-input {
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.login-button {
    color: #fff;
    background: #55a1ff;
    border: 0;
    outline: 0;
    width: 100%;
    height: 50px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
}
.link {
    color: #666;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
}
.link a {
    color: #666;
}
h3 {
    font-weight: normal;
    text-align: center;
}
		</style>
		
		
		<script>
	function clearFunc()
	{
		document.getElementById("username").value="";
		document.getElementById("email").value="";
		document.getElementById("pw").value="";
		document.getElementById("cpw").value="";
	}
	</script>
	
	</head>

<form class="form" method="post" action="#">
	<h1> Registration </h1>
        	<table>
				
            	<tr>
                	<td colspan="2">
                		<!-- This PHP script is will display the success message of the registration -->
                		<?php if(isset($successful)){ echo $successful; } ?>
            		</td>
                </tr>
            	<tr>
                	
                    <td><input class="login-input" type="text" name="username" id="username" placeholder="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>">
					</td>
                </tr>
                <tr>
				<td>
                <!-- This PHP script will display when the form is submitted in Last Name field is empty -->
                 <?php if(isset($errors['username'])){echo "<h2>" .$errors['username']. "</h2>"; } ?>
                    </td>
                </tr>
                <tr>
                	<!-- The PHP Script in value attribute of the input below is use for value retrieval when registration fails due to validations -->
                	<td colspan="2"><input class="login-input" type="text" name="email" id="email" placeholder="E-mail Address" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['email'])){echo "<h2>" .$errors['email']. "</h2>"; } ?></td>
                </tr>
                <tr>
                	<td colspan="2"><input class="login-input" type="password" name="password" id="pw" placeholder="Password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['password'])){echo "<h2>" .$errors['password']. "</h2>"; } ?></td>
                </tr>
                <tr>
                	<td colspan="2"><input class="login-input" type="password" name="confirm_password" id="cpw" placeholder="Confirm Password" value="<?php if(isset($_POST['confirm_password'])){echo $_POST['confirm_password'];} ?>">
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['confirm_password'])){echo "<h2>" .$errors['confirm_password']. "</h2>"; } ?></td>
                </tr>
                <tr>
                    <td><input class="login-button" type="submit" name="submit" id="submit" value="Sign Up"></td>
					<td>
						<input type="reset" value="Clear Form" onclick="clearFunc()" id="res" class="login-button" />
					</td>
                </tr>
				<p>Have an account?  <a href="login.php">Log in</a> </p>
            </table>
		</form>