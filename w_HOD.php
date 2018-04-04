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
<title>HOD</title>
</head>
<body>
<div style="float:right">
<a href="welcome.html">LOG OUT</a>
</div>
<center>
<?php
$user=$_SESSION["user"];
echo "<h2><center>Welcome ".$user."</center></h2>";
if(isset($_GET["update"]))
{
	if($_GET["up"]=="papers")
{
	$roll=$_GET["idpap"];
	$nam=$_GET["idpnam"];
	$_SESSION["id"]=$roll;
	$_SESSION["prnam"]=$nam;
	?>
	<p>Select the Fields you want to update</p>
<form action="w_HOD.php" method="get">
<p>Select the fields to be updated and enter the new corresponding record</p>
<input type="checkbox" name="option[]" value="title"/>Title<br>
<input type="text" name="title"><br><br>
<input type="checkbox" name="option[]" value="issue"/>Issue Details<br>
<input type="text" name="issue"><br><br>
<input type="checkbox" name="option[]" value="type"/>Paper Type<br>
<input type="text" name="type"><br><br>
<input type="submit" value="Update" name="UpdatePap"/>
</form>
<?php
}
}
elseif(isset($_GET["submit"]))
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
elseif(isset($_GET["UpdatePap"]))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   $roll=$_SESSION["id"];
$name=$_SESSION["prnam"];   
   //$user=$_SESSION["user"];
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected successfully<br>';
   mysqli_select_db($conn,'Student_info');
   $o = $_GET['option'];
if(empty($o)) 
{
echo("You didn't select any.");
} 
else
{
	$N = count($o);
echo("You selected $N option(s): ");
for($i=0; $i < $N; $i++)
{
	if($o[$i]=='title')
{
$title=$_GET['title'];
echo $title;
$sql="update papers set title='".$title."' where id=".$roll." and name='".$name."'";
//echo $sql;
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='issue')
{
$issue=$_GET['issue'];
$sql="update papers set issue_details='".$issue."' where id=".$roll." and name='".$name."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='type')
{
$type=$_GET['type'];
$d="select type_id from type_papers where type='".$type."'";
$retval1= mysqli_query($conn,$d);
while($row=mysqli_fetch_assoc($retval1))
{
$x=$row['type_id'];	
}
$sql="update papers set type=".$x." where id=".$roll." and name='".$name."'";
echo $sql;
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
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
<br>
<p><b>Add new Research Paper Details</b></p>
<a href="Papers1.php"><b>Click Here</b></a>
<br>
<form action="w_HOD.php" method="get">
<p><b>Update Research Paper Details</b></p><br>
<input type="radio" name="up" value="papers">
Research Papers Info ID =&nbsp; <input type="text" name="idpap" placeholder="id"><br>
Paper Name&nbsp;=&nbsp;<input type="text" name="idpnam" placeholder="id"><br>
<input type="submit" id="update" name="update" value="Submit">
</form>