<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];//first value of q=index.php comes from the index page,
$email = $_POST['uname'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$result = mysqli_query($con,"SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
session_start();
if(isset($_SESSION['email'])){
session_unset();} //create sessions, so we know the user logged in.. 
//they act as a cookies, remembers the credential data on the localserver.
$_SESSION["name"] = 'Admin';
$_SESSION["key"] ='pratip';
$_SESSION["email"] = $email;
header("location:dash.php?q=0");
}
else header("location:$ref?w=Warning : Access denied");
?>