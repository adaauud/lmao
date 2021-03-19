<?php
error_reporting(0);
session_start();
include_once ('chat.db.php');
$name = $_SESSION['name'];
$usercode = $_SESSION['code'];
$conn = mysqli_connect('localhost','root','','LMAO');
$data = "SELECT * FROM groups WHERE name='$name'";
$result = mysqli_query($conn,$data);
$row = mysqli_fetch_assoc($result);
$groupcode = $row['code'];
$creator = $row['usercode'];
$creator_name = $row['firstname'];
//Getting the name of the user
$info = "SELECT * FROM userreg WHERE code='$usercode'";
$results = mysqli_query($conn,$info);
$rows = mysqli_fetch_assoc($results);
$username = $rows['firstname'];
if(isset($_POST['invite'])){
    $_SESSION['creatorcode'] = $usercode;
    $_SESSION['groupcode'] = $groupcode;
    $_SESSION['name'] = $name;
    header('location:invite.php');
}
$total = "SELECT * FROM groupinvite where groupcode = '$groupcode'";
$result = mysqli_query($conn,$total);
$numrows = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title>LMAO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/c9fd9c0489.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="chat.css">
<style>
.topnav {
  overflow: hidden;
  background-color: #333;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
}
.topnav a {
  float: left;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.invite{
    color:white;
    font-size:18px;
    cursor:pointer;
}
.invite:hover{
    color:blue;
}
.right{
    width:70%;
    background:none;
    float:right;
    margin-top:60px;
}
button{
    background:none;
    border:none;
}
i{
    font-size:20px;
}
.chat{
    background-color: #fce195;
    padding: 2px;
    margin-top:10px;
    width:40%;
    margin-left:500px;
    -webkit-border-radius: 50px;
-moz-border-radius: 50px;
border-radius: 50px;
}
.chat-right{
    margin-left:10px;
    background-color: #e9ffd9;
    padding: 2px;
    margin-top:10px;
    width:40%;
    -webkit-border-radius: 50px;
-moz-border-radius: 50px;
border-radius: 50px;
}
.chat p, .chat-right p{
    margin-left:10px;
}
.time-right {
  float: right;
  color: #aaa;
}
.left{
    position:fixed;
    margin-top:43px;
    width:380px;
    height:100%;
    background:gray;
}
.left h4{
    text-align:center;
    font-size:23px;
}
.left h6{
    margin-top:-20px;
}
.buttons{
    margin-left:70px;
    margin-top:60px;
    margin-bottom:80px;
}
.buttons button{
    background:purple;
    padding:7px;
    margin-right:10px;
    color:white;
    cursor:pointer;
    -webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
}
.css-input {
     padding: 11px;
     font-size: 13px;
     border-width: 2px;
     border-color: #CCCCCC;
     background-color: #FFFFFF;
     color: #000000;
     border-style: solid;
     border-radius: 15px;
     box-shadow: 0px 0px 5px rgba(66,66,66,.75);
     text-shadow: 0px 0px 5px rgba(66,66,66,.75);
     width:80%;
    margin-top:280px;
    margin-left:10px;
}
 .css-input:focus {
     outline:none;
}
.username{
    color:blue;
    float:right;
}
.username p{
    font-size:14px;
    margin-top:-50px;
    margin-right:20px;
}
.info{
    margin-left:0px;
    margin-top:90px;
    margin-bottom:0px;
}
.info h6{
    text-align:center;
    font-size:20px;
    background:red;
}
.info p{
    margin-left:20px;
}
.info button{
    background:purple;
    padding:5px;
    margin-left:120px;
    width:100px;
    margin-top:50px;
    cursor:pointer;
}
</style>
</head>
<body>
<div class="topnav">
  <a href="\LMAO/User/index.php">Back</a>
  <a><form method="post"><button class="invite"name="invite">Invite</button></form></a>
  <a><form method="post"><button class="invite"name="leave">Leave</button></form></a>
  <a href="#contact.html">Contact</a>
</div>
<h3>LMAO</h3>
<div class="right">
    <?php
		$data = "SELECT * FROM messages WHERE groupcode= '$groupcode'";
		$result = mysqli_query($mysqli,$data);
	?>
	<?php
		while ($row = mysqli_fetch_assoc($result)):
	?>
    <?php if($row['username'] == $username): ?>
     <div class="chat-right">
        <p><?php  echo $row['message'];  ?></p>
    </div>
    <?php else: ?>
    <div class="chat">
        <p><?php  echo $row['message'];  ?></p>
        <div class="username">
            <p><?php  echo $row['username'];  ?></p>
        </div>
    </div>
    <?php
    endif;
    endwhile;
    ?>
</div>
<div class="left">
    <h4><?php  echo $name ?></h4>
    <?php if($usercode == $creator):  ?>
    <div class="buttons">
        <button>Members</button>
        <button>Delete</button>
        <button>Remove</button>
    </div>
    <?php else: ?>
    <div class="info">
        <h6>General Info</h6>
        <p> Creator: <?php echo $creator_name; ?></p>
        <p> Members: <?php echo $numrows + 1; ?></p>
    </div>
    <?php endif; ?>
    <form method="post">
            <input name="usercode" value="<?php echo $usercode ?>" hidden="hidden">
            <input name="groupcode"  value="<?php echo $groupcode ?>" hidden="hidden">
            <input name="username"  value="<?php echo $username ?>" hidden="hidden">
            <input name="time"  value="<?php echo date("h:i:sa");?>" hidden="hidden">
            <input type="text" class="css-input" name="message" />
            <button name="send"></button>
    </form>
</div>
</body>
</html>