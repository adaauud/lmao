<?php
session_start();
$mysqli = new mysqli('localhost','root','','LMAO');

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $school = $_POST['school'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $code = rand(1000,1000000);
    $sql = "INSERT INTO userreg (firstname, lastname, username,school,email,gender,password,code)
    VALUES ( '$firstname','$lastname','$username','$school','$email','$gender','$password','$code')";
    mysqli_query($mysqli, $sql);
    header('location:\LMAO/User/index.php');
    $_SESSION['username'] = $username;
    $_SESSION['code'] = $code;
}
?>