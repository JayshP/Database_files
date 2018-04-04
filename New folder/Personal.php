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

echo $nam,$fnam,$add,$em,$ph,$gen;
$sql="select * from dept_info where dept='".$dept."'";
 $retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   while($row = mysqli_fetch_assoc($retval)) {
      $d=$row['dept_no'];
echo $d;
$sql1="insert into personal (name,address,f_name,E_mail,phone_no,gender,dept_id,age,city,zip) values('".$nam."','".$add."','".$fnam."','".$em."','".$ph."','".$gen."','".$d."','".$age."','".$city."','".$zip."')";
 $ret = mysqli_query($conn,$sql1);
 if(! $ret ) {
      die('Could not get data: ' . mysqli_error());
   }			   
}

?>