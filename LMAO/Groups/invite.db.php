<?php
$mysqli = new mysqli('localhost','root','','LMAO');

if(isset($_POST['invite'])){
    $usercode = $_POST['usercode'];
    $groupcode = $_POST['groupcode'];
    $creatorcode = $_POST['creatorcode'];
    $groupname = $_POST['groupname'];
    $sql = "INSERT INTO groupinvite (usercode, groupcode,groupname, creatorcode)
    VALUES ( '$usercode','$groupcode','$groupname','$creatorcode')";
    mysqli_query($mysqli, $sql);
    header('location:\LMAO/Groups/index.php');
}
?>