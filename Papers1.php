<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Papers</title>
</head>
<body>
<h1>Student Research Infromation</h1>
<?php
$user=$_SESSION["user"];
$cat=$_SESSION["cat"];
echo "Welcome ".$cat."&nbsp; ".$user."";
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
$title=$_GET["title"];
$nam=$_GET["name"];
$iss=$_GET["issue"];
$type=$_GET["type"];
echo $iss,$type;

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
}

$sql="select * from type_papers where type='".$type."'";
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
$sql1="insert into papers(id,title,name,issue_details,type) values('".$id."','".$title."','".$nam."','".$iss."','".$type_id."')";
$ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }
}   
?>
<fieldset>
<legend>Papers</legend>
<form action="Papers1.php" method="get">
Roll ID :  <input type="text" name="roll" align="center"/>
<br>
<br>
Title :  <input type="text" name="title"/>
<br>
<br>
Name :  <input type="text" name="name"/>
<br>
<br>
Issue Details :  <input type="text" name="issue"/>
<br>
<br>
Type :  <input type="text" name="type"/>
<br>
<br>
<input type="submit" id="submit" name="submit" value="submit"/>
</fieldset>
<?php
if($cat=='HOD')
{
	?>
<a href="w_HOD.php">Home</a>

<?php
}
if($cat=='A')
{
	?>
<a href="w_Admin.php">Home</a>
<?php
}
?>
</body>
</html>