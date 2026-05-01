<?php
session_start();
$username = $_SESSION["Name"] ?? "";
//$Email = $_SESSION["Email"] ?? "";
$password = $_SESSION["Password"]?? "";
$NameError = $_SESSION["NameError"]?? "";
//$EmailError = $_SESSION["EmailError"]?? "";
$PassError = $_SESSION ["PassError"]?? "";
$RegistrationError = $_SESSION["RegistrationError"] ?? "";

unset($_SESSION["Name"]);
//unset($_SESSION["Email"]);
unset($_SESSION["Password"]);
unset($_SESSION["NameError"]);
//unset($_SESSION["EmailError"]);
unset($_SESSION["PassError"]);
unset($_SESSION["RegistrationError"]);




  ?>


<html>
    <body>
        <form method = "post" action = "../Controller/loginvalidation.php">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type = "text" name = "Name"  value = "<?php echo $username;?>"/></td>
                    <td style = "color:red"><?php echo "$NameError" ?></td>
</tr>

<!--<tr>
    <td>Email</td>
    <td><input type = "text" name = "Email" value = "<?php echo $Email; ?>" </td>
    <td style = "color:red"><?php echo "$EmailError"?></td>
</tr>-->

 <tr>
    <td>Password</td>
    <td><input type = "password" name = "Password" value = "<?php echo $password; ?>" ></td>
    <td style = "color:red"><?php echo "$PassError" ?> </td>
</tr>
<tr>
    <td></td>
    
    <td><input type = "submit" name = "Log in"></td>

        <p style = "color:red"><?php echo $RegistrationError; ?></p>

</table>
                    
</form>
</body>
</html>


        