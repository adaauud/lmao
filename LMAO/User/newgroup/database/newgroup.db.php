<?php
session_start();
$mysqli = new mysqli('localhost','root','','LMAO');

if(isset($_POST['create'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $name = $_POST['gname'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $code = rand(1000,1000000);
    $usercode = $_POST['usercode'];
    $sql = "INSERT INTO groups (firstname, lastname, name, email, category, code,usercode)
    VALUES ('$first_name', ' $last_name', '$name', '$email', '$category', '$code','$usercode')";
    mysqli_query($mysqli, $sql);
    header('location:\LMAO/User/index.php');
}
?>