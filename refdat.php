<!DOCTYPE html>
<html>
<head>
<title>Update Databsse</title>
</head>
<body>
<h1>Update Database </h1>
<?php
if(isset($_GET["sdept"]))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: Wrong Input');
   }
   
   echo ' Connected successfully ';
mysqli_select_db($conn,'Student_info');
$dept=$_GET["dept"];
$sql="insert into dept_info (dept) values ('".$dept."')";
//echo $sql;
 $retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
echo "New Department Added";
}
}
//adding evnet
if(isset($_GET["ev"]))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: Wrong Input');
   }
   
   echo ' Connected successfully ';
mysqli_select_db($conn,'Student_info');
$c=$_GET["v"];
$event=$_GET["event"];
if($c=='g')
{
$sql="insert into e_game (event) values ('".$event."')";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
echo "New Event Added in Games";
}
}
if($c=='c')
{
$sql="insert into e_act (event) values ('".$event."')";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
echo "New Event Added in cultural events";
}
}
}
//new game or new activity
if(isset($_GET["ag"]))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: Wrong Input');
   }
   
   echo ' Connected successfully ';
mysqli_select_db($conn,'Student_info');
$c=$_GET["v"];
$acga=$_GET["acga"];
if($c=='g')
{
$sql="insert into game_id (game) values ('".$acga."')";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
echo "New Game Added in Games";
}
}
if($c=='c')
{
$sql="insert into activity (act) values ('".$acga."')";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
echo "New Activity Added in cultural";
}
}
}
//club
if(isset($_GET["cl"]))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: Wrong Input');
   }
   
   echo ' Connected successfully ';
mysqli_select_db($conn,'Student_info');
$club=$_GET["club"];
$sql="insert into clubs_details (club) values ('".$club."')";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
echo "New Club Added";
}
}
?>
<fieldset>
<p>Add New Department</p>
<legend>Department</legend>
<form action="refdat.php" method="get">
Department :  <input type="text" name="dept" align="center"/><br>
<br>
<input type="submit" id="submit" name="sdept" value="submit"/>
</form>
</fieldset>
<fieldset>
<p>Add New Event</p>
<legend>Event</legend>
<form action="refdat.php" method="get">
<input type="radio" name="v" value="g"/>Games</br>
<input type="radio" name="v" value="c"/>Cultural</br><br>
New Event :  <input type="text" name="event" align="center"/><br>
<br>
<input type="submit" id="submit" name="ev" value="submit"/>
</form>
</fieldset>
<fieldset>
<p>Add New Game / Activity</p>
<legend>Game/Activity</legend>
<form action="refdat.php" method="get">
<input type="radio" name="v" value="g"/>Games</br>
<input type="radio" name="v" value="c"/>Cultural</br>
<br>
New Game/Activity :  <input type="text" name="acga" align="center"/><br>
<br>
<input type="submit" id="submit" name="ag" value="submit"/>
</form>
</fieldset>
<p>Add new Club</p>
<fieldset>
<legend>Game/Activity</legend>
<form action="refdat.php" method="get">

New Club:  <input type="text" name="club" align="center"/><br>
<br>
<input type="submit" id="submit" name="cl" value="submit"/>
</form>
</body>
<a href="w_Admin.php">Home</a>
</html>