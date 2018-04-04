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
$clb=$_GET["club"];
echo $roll,$clb;
$sql="select * from clubs_details where club='".$clb."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$c_id=$row['club_id'];
echo $c_id;
}
$sql="select * from personal where id='".$roll."'";
$retval1 = mysqli_query($conn,$sql);
 if(! $retval1 ) {
      die('Could not get data: ');
   }
else
{
$row1=mysqli_fetch_assoc($retval1);
$id=$row1['id'];
echo $id;
}
$sql1="insert into clubs (id,club_id) values('".$id."','".$c_id."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }			
?>