<!DOCTYPE html>
<html>
<head>
<title>Student Form</title>
</head>
<body>
<h1>Student Hostel Infromation </h1>
<?php
if(isset($_GET["submit"]))
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
$roll=$_GET["roll"];
$blk=$_GET["block"];
$fl=$_GET["flat"];
$yr=$_GET["year"];
echo "Roll=$roll , Year=$yr";
$sql="select * from personal where id='".$roll."'";

 $retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$id=$row['id'];
$sql1="insert into hostel_info (id,block,flat,year) values('".$id."','".$blk."','".$fl."','".$yr."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: Invalid Input');
   }			
}
}
?>
<fieldset>
<legend>Hostel Details</legend>
<form action="Hostel1.php" method="get">
Roll ID :  <input type="text" name="roll" align="center"/>
<br>
<br>
Block :  <input type="text" name="block"/>
<br>
<br>
Flat Number :  <input type="text" name="flat"/>
<br>
<br>
Year :  <input type="number" name="year"/>
<br>
<br>
<input type="submit" id="submit" name="submit" value="submit"/>
</form>
</fieldset>
</body>
<a href="w_Admin.php">Home</a>
</html>