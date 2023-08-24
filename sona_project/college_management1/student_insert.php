<?php
include'college_connection.php';
if(isset($_POST['submit']))
{ 
    $fname=$_POST['f_name'];
    $lname=$_POST['l_name'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $pob=$_POST['pob'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $note=$_POST['note'];
    $res=mysqli_query($con,"INSERT INTO student_table (f_name,l_name,gender,dob,pob,address,phone,email,note)VALUES('$fname','$lname','$gender','$dob','$pob','$address','$phone','$email','$note')"); 
 if($res){
     $to = "vinigayki@gmail.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:'$email'' \r\n";
         $header .= "Cc:afgh@somedomain.com\r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
    
     header("location:http://localhost/college_management1/student_table.php");

    }
    else {                  
        echo"data not insert";
    }
    
    }
?>
<html>
    <head>
        <style>
            h1{text-align: center;font-size:40;color:brown;}
#mm{
    -webkit-border-radius: 10px 10px 10px 10px;
    border-radius: 10px 10px 10px 10px;
    background:darkgray;
    width:40%;
    max-width: 50 px;
    position:static;
    padding : 200px;
    -webkit-box-shadow: 0 30px 60px 0 rgb(0 0 0 / 30%);
    box-shadow: 0 30px 60px 0 rgb(0 0 0 / 30%);
    text-align: center;
    font-size:60px;
    margin-right:40px; 
    margin-left:300px;
    padding-top:50px;padding-bottom: 10px;
}
    .aa{
          font-size: 20px;
    text-align:left;
    margin-bottom: 20px;
    padding:10px;
    -webkit-border-radius: 10px 10px 10px 10px;
    margin-right: 2000;
    padding-right: 100;
            }
        
        </style>
        </head>
    
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        
        <h1> Student data insurt</h1>
        <div id="mm">
        <input class="aa" type="text" name="f_name" placeholder="Enter first name"><br>          
        <input class="aa" type="text" name="l_name" placeholder="Enter last name"><br>
        <input class="aa" type="date" name="dob" placeholder="Enter dob "><br>
        <input class="aa" type="text" name="pob" placeholder="Enter pob"><br>
        <input class="aa" style="padding:40px;padding-right:80;" type="text" name="address" placeholder="Enter address"><br>
        <input class="aa" type="text" name="phone" placeholder="Enter phone no"><br>
        <input class="aa" type="email" name="email" placeholder="Enter email id "><br>
        <input class="aa" style="padding:40px;padding-right:80;" type="text" name="note" placeholder="Enter note:-"><br>
        <input type="radio" name="gender" value="female"><span style="font-size:20px;margin-right:500px">female</span><br>
        <input type="radio" name="gender" value="male"><label style=" font-size:20px;margin-right:500px">male</label>
        <input class="aa" style="background-color:green; margin-left:50px;color:white;padding:20px" type="submit" name="submit" value="submit">
        </div>
        </form>
    </body>

</html>