<?php
include 'database_connection.php';
// error_reporting('0');
$gd=intval($_GET['rd']);
if(isset($_POST['submit'])){
       $fname=$_POST['f_name'];
       $lname=$_POST['l_name'];
       $add=$_POST['address'];
    $up= mysqli_query($con,"UPDATE stu_insert SET stu_name ='$fname',stu_lastname ='$lname',stu_add ='$add' where id ='".$gd."'" );
 if($up){
     header("location:http://localhost/demoo/show_table.php");
 } else {
     
     echo "data not update";
 }
    
    
}


?>
<html>
    <head>
      <style>
            h1{text-align: center;font-size:40;color:blue;}
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
    
    
   
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>UPDATE FORM</h1>
        <?php 

        $sel=mysqli_query($con,"select * from stu_insert where id='$gd'");
        while($data=mysqli_fetch_array($sel))
        {
        ?>
       
    <div id="mm">
    <input class="aa" type="text" name="f_name" value="<?php echo htmlentities($data['stu_name']);?>" placeholder="Enter the First name" > 
    <input class="aa" type="text" name="l_name" value="<?php echo htmlentities($data['stu_lastname']);?>" placeholder="Enter the First last name" >  
    <input class="aa" style="padding:40px;padding-right:80;" type="text" name="address" value="<?php echo htmlentities($data['stu_add']);?>" placeholder="Enter the  address" > 
    <div class="input-field col s12">
    <input style="background-color:green;color:white;padding-right:1" class="btn waves-effect waves-light green right" type="submit"name="submit" value="submit">
    </div>
    </div>
        
        <?php                          
        } ?>
                    
        
        
    
     
    </form>
    </body>


</html>