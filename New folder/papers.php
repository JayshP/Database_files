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
$title=$_GET["title"];
$nam=$_GET["name"];
$iss=$_GET["issue"];
$type=$_GET["type"];
echo $iss,$type;

$sql1="select * from personal where id='".$roll."'";
$retval1 = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$id=$row['id'];
echo $id;
}

$sql="select * from type where type='".$type."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$type_id=$row['type_id'];
echo $type_id;
}
$sql1="insert into papers (id,title,Name,issue_details,type) values('".$id."','".$title."','".$nam."','".$iss."','".$type."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }			
?>