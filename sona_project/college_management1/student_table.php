<?php
include'college_connection.php';
 error_reporting('All');
 $uid = intval($_GET['rd']);
if($uid!==''){
$a=mysqli_query($con,"delete from student_table where stu_id='$uid'");
if($a){
    echo "data delete succussesfully";
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
        <h1>Student table</h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
             <tr>
            <th>SR NO.</th>
            <th>f_name</th>
            <th>l_name</th>
            <th>gender</th>
            <th>dob</th>
            <th>pob</th>
            <th>address</th>
            <th>phone</th>
            <th>email</th>
            <th>note</th>
            <th>Action</th>
            </tr></thead>
        <tbody>
        <?php
        $count=1;
         $res=mysqli_query($con,"select * from student_table");
        $data=mysqli_fetch_all($res, MYSQLI_ASSOC);
         foreach($data as $sona){
           ?>
            <tr>
            
        <td><?php echo htmlentities($count);?></td>
        <td><?php echo htmlentities($sona['f_name']);?></td>
        <td><?php echo htmlentities($sona['l_name']);?></td>
        <td><?php echo htmlentities($sona['gender']);?></td>
        <td><?php echo htmlentities($sona['dob']);?></td>
        <td><?php echo htmlentities($sona['pob']);?></td>
        <td><?php echo htmlentities($sona['address']);?></td>
        <td><?php echo htmlentities($sona['phone']);?></td>
        <td><?php echo htmlentities ($sona['email']);?></td>
        <td><?php echo htmlentities($sona['note']);?></td>
           <td> <a href="student_update.php?rd=<?php echo htmlentities($sona['stu_id']);?>">UPDATE</a>
                <a href="student_table.php?rd=<?php echo htmlentities($sona['stu_id']);?>">DELETE</a>
            </td></tr>
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