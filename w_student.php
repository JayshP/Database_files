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
<title>Student</title>
</head>
<body>
<center>
<pre>	</pre>
<div style="float:right">
<a href="welcome.html">LOG OUT</a>
</div>
<?php
$user=$_SESSION["user"];
echo "<h2><center>Welcome ".$user."</center></h2>";
if(isset($_GET["submit"]))
{
	//echo "part1";
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
  // echo 'Connected successfully';
mysqli_select_db($conn,'Student_info');
$sql="select * from personal where username='".$user."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$sql1="select * from dept_info where dept_no='".$row['dept_id']."'";
$retval1=mysqli_query($conn,$sql1);
if(! $retval1 ) {
      die('Could not get data: ');
   }
else
{
$row1=mysqli_fetch_assoc($retval1);
$dept=$row1['dept'];
//echo "this is department $dept<br>";
}
?>
<table border="1">
<tr><th>Name</th><th>Address</th><th>Father's Name</th><th>Phone No.</th><th>Gender</th><th>DOB</th><th>Department</th><th>E-Mail</th><th>City</th><th>Zip</th></tr>
<?php
//echo "Name|Address |Father's_Name |Phone_No	|Gender	|DOB	|Department	|City	|Zip	|E-mail<br>";
echo "<tr><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["f_name"]."</td><td>".$row["phone_no"]."</td><td>".$row["gender"]."</td><td>".$row["DOB"]."</td><td>".$dept."</td><td>".$row["E_mail"]."</td><td>".$row["city"]."</td><td>".$row["zip"]."</td></tr>";
?>
</table>
<?php
?>
<p>Click Here to Update Your Information</p>
<p>Select the Fields you want to update</p>
<form action="w_student.php" method="get">
<p>Select the fields to be updated and enter the new corresponding record</p>
<input type="checkbox" name="option[]" value="ad"/>Address<br>
<input type="text" name="add"><br><br>
<input type="checkbox" name="option[]" value="ph"/>Phone_No<br>
<input type="text" name="ph_no"><br><br>
<input type="checkbox" name="option[]" value="c"/>City<br>
<input type="text" name="city"><br><br>
<input type="checkbox" name="option[]" value="z"/>Zip<br>
<input type="text" name="zip"><br><br>
<input type="checkbox" name="option[]" value="e"/>E-Mail<br><br>
<input type="text" name="email1"/>  @  <input type="text" name="email2"/><br><br><br>
<input type="submit" value="Update" name="Update"/>
</form>
<?php
}
}
elseif(isset($_GET['Update']))
{
	$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   $user=$_SESSION["user"];
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
if($o[$i]=='ad')
{
$addr=$_GET['add'];
$sql="update personal set address='".$addr."' where username='".$user."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='ph')
{
$ph=$_GET['ph_no'];
$sql="update personal set phone_no='".$ph."' where username='".$user."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='c')
{
$city=$_GET['city'];
$sql="update personal set city='".$city."' where username='".$user."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='z')
{
$zip=$_GET['zip'];
$sql="update personal set zip='".$zip."' where username='".$user."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='e')
{
$e1=$_GET['email1'];
$e2=$_GET['email2'];
$email="$e1(at)$e2";
$sql="update personal set E_mail='".$email."' where username='".$user."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
}
}
}
elseif(isset($_GET['hostel']))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected successfully<br>';
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
	echo "<tr><td>".$nam." </td><td>".$row["block"]."</td><td>".$row["flat"]."</td><td>".$row["year"]."</td></tr><br>";
}
?>
</table>
<?php
}
   
}

elseif(isset($_GET['clubs']))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected successfully<br>';
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
	echo "<tr><td>".$nam."</td><td>".$club."</td></tr><br>";
}
?>
</table>
<?php
}
   
}
elseif(isset($_GET['games']))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected successfully<br>';
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
	echo "<tr><td>".$nam."</td><td>".$game."</td><td>".$event."</td><td>".$part."</td></tr><br>";
}
?>
</table>
<?php
}
   
}
elseif(isset($_GET['cult']))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected successfully<br>';
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
	echo "<tr><td>".$nam."</td><td>".$act."</td><td>".$event."</td><td>".$part."</td></tr><br>";
}
?>
</table>
<?php
}
   
}
elseif(isset($_GET['paper']))
{
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected successfully<br>';
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
	
	echo "<tr><td>".$nam." </td><td>".$row['title']."</td>&nbsp; <td>".$row['name']."</td><td>".$row['issue_details']."</td><td> ".$type."</td><tr><br>";
}
?>
</table>
<?php
}
   
}
else
{
	?>
<h1>Welcome To Student Information<h1>
<p>Click here to Review Personal info</p>
<form action="w_student.php" method="get">
<input type="submit" id="submit" name="submit" value="Review"/>
</form>
<p>Click Here to view Hostel Info details<p>
<form action="w_student.php" method="get">
<input type="submit" id="hostel" name="hostel" value="View"/>
</form>
<p>Click Here to view club details<p>
<form action="w_student.php" method="get">
<input type="submit" id="clubs" name="clubs" value="View"/>
</form>
<p>Click Here to view Games details<p>
<form action="w_student.php" method="get">
<input type="submit" id="games" name="games" value="View"/>
</form>
<p>Click Here to view Cultural details<p>
<form action="w_student.php" method="get">
<input type="submit" id="cult" name="cult" value="View"/>
</form>
<p>Click Here to view Reasearch Paper details<p>
<form action="w_student.php" method="get">
<input type="submit" id="paper" name="paper" value="View"/>
</form>
<p>For query based Search</p>
<a href="try2.php">Click Here</a>
</center>
</body>
</html>
<?php
}
?>
