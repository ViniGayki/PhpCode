<?php
@session_start();
include 'college_connection.php';
$_SESSION['abc']=="";
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="college_login.php";
</script>