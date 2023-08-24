
<?php
include 'database_connection.php';
error_reporting('All');
$gt = intval($_GET['rd']);
if ($gt != '') {
	$del = mysqli_query($con, "delete from stu_insert where id='$gt'");
	if ($del) {

		echo "data is delete";
	} else {
		echo "data is not delete";
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
       h1{text-align: center;font-size:40;color:brown;text-underline-position: below}
        </style>
        <body>

           <table id="example" class="table table-striped table-bordered" style="width:100%">
               <h1>RECORD TABLE</h1>
                <thead>
                    <tr>
                    <th>SN NO</th>
                    <th>Stu_name</th>
                    <th>Stu_lastname</th>
                    <th>Stu_add</th>
                    <th>Action</th>
                    </tr>
                 </thead>
                <tbody>
                    <?php
$count = 1;
$sel = mysqli_query($con, "select * from stu_insert");
while ($data = mysqli_fetch_array($sel)) {
	?>

                    <tr>

                    <td><?php echo htmlentities($count) ?></td>
                    <td><?php echo htmlentities($data['stu_name']); ?></td>
                    <td><?php echo htmlentities($data['stu_lastname']); ?></td>
                    <td><?php echo htmlentities($data['stu_add']); ?></td>
                    <td><a href="update.php?rd=<?php echo htmlentities($data['id']); ?>">UPDATE</a>
                        <a href="show_table.php?rd=<?php echo htmlentities($data['id']) ?>">DELETE</a>
                        </td>
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