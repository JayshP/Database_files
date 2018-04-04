<!DOCTYPE html>
<html>
<head>
<title>Student Form</title>
</head>
<body>
<h1>Student Infromation Form</h1>
<?php
if(isset($_GET["submit"]))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo 'Connected successfully';
mysqli_select_db($conn,'Student_info');
$roll=$_GET["roll"];
$gam=$_GET["game"];
$ev=$_GET["event"];
$prt=$_GET["part"];
echo $roll,$ev,$prt;
$sql="select * from game_id where game='".$gam."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$g_id=$row['g_id'];
echo $g_id;
}
$sql1="select * from personal where id='".$roll."'";
$retval1 = mysqli_query($conn,$sql1);
 if(! $retval1 ) {
      die('Could not get data: ');
   }
else
{
$row1=mysqli_fetch_assoc($retval1);
$id=$row1['id'];
echo $id;
}
$sql="select * from e_game where event='".$ev."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$e_id=$row['e_id'];
echo $e_id;
}
$sql="select * from p_game where part='".$prt."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$p_id=$row['p_id'];
echo $p_id;
}
$sql1="insert into games (id,game_id,event_id,part_id) values('".$id."','".$g_id."','".$e_id."','".$p_id."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }
}   
?>
<fieldset>
<legend>Game Details</legend>
<form action="Games1.php" method="get">
Roll ID :  <input type="text" name="roll" align="center"/>
<br>
<br>
Game:  <input type="text" name="game"/>
<br>
<br>
Event:  <input type="text" name="event"/>
<br>
<br>
Participation:  <input type="text" name="part"/>
<br>
<br>
<input type="submit" id="submit" name="submit" value="submit"/>
</fieldset>
<br>
<br>
</body>
<a href="w_Admin.php">Home</a>
</html>