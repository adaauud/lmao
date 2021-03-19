<?php
error_reporting(0);
session_start();
include_once ('..\register/database/register.php');
include_once ('..\login/database/login.db.php');
$username = $_SESSION['username'];
$code = $_SESSION['code'];
if(isset($_POST['logout'])){
	session_destroy();
	header('location:\LMAO/login/index.php');
}
if(isset($_POST['groupname'])){
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['code'] = $_POST['code'];
	header('location:\LMAO/Groups/index.php');
}
if(isset($_POST['gname'])){
	$_SESSION['name'] = $_POST['groupname'];
	$_SESSION['groupcode'] = $_POST['groupcode'];
	$_SESSION['code'] = $code;
	header('location:\LMAO/Groups/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>LMAO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/c9fd9c0489.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="user.css">
<style>
.createdbyme{
	margin-top:70px;
}
.invited{
	margin-top:300px;
}
.groups button{
	background:none;
	border:none;
	cursor:pointer;
	font-size:20px;
	color:purple;
}
</style>
</head>
<body>
<div class="topnav">
	<a ><form method="post"><button name="logout">Logout</button></form></a>
  <a><?php echo $username?></a>
  <a href="newgroup/index.php">Group <i class="fas fa-plus"></i></a>
  <a href="#contact.html">Contact</a>
  <a href="index.php">Home</a>
</div>
<h3>LMAO</h3>
<section class="createdbyme">
<h3>Created by me</h3>
	<?php
		$data = "SELECT * FROM groups WHERE usercode = '$code'";
		$result = mysqli_query($mysqli,$data);
	?>
	<?php
		while ($row = mysqli_fetch_assoc($result)):
	?>
	<div class="groups">
		<h4><form method="post"><button name="groupname"><input name="name" value="<?php echo  $row['name']?>" hidden="hidden"><input name="code" value="<?php echo  $code?>" hidden="hidden"><?php echo  $row['name']?></button></form></h4>
		<p><?php echo $row['firstname']." ". $row['lastname']  ?></p>
		<p><?php echo $row['category']    ?></p>
	</div>
	<?php
	endwhile;
	?>
</section>
<section class="invited">
	<h3>Invited To</h3>
	<?php
		$data = "SELECT * FROM groupinvite WHERE usercode = '$code'";
		$result = mysqli_query($mysqli,$data);
	?>
	<?php
		while ($row = mysqli_fetch_assoc($result)):
	?>
	<div class="groups">
		<h4><form method="post"><button name="gname"><?php echo $row['groupname']; ?></button><input type="text" hidden="hidden"name="groupname" value="<?php echo $row['groupname']; ?>"><input type="text" hidden="hidden"name="groupcode" value="<?php echo $row['groupcode'];  ?>"</form></h4>
		<p><?php echo $row['groupcode'] ?></p>
	</div>
	<?php
	endwhile;
	?>
</section>
</body>
</html>