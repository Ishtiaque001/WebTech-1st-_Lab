<?php
include "../Model/DatabaseConnection.php";
session_start();

 $username = $_POST["Name"]; //Request to get username
// $Email = $_POST["Email"];
 $password = $_POST["Password"];

 $hasNameError = false;
 //$hasEmailError = false;
 $hasPassError = false;
 $hasRegistrationError = false;

 if(!$username){
    $hasNameError = true;
    $_SESSION ["NameError"] = "Name is incorrect";
     
 }
 else{
  
    unset($_SESSION ["NameError"]);
 }
/*if(!$Email){
    $hasEmailError = true;
    $_SESSION["EmailError"] = "Email is incorrect";
}
else{
  //  $hasEmailError = false;
    unset($_SESSION["EmailError"]);
}*/
if(!$password){
    $hasPassError = true;
    $_SESSION["PassError"] = "Password is incorrect";
}
else{
  
    unset($_SESSION["PassError"]);
}
if($hasNameError ||  $hasPassError){
  $username = $_SESSION["Name"];
  Header("Location: ../View/Login.php");
  exit();
}
else{
   $hasRegistrationError = false;
}
 /*  $users = array("Abbas"=>"patowary@gmail.com");
   foreach($users as $user=> $email){
    if($email==$Email){
      
        $_SESSION ["RegistrationError"]= "This email is already exist";
        Header("Location: ../View/Login.php");
        exit();
    }
    else{
        $hasRegistrationError = true;
       $Name = $_SESSION["Name"] ;
        Header("Location: ../View/Registrationsuccess.php");
        exit();*/
    
      $db = new DatabaseConnection();
$connection = $db->openConnection();
$result = $db->signIn($connection, "users", $username, $password);

// Check if a user was actually found
if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $_SESSION["isLoggedIn"] = true;
    $_SESSION["id"] = $row["id"];
    $_SESSION["Name"] = $row["username"]; // Match variable name in success page
    
    header("Location: ../View/Registrationsuccess.php");
    exit();
} else {
    // If no user found or query failed
    $_SESSION["RegistrationError"] = "Username or password is incorrect!";
    header("Location: ../View/Login.php");
    exit();
}
     


?>