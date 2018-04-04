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
echo "Accepted Successfully";
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ');
   }
mysqli_select_db($conn,'Student_info');
$nam=$_GET["name"];
$fnam=$_GET["father"];
$add=$_GET["address"];
$em1=$_GET["email1"];
$em2=$_GET["email2"];
$em="$em1(at)$em2";
$ph=$_GET["Phone"];
$dept=$_GET["dept"];
$age=$_GET["age"];
$gen=$_GET["gender"];
$city=$_GET["city"];
$zip=$_GET["zip"];
$user=$_GET["user"];
$sql="select * from dept_info where dept='".$dept."'";
 $retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   while($row = mysqli_fetch_assoc($retval)) {
      $d=$row['dept_no'];
	  $sql2="insert into log_in(username,password,u_type) values ('".$user."','12345','S')";
	  $ret2=mysqli_query($conn,$sql2);
	   if(! $ret2 ) {
      die('Could not get data: ' . mysqli_error());
   }			  
$sql1="insert into personal (name,address,f_name,E_mail,phone_no,gender,dept_id,DOB,city,zip,username) values('".$nam."','".$add."','".$fnam."','".$em."','".$ph."','".$gen."','".$d."','".$age."','".$city."','".$zip."','".$user."')";

 $ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }			   
}
}
?>
<fieldset>
<legend>Personal Details</legend>
<form action="Personal1.php" method="get">
Name :  <input type="text" name="name"/>
<br>
<br>
Father's Name :  <input type="text" name="father"/>
<br>
<br>
Address :  <input type="text" name="address"/>
<br>
<br>
E-Mail :  <input type="text" name="email1"/>  @  <input type="text" name="email2"/>
<br>
<br>
Phone-Number :  <input type="text" name="Phone"/>
<br>
<br>
Department:  <input type="text" name="dept"/>
<br>
<br>
<input type="radio" name="gender" value="M"> Male<br>
  <input type="radio" name="gender" value="F"> Female<br>
<br>
<br>
Date Of Birth:  <input type="date" name="age"/>
<br>
<br>
City :  <input type="text" name="city"/>
<br>
<br>
Zipcode :  <input type="text" name="zip"/>
<br>
<br>
Username : <input type="text" name="user">
<br>
<br>
<input type="submit" id="submit" name="submit" value="submit"/>
</form>
</fieldset>
<br>
<br>
</body>
<a href="w_Admin.php">Home</a>
</html>
