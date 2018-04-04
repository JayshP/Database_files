<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
.body
{
align: center;
}
</style>
<title>Faculty</title>
</head>
<body>
<div style="float:right">
<a href="welcome.html">LOG OUT</a>
</div>
<center>
<?php
$user=$_SESSION["user"];
echo "<h2><center>Welcome ".$user."</center></h2>";
if(isset($_GET["submit"]))
{

$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) 
   {
      die('Could not connect: ' . mysql_error());
   }
   
   echo '<br>';
mysqli_select_db($conn,'Student_info');
$view=$_GET["view"];
if($view=='personal')
{
$sql="select * from personal";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
?>
<table border="1">
<tr><th>Name</th><th>Address</th><th>Father's Name</th><th>Phone No.</th><th>Gender</th><th>DOB</th><th>Department</th><th>E-Mail</th><th>City</th><th>Zip</th></tr>
<?php
While($row=mysqli_fetch_assoc($retval))
{
$sql1="select * from dept_info where dept_no='".$row['dept_id']."'";
$retval1=mysqli_query($conn,$sql1);
if(! $retval1 ) {
      die('Could not get data: ');
   }
else
{
$row1=mysqli_fetch_assoc($retval1);
$dept=$row1['dept'];
}
echo "<tr><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["f_name"]."</td><td>".$row["phone_no"]."</td><td>".$row["gender"]."</td><td>".$row["DOB"]."</td><td>".$dept."</td><td>".$row["E_mail"]."</td><td>".$row["city"]."</td><td>".$row["zip"]."</td></tr>";
}
?>
</table>
<?php
}
}
if($view=='hostel_info')
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) 
   {
      die('Could not connect: ' . mysql_error());
   }
   echo '<br><br>';
   mysqli_select_db($conn,'Student_info');
   $sql="select * from hostel_info";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Could not get data: ');
   }
else
{
	?>
<table border="1">
<tr><th>Name</th><th>Block</th><th>Flat</th><th>Year</th></tr>
<?php
while($row=mysqli_fetch_assoc($retval))
{
	$sql1="select name from personal where id='".$row['id']."'";
	$retval1= mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($retval1);
	$nam=$row1['name'];
	echo " <tr><td>".$nam." </td><td>".$row["block"]."</td><td>".$row["flat"]."</td><td>".$row["year"]."</td></tr>";
}
?>
</table>
<?php
}
   
}

if($view=='clubs')
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo '<br><br>';
   mysqli_select_db($conn,'Student_info');
   $sql="select * from clubs order by club_id";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Could not get data: ');
   }
else
{	
?>
<table border="1">
<tr><th>Name</th><th>Club</th></tr>
<?php
while($row=mysqli_fetch_assoc($retval))
{
	$sql1="select name from personal where id='".$row['id']."'";
	$retval1= mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($retval1);
	$nam=$row1['name'];
	$sql2="select club from clubs_details where club_id='".$row['club_id']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$club=$row2['club'];
	echo "<tr><td>".$nam."</td><td>".$club."</td></tr>";
}
?>
</table>
<?php
}
   
}
if($view=='games')
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo '<br><br>';
   mysqli_select_db($conn,'Student_info');
   $sql="select * from games";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Could not get data: ');
   }
else
{
	?>
<table border="1">
<tr><th>Name</th><th>Game</th><th>Event</th><th>Participation</th></tr>
<?php
while($row=mysqli_fetch_assoc($retval))
{
	$sql1="select name from personal where id='".$row['id']."'";
	$retval1= mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($retval1);
	$nam=$row1['name'];
	$sql2="select event from e_game where e_id='".$row['event_id']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$event=$row2['event'];
	$sql2="select game from game_id where g_id='".$row['game_id']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$game=$row2['game'];
	$sql2="select part from p_game where p_id='".$row['part_id']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$part=$row2['part'];
	echo "<tr><td>".$nam."</td><td>".$game."</td><td>".$event."</td><td>".$part."</td></tr>";
}
?>
</table>
<?php
}
}
if($view=='cult')
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo '<br><br>';
   mysqli_select_db($conn,'Student_info');
   $sql="select * from cultural_act";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Could not get data: ');
   }
else
{
	?>
<table border="1">
<tr><th>Name</th><th>Activity</th><th>Event</th><th>Participation</th></tr>
<?php
while($row=mysqli_fetch_assoc($retval))
{
	$sql1="select name from personal where id='".$row['id']."'";
	$retval1= mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($retval1);
	$nam=$row1['name'];
	$sql2="select event from e_act where e_id='".$row['event_id']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$event=$row2['event'];
	$sql2="select act from activity where act_id='".$row['activity_id']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$act=$row2['act'];
	$sql2="select part from p_act where p_id='".$row['part_id']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$part=$row2['part'];
	echo "<tr><td>".$nam."</td><td>".$act."</td><td>".$event."</td><td>".$part."</td></tr>";
}
?>
</table>
<?php
}
   
}
if($view=='papers')
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
    mysqli_select_db($conn,'Student_info');
   $sql="select * from papers";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Could not get data: ');
   }
else
{
	?>
<table border="1">
<tr><th>Name</th><th>Title</th><th>Paper Name</th><th>Issue Details</th><th>Type</th></tr>
<?php
while($row=mysqli_fetch_assoc($retval))
{
	$sql1="select name from personal where id='".$row['id']."'";
	$retval1= mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($retval1);
	$nam=$row1['name'];
	$sql2="select type from type_papers where type_id='".$row['type']."'";
	$retval2= mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($retval2);
	$type=$row2['type'];
	
	echo "<tr><td>".$nam."</td><td>".$row['title']."</td><td>".$row['name']."</td><td>".$row['issue_details']."</td><td>".$type."</td></tr><br>";
}
?>
</table>
<?php
}
}
}
?>

<form action="w_faculty.php" method="get">
<p><b>Select data you want to view..</b></p>
<input type="radio" name="view" value="personal"> Personal Info<br>
<input type="radio" name="view" value="hostel_info"> Hostel Info<br>
<input type="radio" name="view" value="clubs"> Club Info<br>
<input type="radio" name="view" value="cult"> Cultural Activity<br>
<input type="radio" name="view" value="games"> Game Info<br>
<input type="radio" name="view" value="papers">Research Papers Info<br>
<br>
<input type="submit" id="submit" name="submit" value="Submit">
</form>
<p>For Search Based On a Query Click here</p>
<a href="try.php"><b>Query Page</b></a>