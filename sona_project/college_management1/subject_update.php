<?php
include'college_connection.php';
error_reporting('E_ALL');
$gt=intval($_GET['rd']);
if(isset($_POST['submit'])){
    print_r($_POST);
   $teacher=$_POST['teacher_id'];
   $faculties=$_POST['faculties_id'];
   $semester=$_POST['semester'];
   $sub_name=$_POST['sub_name'];
   $note=$_POST['note'];
    $my=mysqli_query($con,"UPDATE sub_table SET teacher_id='$teacher',faculties_id='$faculties',semester='$semester',sub_name='$sub_name',note='$note'");
    if($my){
        header("location:subject_table.php");
//        echo"data insert";
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
            <h1>SUBJECT UPDATE</h1>
            <form accesskey="#" method="post" enctype="multipart/form-data">
                <?php
                $my=mysqli_query($con,"SELECT s.sub_id,s.faculties_id,s.teacher_id,s.semester,s.sub_name,s.note,t.teacher_id AS tech_id,t.f_name AS tech_name,f.faculties_id AS fact_id,f.faculties_name AS fact_name FROM sub_table s INNER JOIN teacher_table t ON s.teacher_id= t.teacher_id INNER JOIN faculties_table f ON s.faculties_id= f.faculties_id where s.sub_id='".$gt."'");
                while($data=mysqli_fetch_array($my)){

                ?>
            <div id="mm">
            <input class="aa" type="text" name="semester" value="<?php echo htmlentities($data['semester']);?>"required><br>
            <input class="aa" type="text" name="sub_name" value="<?php echo htmlentities($data['sub_name']);?>"required><br>
            <input class="aa" style="padding:40px;padding-right:80;" type="text" name="note" value="<?php echo htmlentities($data['note']);?>"><br>
            <select name="teacher_id" onchange="getSubCat(this.value);" checked required class="aa">
            <option value="<?php echo htmlentities($data['tech_id']);?>"><?php echo htmlentities ($data['tech_name']);?></option>
                <?php
                    $tec=mysqli_query($con,"select * from teacher_table");
                    while($sata=mysqli_fetch_array($tec)){?>
                   <option value="<?php echo $sata['teacher_id'];?>"><?php echo $sata['f_name'];?></option>
                    <?php }?>
            </select>
                
                <select name="faculties_id" onchange="getSubCat(this.value);" checked required class="aa">
                 <option value="<?php echo $data['fact_id'];?>"><?php echo $data['fact_name'];?></option>
                <?php
                    $fec=mysqli_query($con,"select * from faculties_table");
                    while($tata=mysqli_fetch_array($fec)){?>
                <option value="<?php echo $tata['faculties_id'];?>"><?php echo $tata['faculties_name'];?></option>
                    <?php }?>
                </select>
                <?php 
                }?>
                
            <input class="aa" style="background-color:green; margin-left:50px;color:white;padding:20px" type="submit" name="submit" value="submit">
            </div>
                
            
            
            
            
            </form>
        
        
        </body>

</html>