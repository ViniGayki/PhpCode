<?php
include'college_connection.php';
 error_reporting('0');
$dd=intval($_GET['rd']);
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
    $res=mysqli_query($con,"UPDATE student_table SET f_name ='$fname',l_name ='$lname',gender='$gender', dob='$dob',pob ='$pob',address ='$address',phone ='$phone',email ='$email',note ='$note' where stu_id='".$dd."'");
 if($res){
      header("location:student_table.php");
    }
    else{                   
        echo"data not insert";
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
    <h1> Student data Update</h1>
    
    <form action="#" method="post" enctype="multipart/form-data">
        
        
        <?php
        $ss=mysqli_query($con,"select * from student_table where stu_id='$dd'");
        while($tata=mysqli_fetch_array($ss))//required all data variable show//
         {
             
             ?>
        <div id="mm">
        <input class="aa" type="text" name="f_name" value="<?php echo htmlentities($tata['f_name']);?>"><br>          
        <input class="aa" type="text" name="l_name" value="<?php echo htmlentities($tata['l_name']);?>"><br>
        <input class="aa" type="date" name="dob" value="<?php echo htmlentities($tata['dob']);?>"><br>
             <input class="aa" type="text" name="pob" value="<?php echo htmlentities($tata['pob']);?>"><br>
       <input class="aa" style="padding:40px;padding-right:80;" type="text" name="address" value="<?php echo htmlentities($tata['address']);?>"><br>
        <input class="aa" type="text" name="phone" value="<?php echo htmlentities($tata['phone']);?>"><br>
        <input class="aa" type="email" name="email" value="<?php echo htmlentities($tata['email']);?>"><br>
        <input class="aa" style="padding:40px;padding-right:80;" type="text" name="note" value="<?php echo htmlentities($tata['note']);?>" placeholder="Enter note:-"><br>
        <?php
            if($tata['gender']=='female'){
                ?>
                <input type="radio" name="gender" value="<?php echo htmlentities($tata['gender']);?>" checked><span style="font-size:20px;">female</span>
                <input type="radio" name="gender" value="male"><label style=" font-size:20px;">male</label>
            <?php 
            }else{ ?>
            <input type="radio" name="gender" value="female"><span style="font-size:20px;">female</span>
            <input type="radio" name="gender" value="<?php echo htmlentities($tata['gender']);?>" checked><label style=" font-size:20px;">male</label>
           <?php } ?>
            
        <input class="aa" style="background-color:green; margin-left:50px;color:white;padding:20px" type="submit" name="submit" value="submit">
            <?php
        }
        ?>
                                                                                                                                                  
        
             
         </div>
        </form>
    </body>

</html>