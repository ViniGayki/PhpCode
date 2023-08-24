<?php
include'college_connection.php';
echo $mona = $_POST["sona_id"];
$result = mysqli_query($con,"select * from student_table where f_name = '".$mona."'");
?>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td>Email</td>
    <td><input name="email" value="<?php echo $row["email"];?>"></td>
</tr>
<tr>
    <td>phone no.</td>
    <td><input name="phone" value="<?php echo $row["phone"];?>"></td>

<?php
}
?>

