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
$act=$_GET["act"];
$ev=$_GET["event"];
$prt=$_GET["part"];
echo $roll,$act,$ev,$prt;
$sql="select * from activity where act='".$act."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$a_id=$row['act_id'];
echo $a_id;
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
$sql2="select * from e_act where event='".$ev."'";
$retval2= mysqli_query($conn,$sql2);
 if(! $retval2 ) {
      die('Could not get data: ');
   }
else
{
$row2=mysqli_fetch_assoc($retval2);
$e_id=$row2['e_id'];
echo $e_id;
}
$sql="select * from p_act where part='".$prt."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row1=mysqli_fetch_assoc($retval);
$p_id=$row1['p_id'];
echo $p_id;
}
$sql1="insert into cultural_act (id,activity_id,event_id,part_id) values('".$id."','".$a_id."','".$e_id."','".$p_id."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }
}   
?>
<fieldset>
<legend>Cultural Details</legend>
<form action="Cultural1.php" method="get">
Roll ID :  <input type="text" name="roll" align="center"/>
<br>
<br>
Activity :  <input type="text" name="act"/>
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
</body>
<a href="w_Admin.php">Home</a>
</html>