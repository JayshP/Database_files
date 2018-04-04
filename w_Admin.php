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
<title>Admin</title>
</head>
<body>
<center>
<?php
$user=$_SESSION["user"];
echo "Welcome Admin ".$user."";
?>
<div style="float:right">
<a href="welcome.html">LOG OUT</a>
</div>
<?php
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
elseif(isset($_GET["username"]))
{

   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   echo "Accepted Successfully";
   mysqli_select_db($conn,'Student_info');
   $user=$_GET["username"];
   $pass=$_GET["pas"];
   $type=$_GET["usty"];
   //echo $user,$pass,$type;
   $sql="insert into log_in(username,password,u_type) values ('".$user."','".$pass."','".$type."')";
   $retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Could not get data: ');
   }
}
elseif(isset($_GET["update"]))
{
if($_GET["up"]=="personal")
{
	$roll=$_GET["idp"];
	$_SESSION["id"]=$roll;
	?>
	<p>Select the Fields you want to update</p>
<form action="w_Admin.php" method="get">
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
<input type="submit" value="Update" name="Updatep"/>
</form>
<?php
}
if($_GET["up"]=="hostel_info")
{
	$roll=$_GET["idh"];
	$_SESSION["id"]=$roll;
	?>
	<p>Select the Fields you want to update</p>
<form action="w_Admin.php" method="get">
<p>Select the fields to be updated and enter the new corresponding record</p>
<input type="checkbox" name="option[]" value="bck"/>Block<br>
<input type="text" name="bck"><br><br>
<input type="checkbox" name="option[]" value="fl"/>Flat<br>
<input type="text" name="flat"><br><br>
<input type="checkbox" name="option[]" value="y"/>Year<br>
<input type="text" name="year"><br><br>
<input type="submit" value="Update" name="Updateh"/>
</form>
<?php
}
if($_GET["up"]=="papers")
{
	$roll=$_GET["idpap"];
	$nam=$_GET["idpnam"];
	$_SESSION["id"]=$roll;
	$_SESSION["prnam"]=$nam;
	?>
	<p>Select the Fields you want to update</p>
<form action="w_Admin.php" method="get">
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
elseif(isset($_GET["Updatep"]))
{
	$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   $roll=$_SESSION["id"];	
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
$sql="update personal set address='".$addr."' where id=".$roll."";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='ph')
{
$ph=$_GET['ph_no'];
$sql="update personal set phone_no='".$ph."' where id=".$roll."";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='c')
{
$city=$_GET['city'];
$sql="update personal set city='".$city."' where id=".$roll."";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='z')
{
$zip=$_GET['zip'];
$sql="update personal set zip='".$zip."' where id=".$roll."";
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
$sql="update personal set E_mail='".$email."' id=".$roll."";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
}
}
}
elseif(isset($_GET["Updateh"]))
{
	$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   $roll=$_SESSION["id"];	
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
	if($o[$i]=='bck')
{
$block=$_GET['bck'];
$sql="update hostel_info set block='".$block."' where id=".$roll."";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='fl')
{
$flat=$_GET['flat'];
$sql="update hostel_info set flat='".$flat."' where id=".$roll."";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
if($o[$i]=='y')
{
$year=$_GET['year'];
$sql="update hostel_info set year=".$year." where id=".$roll."";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
	 echo "hello";
      die('Error Updating ');
   }
}
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
echo $sql;
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
<h3>Data Entry</h3>
<p><b>Choose a table to input Data</b></p>
<ul>
	<li><a href="Personal1.php">Personal Information</a>
	<li><a href="Hostel1.php">Hostel Information</a>
	<li><a href="Clubs1.php">Club Info</a>
	<li><a href="Games1.php">Games Info</a>
	<li><a href="Cultural1.php">Cultural Info</a>
	<li><a href="Papers1.php">Papers</a>
</ul>
<form action="w_Admin.php" method="get">
<p><b>Select data you want to view..</b></p>
<input type="radio" name="view" value="personal"> Personal Info<br>
<input type="radio" name="view" value="hostel_info"> Hostel Info<br>
<input type="radio" name="view" value="clubs"> Club Info<br>
<input type="radio" name="view" value="cult"> Cultural Activity<br>
<input type="radio" name="view" value="games"> Game Info<br>
<input type="radio" name="view" value="papers">Research Papers Info<br>
<input type="submit" id="submit" name="submit" value="Submit">
</form>
<p><b>Add New User who can access the Database</b></p>
<form action="w_Admin.php" method="get">
<input type="radio" name="usty" value="A">Admin<br>
<input type="radio" name="usty" value="F">Faculty<br>
<input type="radio" name="usty" value="HOD">HOD<br>
Username<input type="text" name="username"/>
<br>
Password:<input type="password" name="pas"/>
<br>
<input type="submit"name="newuser"value="Enter">
</form>
<p><b>Choose the table to be updated</b></p>
<form action="w_Admin.php" method="get">
<input type="radio" name="up" value="personal"> Personal Info   ID = <input type="text" name="idp" placeholder="id"><br>
<input type="radio" name="up" value="hostel_info"> Hostel Info  ID = <input type="text" name="idh" placeholder="id"><br>
<input type="radio" name="up" value="papers">Research Papers Info ID =&nbsp; <input type="text" name="idpap" placeholder="id">&nbsp;Paper Name<input type="text" name="idpnam" placeholder="id"><br>
<input type="submit" id="update" name="update" value="Submit">
</form>
<p>For Search Based On a Query Click here</p>
<a href="try.php"><b>Query Page</b></a>
<p>To Update Reference tables Click here</p>
<a href="refdat.php"><b>Update Table</b></a>