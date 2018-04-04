<?php
session_start();
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
//final public string Exception::getTraceAsString ( void )
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   //echo 'Connected successfully';
mysqli_select_db($conn,'Student_info');
$user=$_GET["Usr"];
$pass=$_GET["pas"];
$_SESSION["user"]=$user;
if($user==NULL || $pass==NULL)
{
echo "Incomplete Input";
}
else
{
//echo $user,$pass;
$sql="select * from log_in where username='".$user."' and password='".$pass."'";
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Invalid User Entry');
   }
else
{
$row=mysqli_fetch_assoc($retval);
$cat=$row['u_type'];
$_SESSION["cat"]=$cat;
echo $cat;
}
if($cat=='F')
{
header("Location:w_faculty.php");
exit;
}
if($cat=='S')
{
header("Location:w_student.php");
exit;
}
if($cat=='A')
{
header("Location:w_Admin.php");
exit;
}
if($cat=='HOD')
{
header("Location:w_hod.php");
exit;
}
else
{
	echo "Invalid Inputs";
}
}
?>