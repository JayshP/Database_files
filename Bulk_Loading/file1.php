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
$file = fopen("hello.csv","r");
while(! feof($file))
  {
$arr=fgetcsv($file);
$len=count($arr);
$nam=$arr[0];
$add=$arr[1];
$fnam=$arr[2];
$em=$arr[3];
$ph=$arr[4];
$dept=$arr[5];
$age=$arr[6];
$gen=$arr[7];
$city=$arr[8];
$zip=$arr[9];
echo $nam,$zip,$age,$dept,$gen;
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
}
fclose($file);
?>