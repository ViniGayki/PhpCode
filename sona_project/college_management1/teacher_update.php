<?php
include'college_connection.php';
error_reporting('E_ALL');
    $md= intval($_GET['rd']);
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
   
$res= mysqli_query($con,"UPDATE teacher_table SET f_name='$fname',l_name='$lname',gender='$gender',dob='$dob',address='$address',degree='$degree',salary='$salary',married='$married',phone='$phone',email='$email',note='$note' where teacher_id='".$md."'");
if($res){
    header("location:teacher_table.php");
//    echo "update teacher table";
}
else{
    echo"not update";
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
    background:darkseagreen;
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
        <h1> Teacher data Update</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <?php
            $res=mysqli_query($con,"select * from teacher_table where teacher_id='$md'");
                while($data=mysqli_fetch_array($res)){
        ?>
            
          <div id="mm">
        <input class="aa" type="text" name="f_name" value="<?php echo htmlentities($data['f_name']);?>"><br>          
        <input class="aa" type="text" name="l_name" value="<?php echo htmlentities($data['l_name']);?>"><br>
        <input class="aa" type="date" name="dob" value="<?php echo htmlentities($data['dob']);?>"><br>
        <input class="aa" style="padding:40px;padding-right:80;" type="text" name="address" value="<?php echo htmlentities($data['address']);?>"><br>
        <input class="aa" type="text" name="degree" value="<?php echo htmlentities($data['degree']);?>"><br>
        <input class="aa" type="text" name="salary" value="<?php echo htmlentities($data['salary']);?>"><br>
        <input class="aa" type="text" name="phone" value="<?php echo htmlentities($data['phone']);?>"><br>     
        <input class="aa" type="email" name="email" value="<?php echo htmlentities($data['email']);?>"><br>
        <input class="aa" style="padding:40px;padding-right:80;" type="text" name="note" value="<?php echo htmlentities($data['note']);?>"><br>
              <?php
              if($data['gender']=='female'){
                  ?>
       <input type="radio" name="gender" value="<?php echo htmlentities($data['gender']);?>" checked style="margin-left: -450px;"><span style="font-size:20px;">female</span><input type="radio" name="gender" value="male"><label style=" font-size:20px;">male</label><br>
              <?php
              }else{
                ?>
     <input type="radio" name="gender" value="female" style="margin-left: -450px;"><span style="font-size:20px;">female</span><input type="radio" name="gender" value="<?php echo htmlentities($data['gender']);?>"checked><label style=" font-size:20px;">male</label><br> 
              <?php
              }if($data['married']=='yes'){
                  ?>
                   <input type="radio" name="married" value="<?php echo htmlentities($data['married']);?>" checked style="margin-left: -378px;"><label style=" font-size:20px;">married</label>
            <input type="radio" name="married" value="no"><label style=" font-size:20px;">Unmarried</label><br>
                 <?php
                 }else{
                  ?>
                  <input type="radio" name="married" value="yes" style="margin-left: -378px;"><label style=" font-size:20px;">married</label>
            <input type="radio" name="married" value="<?php echo htmlentities($data['married']);?>"checked><label style=" font-size:20px;">Unmarried</label><br>
               <?php   
              }
              ?>
              <input class="aa" style="background-color:green; margin-left:50px;color:white;padding:20px" type="submit" name="submit" value="submit">
            </div>
            <?php
                }
            ?>
            
        
        
        
        </form>
    
    </body>
    
</html>