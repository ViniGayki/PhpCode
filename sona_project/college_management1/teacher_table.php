<?php
include'college_connection.php';
error_reporting('E_ALL');
$gm=intval($_GET['rd']);
if($gm!=''){
    $del=mysqli_query($con,"delete from teacher_table where teacher_id='$gm'");
    if($del){
        
        echo "data is delete";
    }
    else{
        echo "data not delete";
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
        <h1> Teacher table</h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
        <tr>
    <th>SR.NO</th>
            <th>f_name</th>
            <th>l_name</th>
            <th>gender</th>
            <th>dob</th>
            <th>address</th>
            <th>degree</th>
            <th>salary</th>
            <th>married</th>
            <th>phone</th>
            <th>email</th>
            <th>note</th>
            <th>Action</th>
            </tr>
        </thead>
            
        <tbody>
        <?php
        $count='1';
        $res=mysqli_query($con,"select * from teacher_table");
        $tata=mysqli_fetch_all($res, MYSQLI_ASSOC);
        
       foreach($tata as $data){
            ?>
        <tr>
        <td><?php echo htmlentities($count);?></td>
        <td><?php echo htmlentities($data['f_name']);?></td>
        <td><?php echo htmlentities($data['l_name']);?></td>
            <td><?php echo htmlentities($data['gender']);?></td>
            <td><?php echo htmlentities($data['dob']);?></td>
            <td><?php echo htmlentities($data['address']);?></td>
            <td><?php echo htmlentities($data['degree']);?></td>
            <td><?php echo htmlentities($data['salary']);?></td>
            <td><?php 
                if($data['married']=='yes'){
                    echo 'Married';
                }else{
                   echo 'Unmarried'; 
                }
                
                ?></td>
            <td><?php echo htmlentities($data['phone']);?></td>
            <td><?php echo htmlentities($data['email']);?></td>
            <td><?php echo htmlentities($data['note']);?></td>
           <td><a href="teacher_update.php?rd=<?php echo htmlentities ($data['teacher_id']);?>">UPDATE</a>
           <a href="teacher_table.php?rd=<?php echo htmlentities ($data['teacher_id']);?>">DELETE</a></td>
        </tr>
        <?php
           $count++;
       }
            ?>
            </tbody>
    
        </table>
    <script>
    $(document).ready(function() {$('#example').DataTable();});    
    </script>
    </body>
    </html>