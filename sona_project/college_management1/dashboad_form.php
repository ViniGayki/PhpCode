
<?php
include 'college_connection.php';
@session_start();//predifine fuction 
echo $mysession= $_SESSION['abc'];
?>
<html>
    <head>
 <style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
    </head> 
    <body>
        <h1> Dashboad</h1>

        <?php
        
        if($mysession=='student'){
            
            ?>
        <div class="dropdown">
    <button class="dropbtn">student</button>
<div class="dropdown-content">
   <a href="student_insert.php">Add Student Reg</a>
   
        </div>
    </div>
        <?php
        }
        elseif($mysession=='techer'){
        ?>
<div class="dropdown">
    <button class="dropbtn">teacher</button>
<div class="dropdown-content">
   <a href="Teacher_insert.php">Add Student Reg</a>
   <a href="teacher_table.php">Student Details</a>
        </div>
</div>
 <div class="dropdown">
    <button class="dropbtn">Student</button>
<div class="dropdown-content">
   <a href="student_insert.php">Add Student Reg</a>
   <a href="student_table.php">Student Details</a>
        </div>
</div>
    
    <?php
        }
        else{
            ?>
<div class="dropdown">
    <button class="dropbtn">teacher</button>
<div class="dropdown-content">
   <a href="Teacher_insert.php">Add teacher Reg</a>
   <a href="teacher_table.php">teacher Details</a>
    </div></div>
 <div class="dropdown">
    <button class="dropbtn">Student</button>
<div class="dropdown-content">
   <a href="student_insert.php">Add Student Reg</a>
   <a href="student_table.php">Student Details</a>
        </div>

</div>
<div class="dropdown">
    <button class="dropbtn">Subject</button>
<div class="dropdown-content">
   <a href="">Add subject Reg</a>
   <a href="">subject Details</a>
        </div>
</div>
<button class="dropbtn"><a href="logout.php">logout</a></button>
            <?php
        }
        ?>
        </body>

</html>