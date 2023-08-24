          
<?php
include 'college_connection.php';
@Session_start();
if(isset($_POST['submit'])){
//    print_r[$_POST];
    $usr=$_POST['user_name'];
   echo $pass=md5($_POST['password']);
    $my= mysqli_query($con,"select * from user_table where username='".$usr."'AND password='".$pass."'");
    $data=mysqli_fetch_array($my);
    if($data){
        $_SESSION['abc']=$data['type'];
        header("location:dashboad_form.php");
    }else{
        echo"login fail";
        
    }
    
}


?>
<html>
    <head>
        <style>
            h1{
                text-align: center;font-size: 40;
                
            }
        #formContent {
  border-radius: 10px 10px 10px 10px;
  box-shadow: 0 30px 60px 0 rgb(0 0 0 / 30%);
    background:lightblue;
    padding: 30px;
    padding-top:50px;padding-bottom: 10px;
    width:40%;
    text-align: center;
    font-size:60px;
    margin-right:40px; 
    margin-left:500px;
    
        } 
            
         .mina{
            
         font-size: 20;
    text-align: center;
    margin-bottom: 20;
            }
        
        
        
        
        </style>
    </head>

<body>
    
    <h1> College authorities for only staff members.</h1>
<form action="#" method="post" enctype="multipart/form-data">
        <div id="formContent">
        <input class="mina" type= "text" name="user_name" placeholder="admin"><br>
        <input class="mina" type="password" name="password" placeholder="password"><br>
        <input class="mina" style="background-color:green;color:white" type="submit" name ="submit" value="login">
            
        
            </div>
    
    
    </form>
    
    
    
    
    </body>



</html>



