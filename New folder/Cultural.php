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
$sql="select * from e_act where event='".$ev."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$e_id=$row['Event_id'];
echo $e_id;
}
$sql="select * from p_act where part='".$prt."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$p_id=$row['part_id'];
echo $p_id;
}
$sql1="insert into cultural_act (id,activity_id,event_id,part_id) values('".$id."','".$a_id."','".$e_id."','".$p_id."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }			
?>