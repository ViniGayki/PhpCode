<?php 
include'college_connection.php';
$gt=intval($_GET['rd']);

if($gt!==''){
$rs=mysqli_query($con,"delete from sub_table where sub_id='$gt'");
if($rs){
        echo"data is delete";
    }else{
        echo" data is not delete";
    }


} 

?>



<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
        </head>
        <style>
        h1{text-align: center;font-size:40;color:brown;}
       </style>
    
    
    <body>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thread>
                <tr>
                <th>SR NO.</th>
                <th>faculties_name</th>
                <th>f_name</th>
                <th>semester</th>
                <th>sub_name</th>
                <th>note</th>
                    <th>sub_id</th>
                <th>Action</th>
                </tr>
             </thread>
            <tbody>
            <?php
                $count=1;
                $my=mysqli_query($con,"SELECT s.sub_id,s.faculties_id,s.teacher_id,s.semester,s.sub_name,s.note,t.f_name,f.faculties_name FROM sub_table s INNER JOIN teacher_table t ON s.teacher_id= t.teacher_id INNER JOIN faculties_table f ON s.faculties_id= f.faculties_id");
                while($data=mysqli_fetch_array($my)){?>
                <tr>
                    <td><?php echo htmlentities($count);?></td>
                    <td><?php echo htmlentities($data['faculties_name']);?></td>
                    <td><?php echo htmlentities($data['f_name']);?></td>
                    <td><?php echo htmlentities($data['semester']);?></td>
                    <td><?php echo htmlentities($data['sub_name']);?></td>
                    <td><?php echo htmlentities($data['note']);?></td>
                    <td><?php echo htmlentities($data['sub_id']);?></td>
                    <td><a href="subject_table.php?rd=<?php echo htmlentities($data['sub_id']);?>">DELETE</a>
                    <a href="subject_update.php?rd=<?php echo htmlentities($data['sub_id']);?>">UPDATE</a></td>
                    <?php
                        $count++;                          
                        }?>
                    
                    
                    
                </tr>
            </tbody>
        </table>
            <script>
    $(document).ready(function() {$('#example').DataTable();});    
    </script>
    </body>
    </html>
    