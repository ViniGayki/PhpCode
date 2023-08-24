<?php
include 'database_connection.php';

if (!empty(isset($_POST['emailId'])) && isset($_POST['emailId'])) {

	$emailInput = $_POST['emailId'];
	checkEmail($con, $emailInput);

}

function checkEmail($con, $emailInput) {

	$query = "SELECT email FROM users WHERE email='$emailInput'";
	$result = $con->query($query);
	if ($result->num_rows > 0) {
		echo "<span style='color:red'>This Email is alredy exists </span>";
	}
}