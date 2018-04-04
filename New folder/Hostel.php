<?php
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
$blk=$_GET["block"];
$fl=$_GET["flat"];
$yr=$_GET["year"];
echo $roll,$yr;
$sql="select * from personal where id='".$roll."'";

 $retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$id=$row['id'];
echo $id;
$sql1="insert into hostel_info (id,block,flat,year) values('".$id."','".$blk."','".$fl."','".$yr."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }			
}
?>