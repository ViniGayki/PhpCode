<?php include 'database_connection.php'; ?>
<html>
<head>
    <style>
    body{ 
background:#EAE9E5;
 } 
 .login_form{
 	margin-top: 25%;
  background: #fff;
  padding: 30px; 
     box-shadow: 0px 1px 36px 5px rgba(0,0,0,0.28);
     border-radius: 5px;
 }
 .form_btn{ 
 	background: #fb641b;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,.2);
    border: none;
    color: #fff; 
    width: 100% 
  }
  .label_txt{ 
font-size: 12px; 
   }  
   .form-control{border-radius: 25px }
   .signup_form{ 
    background: #fff;
  padding-left: 25px; 
   padding-right: 25px; 
      padding-bottom:5px; 
     box-shadow: 0px 1px 36px 5px rgba(0,0,0,0.28);
     border-radius: 5px;
    }
    .logo{ 
      height: 50px; 
      width: auto; 
        display: block;
  margin-left: auto;
  margin-right: auto;
     }
     .errmsg{ 
  margin: 2px auto;
  border-radius: 5px;
  border: 1px solid red;
  background: pink;
  text-align: left;
  color: brown;
  padding: 1px;
}
.successmsg{
  margin: 5px auto;
  border-radius: 5px;
  border: 1px solid green;
  background: #33CC00;
  text-align: left;
  color: white;
  padding: 10px;
}
</style>
    
    
<title> Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
<!--mail validation befor submition mail check using ajax following script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	

</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
     <div class="col-sm-4">
      <img src="https://college_management1/logo_img.png" alt="Registration" class="logo img-fluid"> 
    </div>
     <div class="col-sm-4">
    </div>
  </div>
	<div class="row">
<?php 
 if(isset($_POST['signup'])){  extract($_POST);  
//  if(strlen($fname)<3){ // Minimum 
//      $error[] = 'Please enter First Name using 3 charaters atleast.';
//        }
//if(strlen($fname)>20){  // Max 
//      $error[] = 'First Name: Max length 20 Characters Not allowed';
//        }
//if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
//            $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
//        }    
//if(strlen($lname)<3){ // Minimum 
//      $error[] = 'Please enter Last Name using 3 charaters atleast.';
//        }
//if(strlen($lname)>20){  // Max 
//      $error[] = 'Last Name: Max length 20 Characters Not allowed';
//        }
//if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
//            $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
//              }    
   if(strlen($username)<3){ // Change Minimum Lenghth   
            $error[] = 'Please enter Username using 3 charaters atleast.';
        }
  if(strlen($username)>50){ // Change Max Length 
            $error[] = 'Username : Max length 50 Characters Not allowed';
        }
  if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
            $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - myusername, okuniqueuser or myusername123';
        }  
  if(strlen($email)>50){  // Max 
            $error[] = 'Email: Max length 50 Characters Not allowed';
        }
   if($passwordConfirm ==''){
            $error[] = 'Please confirm the password.';
        }
        if($password != $passwordConfirm){
            $error[] = 'Passwords do not match.';
        }
          if(strlen($password)<5){ // min 
            $error[] = 'The password is 6 characters long.';
        }
        if(strlen($password)>20){ // Max 
            $error[] = 'Password: Max length 20 Characters Not allowed';
        }
							 
          $sql="select * from users where (username='$username' or email='$email');";
          $res=mysqli_query($con,$sql);
          if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);

          if($username==$row['username'])
          {
           $error[] ='Username alredy Exists.';
          } 
         if($email==$row['email'])
           { 
            $error[] ='Email alredy Exists.';
          } 
      }
         if(!isset($error)){ 
//        $date=date('Y-m-d');
            $options = array("cost"=>4);
            $password = md5($_POST['password']);
           
            $result = mysqli_query($con,"INSERT into users(username,email,password) values('$username','$email','$password')");

           if($result){
           $done=2; }
          else{
          $error[] ='Failed : Something went wrong';
		  } } } ?>

		 <div class="col-sm-4">
        <?php 
        if(isset($error)){ 
        foreach($error as $error){ 
        echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; }
		} ?>
		</div>
		
		<div class="col-sm-4">
      <?php if(isset($done)) 
      { ?>
       <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
       <?php } else { ?>
       <div class="signup_form">
		<form action="" method="POST">
 
 
      <div class="form-group">
    <label class="label_txt">Username </label>
    <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="" >
     </div>
			
     <div class="form-group">
    <label class="label_txt">Email </label>
    <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required=""> 
<!--mail validation befor submition to used following script-->
    <div id="emailStatus"></div>  
   </div>
			
     <div class="form-group">
    <label class="label_txt">Password </label>
    <input type="password" name="password" class="form-control" required="" >
    </div>
			
    <div class="form-group">
    <label class="label_txt">Confirm Password </label>
    <input type="password" name="passwordConfirm" class="form-control" required="">
    </div>
			
  <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</button>
			
  <p>Have an account?  <a href="login.php">Log in</a> </p>
</form>
		   
  <?php } ?> 
        </div>
		</div>
		<div class="col-sm-4">
		</div>
	    </div>
	    </div>
	    </body>
	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!--mail validation befor submition to used following script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script>
</html>