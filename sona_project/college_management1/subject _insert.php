<?php
include'college_connection.php';
if(isset($_POST['submit'])){
   $teacher=$_POST['teacher_id'];
   $faculties=$_POST['faculties_id'];
   $semester=$_POST['semester'];
   $sub_name=$_POST['sub_name'];
   $note=$_POST['note'];
    $my=mysqli_query($con,"INSERT INTO sub_table(teacher_id,faculties_id,semester,sub_name,note)VALUES('$teacher','$faculties','$semester','$sub_name','$note')");
    if($my){
        echo"data insert";
    }else{
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
        <h1>Subject details</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <div id="mm">
            <input class="aa" type="text" name="semester" placeholder="Enter semester name" required><br>
            <input class="aa" type="text" name="sub_name" placeholder="Enter sub_name" required><br>
            <input class="aa" style="padding:40px;padding-right:80;" type="text" name="note" placeholder="Enter note:-"><br>
                
                <select name="teacher_id" onchange="getSubCat(this.value);" required class="aa">
                <option value="">Select teacher</option>
                <?php
                    $tec=mysqli_query($con,"select * from teacher_table");
                    while($data=mysqli_fetch_array($tec)){?>
                   <option value="<?php echo $data['teacher_id'];?>"><?php echo $data['f_name'];?></option>
                   <?php }?>
                </select>
                
                <select name="faculties_id" onchange="getSubCat(this.value);" required class="aa">
                <option value="">Select faculties</option>
                <?php
                    $fec=mysqli_query($con,"select * from faculties_table");
                    while($tata=mysqli_fetch_array($fec)){?>
                    <option value="<?php echo $tata['faculties_id'];?>"><?php echo $tata['faculties_name'];?></option>
                    <?php }?>
                </select>
            <input class="aa" style="background-color:green; margin-left:50px;color:white;padding:20px" type="submit" name="submit" value="submit">
            </div>
        </form>
    </body>
</html>