
<?php
include'college_connection.php';
if(isset($_POST['submit']))
{
    print_r($_POST);
    $fname=$_POST['f_name'];
    $lname=$_POST['l_name'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $address=$_POST['address'];
    $degree=$_POST['degree'];
    $salary=$_POST['salary'];
    $married=$_POST['married'];
    $phone=$_POST['phone'];
    $email=$_POST['email']; 
    $note=$_POST['note'];
    $res=mysqli_query($con,"INSERT INTO teacher_table (f_name,l_name,gender,dob,address,degree,salary,married,phone,email,note)VALUES('$fname','$lname','$gender','$dob','$address','$degree','$salary','$married','$phone','$email','$note')");
    if($res){
        echo "data insert";
    }
    else{
        echo "data not insert";
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
    background:darkkhaki;
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
        <h1>Teacher insert form</h1>
        <form action="#" method="post" enctype="application/x-www-form-urlencoded">
            <div id="mm">
            <input class="aa" type="text" name="f_name" placeholder="enter first name">
            <input class="aa" type="text" name="l_name" placeholder="last  name">
                
            <input type="radio" name="gender" value="female"><label style=" font-size:20px;margin-right:500px">female</label>
            <input type="radio" name="gender" value=" male"><label style=" font-size:20px;margin-right:500px">male</label>
                
            <input class="aa"type="date" name="dob" placeholder ="enetr dob">
            
            <input class="aa" style="padding:40px;padding-right:80;" type="text" name="address" placeholder="Enter address"><br>
            <input class="aa" type="text" name="degree" placeholder="degree">
            <input class="aa" type="text" name="salary" placeholder="Enter salary"><br>
                
            <input type="radio" name="married" value=" yes"><label style=" font-size:20px;margin-right:500px">married</label>
            <input type="radio" name="married" value="no"><label style=" font-size:20px;margin-right:500px">Unmarried</label>
                
            <input class="aa" type="text" name="phone" placeholder="Enter phone no"><br>
            <input class="aa" type="email" name="email" placeholder="Enter email id "><br>
             <input class="aa" style="padding:40px;padding-right:80;" type="text" name="note" placeholder="Enter note:-"><br>
            <input class="aa" style="background-color:green; margin-left:50px;color:white;padding:20px" type="submit" name="submit" value="submit">
            </div>
        </form>
    
    </body>

</html>