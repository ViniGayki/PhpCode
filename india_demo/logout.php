<html>
<?php
include 'database_connection.php';
    @session_start();
    $_SESSION['abc']==" ";
    session_unset();
    session_destroy();

?>
<script language="javascript">
document.location="login.php";
</script>
</html>