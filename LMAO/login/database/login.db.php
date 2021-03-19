<?php
session_start();
$conn = mysqli_connect('localhost','root','','LMAO');
if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $data = "SELECT * FROM userreg WHERE username='$username' AND password = '$password'";
	$result = mysqli_query($conn,$data);
    $row = mysqli_fetch_assoc($result);
    if($row['username'] == $username && $row['password'] == $password){
        header('location: \LMAO/User/index.php');
        $sql = "SELECT * FROM userreg WHERE username='$username' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['code'] = $row['code'];
        $_SESSION['username'] = $row['username'];
    }
}

?>