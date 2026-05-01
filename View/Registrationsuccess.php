<?php
session_start();
// Get the name from the session
$username = $_SESSION["Name"] ?? " "
?>
<html>
<body>
    <?php echo  "Welcome to dashboard";  ?>
    <a href="logout.php" >Logout</a>
</body>
</html>