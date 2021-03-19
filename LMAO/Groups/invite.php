<?php
include_once ('invite.db.php');
session_start();
$creatorcode = $_SESSION['creatorcode'];
$groupcode = $_SESSION['groupcode'];
$groupname = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>LMAO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/c9fd9c0489.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="chat.css">
</head>
<body>
<div class="topnav">
  <a href="#contact.html">Contact</a>
  <a href="\LMAO/Groups/index.php">Back</a>
</div>
<h3>LMAO</h3>
<form method="post">
    <input type="text" name="usercode">
    <input type="text" name="creatorcode" value="<?php  echo $creatorcode;  ?>">
    <input type="text" name="groupcode" value="<?php  echo $groupcode;  ?>">
    <input type="text" name="groupname" value="<?php  echo $groupname;  ?>">
    <input type="submit" name="invite">
</form>
</body>
</html>