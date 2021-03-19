<?php
session_start();
$mysqli = new mysqli('localhost','root','','LMAO');

if(isset($_POST['send'])){
    $message = $_POST['message'];
    $usercode = $_POST['usercode'];
    $groupcode = $_POST['groupcode'];
    $username = $_POST['username'];
    $time = $_POST['time'];
    $sql = "INSERT INTO messages (message,usercode,groupcode,username,time)
    VALUES ( '$message','$usercode','$groupcode','$username','$time')";
    mysqli_query($mysqli, $sql);
}
?>