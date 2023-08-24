<?php
include'database_connection.php';
if(isset($_POST['submit'])){
$fname=$_POST['f_name'];
$lname=$_POST['l_name'];
$add=$_POST['address'];
$ins=mysqli_query($con,"insert into stu_insert (stu_name,stu_lastname,stu_add)VALUES('$fname','$lname','$add')");
if($ins){
//    echo"data is insert";
    header("location:http://localhost/demoo/show_table.php");
}else{
 
    echo"data not insert";
}
}
?>
<html>
    <head>
      
    </head>
    <style>
            h1{text-align: center;font-size:40;color:brown;}
#mm{
    -webkit-border-radius: 10px 10px 10px 10px;
    border-radius: 10px 10px 10px 10px;
    background:lightblue;
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
    <body>
            <h1> INSURT FORM </h1>
        <form action="#" method="post" enctype="multipart/form-data">
        <div id="mm">
        <input class="aa" type="text" name="f_name" placeholder="Enter the First name" > 
        <input class="aa" type="text" name="l_name" placeholder="Enter the First last name" >  
        <input class="aa" style="padding:40px;padding-right:80;" type="text" name="address" placeholder="Enter the  address" > 
        <div class="input-field col s12">
        <input style="background-color:green;color:white;padding-right:1" class="btn waves-effect waves-light green right" type="submit"name="submit" value="submit">
        </div>
        </div>  
        </form>
      
    
    
    </body>
    



</html>