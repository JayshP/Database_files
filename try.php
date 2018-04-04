<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
.body
{
align: center;
}
 .ab{ 
display: inline-block;
    width: 140px;
    height: 75px;
	float:top;
	position:relative;
    margin: 10px;   
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}
.dropbtn:hover{
	background-color: #42F4Ad;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

</style>
<title>Search Page</title>
</head>

<body>
<form action="try.php" method="get">
<div class="menu" style="display: inline-block;">
<div class="ab"><fieldset style="hieght:65px;">
<button class="dropbtn">Personal</button><br>
    <input type="radio" id="p" name="p" value="p.name">Name<br>
    <input type="radio" id="p" name="p" value="p.id">Id<br>
	 <input type="radio" id="p" name="p" value="p.dept">Department<br>
	 <input type="radio" id="p" name="p" value="p.city">City<br>
    <input type="radio" id="p"name="p" value="p.username">Username<br>
	</fieldset></div>
<div class="ab"><fieldset style="hieght:65px;">
  <button class="dropbtn">Hostel</button><br>
  <br>
  <input type="radio" name="p" value="h.id">Id<br>
    <input type="radio" name="p" value="h.flat">Flat<br>
    <input type="radio" name="p" value="h.block">Block<br>
    <input type="radio" name="p" value="h.year">Year<br>
</fieldset></div>
<div class="ab"><fieldset>
  <button class="dropbtn">Clubs</button><br><br>
<input type="radio" name="p" value="l.id">Id<br>
    <input type="radio" name="p" value="l.Club">Club<br>
	<br><br>
   </fieldset></div>
<div class="ab"><fieldset style="hieght:65px">
  <button class="dropbtn">Cultural Activities</button>
  <input type="radio" name="p" value="c.id">Id<br>
    <input type="radio" name="p" value="c.Event">Event<br>
	<input type="radio" name="p" value="c.Activities">Activities<br>
	<input type="radio" name="p" value="c.Part">Participation<br>
	</fieldset></div>
	<div class="ab"><fieldset>
  <center><button class="dropbtn">Games</button></center><br>
  <input type="radio" name="p" value="g.id">Id<br>
    <input type="radio" name="p" value="g.Event">Event<br>
	<input type="radio" name="p" value="g.Games">Games<br>
	<input type="radio" name="p" value="g.Part">Participation<br>
	</fieldset></div>
	<div class="ab"><fieldset>
  <button class="dropbtn">Papers</button><br><br>
  <input type="radio" name="p" value="r.id">Id<br>
    <input type="radio" name="p" value="r.title">Title<br>
	<input type="radio" name="p" value="r.name">Name<br>
	<input type="radio" name="p" value="r.Type">Type<br>
	</fieldset></div>
<div class="ab" style="position:absolute; top:35px; right:150px;"><fieldset><legend>Search</legend><input type="text" name="search" style="width:190px; height:20px;"></fieldset></div>
<br><br>
</div>
<div class="filter" style="width:660px; float: right; margin-right:20%;">
<?php
$user=$_SESSION["user"];
$cat=$_SESSION["cat"];
echo "Welcome ".$user."";
function test()
{
if(isset($_GET['filter']))
{
	//sql here
/*	$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) 
   {
      die('Could not connect: ' . mysql_error());
   }
mysqli_select_db($conn,'Student_info');*/
$o=$_GET['opt'];
$a=$_GET['p'];
$s=$_GET['search'];
$n=count($o);
$x=$o[0];

//echo $x;
$op=$_GET['opt2'];
$ng=count($op);
$y="";
$sqlp="";
if($a[0]=='p')
{
	if($a[2]=='i')
	{
	$sqlp="select p.id from personal p where ".$a."=".$s."";
	}
	if($a[2]=='d')
	{
		$d="select dept_no from dept_info where dept='".$s."'";
		$sqlp="select p.id from personal p,(".$d.") as z where z.dept_no=p.dept_id";
	}
	else
	{
		$sqlp="select p.id from personal p where ".$a."='".$s."'";
	}
	//$retval = mysqli_query($conn,$sqlp);
	/*if(!$retval)
	{
		die("No Matching record");
	}
    else
	{
	}*/
	//echo $sqlp;
}
if($a[0]=='h')
{
	if($a[2]=='i')
	{
	$sqlp="select h.id from hostel_info h where ".$a."=".$s."";
	}
	else
	{
		$sqlp="select h.id from hostel_info h where ".$a."='".$s."'";
	}
	//$retval = mysqli_query($conn,$sqlp);
	/*if(!$retval)
	{
		die("No Matching record");
	}
    else
	{
	}*/
	//echo $sqlp;
}
//echo $sqlp;
if($a[0]=='l')//clubs
{
	$d="select club_id from clubs_details where club='".$s."'";
		$sqlp="select l.id from clubs l,(".$d.") as z where z.club_id=l.club_id";
	//$retval = mysqli_query($conn,$sqlp);
	/*if(!$retval)
	{
		die("No Matching record");
	}
    else
	{
	}*/
	//echo $sqlp;
}
if($a[0]=='c')//cultural
{ //echo "hello";
	if($a[2]=='i')
	{
		$sqlp="select c.id from cultural_act c where ".$a."=".$s."";
	}
	if($a[2]=='E')
	{
		$d="select e_id from e_act where event='".$s."'";
		$sqlp="select c.id from cultural_act c,(".$d.") as z where z.e_id=c.event_id";
	}
	if($a[2]=='A')
	{
		$d="select act_id from activity where act='".$s."'";
		$sqlp="select c.id from cultural_act c,(".$d.") as z where z.act_id=c.activity_id";
	}
	if($a[2]=='P')
	{
		$d="select p_id from p_act where part='".$s."'";
		$sqlp="select c.id from cultural_act c,(".$d.") as z where z.p_id=c.part_id";
	}
	//echo $sqlp;
}

if($a[0]=='g')//Games
{ //echo "hello";
	if($a[2]=='i')
	{
		$sqlp="select g.id from games g where ".$a."=".$s."";
	}
	if($a[2]=='E')
	{
		$d="select e_id from e_game where event='".$s."'";
		$sqlp="select g.id from games g,(".$d.") as z where z.e_id=g.event_id";
	}
	if($a[2]=='G')
	{
		$d="select g_id from game_id where game='".$s."'";
		$sqlp="select g.id from games g,(".$d.") as z where z.g_id=g.game_id";
	}
	if($a[2]=='P')
	{
		$d="select p_id from p_game where part='".$s."'";
		$sqlp="select g.id from games g,(".$d.") as z where z.p_id=g.part_id";
	}
	//echo $sqlp;
}
//papers
if($a[0]=='r')
{ echo "hello";
	if($a[2]=='i')
	{
		$sqlp="select r.id from papers r where ".$a."=".$s."";
	}
	if($a[2]=='t')
	{
		$sqlp="select r.id from papers r where r.title='".$s."'";
	}
	if($a[2]=='n')
	{
		$sqlp="select r.id from papers r where r.name='".$s."'";
	}
	if($a[2]=='T')
	{
		$d="select type_id from type_papers where type='".$s."'";
		$sqlp="select r.id from papers r,(".$d.") as z where z.type_id=type";
	}
	//echo $sqlp;
}
//end of search
for($i=0; $i < $n; $i++)
{	
//echo ".$o[$i].";
if(strcmp($o[$i],"personal p")==0)
{
	?>
	<fieldset>
	<legend>Personal</legend>
	<?php
$arr=array();
$count=0;
$arr[$count]="z.id";
$count++;
for($j=0; $j < $ng; $j++)
{	
if($op[$j][0]=='p' && $op[$j][2]!='d')
{
if($count==1)
	{
$y="$op[$j]";
$count++;
	}
	else
	{
		$y="$y,$op[$j]";
		$count++;
	}
	$arr[$count-1]=$op[$j];
}
if($op[$j][2]=='d')
{

		$x="select p.dept_id,p.id from personal p,(".$sqlp.") as z where z.id=p.id";
		$sql121="select distinct j.dept,z.id from dept_info j,(".$x.") as z where z.dept_id=j.dept_no order by z.id";
		//echo "<br>".$sql121."<br>";
		$arr1=array("z.id","p.dept");
		test2($arr1,$sql121);	
}
}
//echo "".$y." ------------";
$sql22="select distinct z.id,".$y." from personal p,(".$sqlp.") as z where z.id=p.id order by z.id";
//echo $sql22;
test2($arr,$sql22);
//$retval = mysqli_query($conn,$sql22);
/* if(! $retval ) {
      die('Could not get data: ');
   }
else
{
	?>
	<table style="width:100%">
	<tr>
	<?php
	$l=count($arr);
	for($z=0;$z <$l;$z++)
	{
		$sub=substr($arr[$z],2);
		?>
	<th><center><?php echo $sub;?></center></th>	
	<?php
	}
	?>
	</tr>
	<?php
While($row=mysqli_fetch_assoc($retval))
{
$len=count($row)
?>
<tr>
<?php
for($k=0;$k<$l;$k++)
{
	?>
<td><center><?php echo $row[substr($arr[$k],2)];?></center></td>
<?php	
}
?>
</tr>
<?php
}
?>
</table>
<?php
}*/
?>
</fieldset>
<?php	
}
$y="";
//hostel
if(strcmp($o[$i],"hostel_info h")==0)
{?>
	<fieldset>
	<legend>Hostel Information</legend>
	<?php
	$arr=array();
	$count=0;
$arr[$count]="z.id";
$count++;
for($j=0; $j < $ng; $j++)
{	
if($op[$j][0]=='h')
{
	if($count==1)
	{
$y="$op[$j]";
$count++;
	}
	else
	{
		$y="$y,$op[$j]";
		$count++;
	}
	$arr[$count-1]=$op[$j];
}
}	
$sql22="select distinct z.id,".$y." from hostel_info h,(".$sqlp.") as z where z.id=h.id";
test2($arr,$sql22);
?>
</fieldset>
<?php	
}
$y="";
//clubs
if(strcmp($o[$i],"clubs l")==0)
{
	?>
	<fieldset>
	<legend>Clubs</legend>
	<?php
$arr=array();
$count=0;
$arr[$count]="z.id";
$count++;
	//echo "Hello";
for($j=0; $j < $ng; $j++)
{	
if($op[$j][0]=='l')
{
if($count==1)
	{
$y="$op[$j]";
$count++;
	}
	else
	{
		$y="$y,$op[$j]";
		$count++;
	}
	$arr[$count-1]="l.club";
}
}
//echo $y;	
$sql2="select z.id,".$y." from clubs l,(".$sqlp.") as z where z.id=l.id";
$sql22="select distinct z.id,x.club from clubs_details x,(".$sql2.") as z where z.club_id=x.club_id order by z.id";
//echo $sql22;
test2($arr,$sql22);
//echo "----".$sql22."---";
?>
</fieldset>
<?php	
}
//cultural_act
if(strcmp($o[$i],"cultural_act c")==0)
{
	//echo "Hello";
	?>
	<fieldset>
	<legend>Cultural Activities</legend>
	<?php
for($j=0; $j < $ng; $j++)
{	
$count=0;
if($op[$j][0]=='c')
{
	
	if($op[$j][2]=='a')
	{
		$x="select c.activity_id,z.id from cultural_act c,(".$sqlp.") as z where z.id=c.id order by z.id";
		$sql121="select distinct a.act,z.id from activity a,(".$x.") as z where z.activity_id=a.act_id order by z.id";
		//echo "<br>Activity=".$sql121."<br>";
		$arr1=array("z.id","c.act");
		test2($arr1,$sql121);
	}
	if($op[$j][2]=='e')
	{
		$x="select c.event_id,z.id from cultural_act c,(".$sqlp.") as z where z.id=c.id order by z.id";
		$sql22="select distinct e.event,z.id from e_act e,(".$x.") as z where z.event_id=e.e_id order by z.id";
		//echo "<br>Event=".$sql122."<br>";
		$arr1=array("z.id","c.event");
		test2($arr1,$sql22);
	}
	if($op[$j][2]=='p')
	{
		$x="select c.part_id,z.id from cultural_act c,(".$sqlp.") as z where z.id=c.id";
		$sql123="select distinct p.part,z.id from p_act p,(".$x.") as z where z.part_id=p.p_id order by z.id";
		//echo "<br>Part=".$sql123."<br>";
		$arr1=array("z.id","p.part");
		test2($arr1,$sql123);
	}
	
}
}
?>
</fieldset>
<?php		
}
//Games
if(strcmp($o[$i],"games g")==0)
{
	?>
	<fieldset>
	<legend>Games</legend>
	<?php
	//echo "Hello";
for($j=0; $j < $ng; $j++)
{	
$count=0;
if($op[$j][0]=='g')
{
	
	if($op[$j][2]=='g')
	{
		$x="select g.game_id,z.id from games g,(".$sqlp.") as z where z.id=g.id";
		$sql121="select distinct g.game,z.id from game_id g,(".$x.") as z where z.game_id=g.g_id";
		//echo "<br>Game=".$sql121."<br>";
		$arr1=array("z.id","g.game");
		//echo $sql121;
		test2($arr1,$sql121);
	}
	if($op[$j][2]=='e')
	{
		$x="select g.event_id,z.id from games g,(".$sqlp.") as z where z.id=g.id";
		$sql122="select distinct e.event,z.id from e_game e,(".$x.") as z where z.event_id=e.e_id";
		//echo "<br>Game_Event=".$sql122."<br>";
		$arr1=array("z.id","g.event");
		test2($arr1,$sql122);
	}
	if($op[$j][2]=='p')
	{
		$x="select g.part_id,z.id from games g,(".$sqlp.") as z where z.id=g.id";
		$sql123="select distinct p.part,z.id from p_game p,(".$x.") as z where z.part_id=p.p_id";
		//echo "<br>Game_Part=".$sql123."<br>";
		$arr1=array("z.id","g.part");
		test2($arr1,$sql123);
	}
	
}
}
?>
	</fieldset>
<?php		
}
$y="";
//Papers
if(strcmp($o[$i],"papers r")==0)
{
	?>
	<fieldset>
	<legend>Papers</legend>
	<?php
	//echo "Hello";
	$arr=array();
$count=0;
$arr[$count]="z.id";
$count++;
for($j=0; $j < $ng; $j++)
{	
if($op[$j][0]=='r')
{
if($count==1)
	{
$y="$op[$j]";
$count++;
	}
	else
	{
		$y="$y,$op[$j]";
		$count++;
	}
	$arr[$count-1]=$op[$j];
}
}
$sql22="select z.id,".$y." from papers r,(".$sqlp.") as z where z.id=r.id";
//echo "<br>".$sql22."<br>";
test2($arr,$sql22);
?>
	</fieldset>
<?php		
}	
}

}
}
function test2($arr=array(),$sql)
{
		$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'rohini121';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) 
   {
      die('Could not connect: ' . mysql_error());
   }
mysqli_select_db($conn,'Student_info');
$retval = mysqli_query($conn,$sql);
 if(! $retval ) {
      die('Could not get data: ');
   }
else
{
?>
	<table border="1" style="width:100%">
	<tr>
	<?php
	$l=count($arr);
	for($z=0;$z <$l;$z++)
	{
		$sub=substr($arr[$z],2);
		?>
	<th><center><?php echo $sub;?></center></th>	
	<?php
	}
	?>
	</tr>
	<?php
While($row=mysqli_fetch_assoc($retval))
{
$len=count($row)
?>
<tr>
<?php
for($k=0;$k<$l;$k++)
{
	?>
<td><center><?php echo $row[substr($arr[$k],2)];?></center></td>
<?php
}
?>
</tr>
<?php
}
?>
</table>
<br>
<?php
}
}
test();	
?>
</div>
<div class="filter" style="width:220px;">
<div>
<input type="checkbox" name="opt[]" value="personal p"/></b>Personal</b><br>
<fieldset>
<input type="checkbox" name="opt2[]" value="p.name"/>Name <br>
<input type="checkbox" name="opt2[]" value="p.address"/>Address<br>
<input type="checkbox" name="opt2[]" value="p.f_name"/>Father's Name<br>
<input type="checkbox" name="opt2[]" value="p.city"/>City
<input type="checkbox" name="opt2[]" value="p.phone_no"/>Ph No.<br>
<input type="checkbox" name="opt2[]" value="p.E_mail"/>E Mail<br>
<input type="checkbox" name="opt2[]" value="p.dept_id"/>Department<br>
<input type="checkbox" name="opt2[]" value="p.username"/>Username<br>
<input type="checkbox" name="opt2[]" value="p.DOB"/>Date Of birth<br>
</fieldset>
<input type="checkbox" name="opt[]" value="hostel_info h"/>Hostel<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="h.block"/>Block <br>
<input type="checkbox" name="opt2[]" value="h.flat"/>Flat<br>
<input type="checkbox" name="opt2[]" value="h.year"/>Year<br>
</fieldset>
<input type="checkbox" name="opt[]" value="clubs l"/>Clubs<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="l.club_id"/>Club<br>
</fieldset>
<input type="checkbox" name="opt[]" value="cultural_act c"/>Cultural<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="c.event_id"/>Event<br>
<input type="checkbox" name="opt2[]" value="c.activity_id"/>Activity<br>
<input type="checkbox" name="opt2[]" value="c.part_id"/>Participation<br>
</fieldset>
<input type="checkbox" name="opt[]" value="games g"/>Games<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="g.event_id"/>Event<br>
<input type="checkbox" name="opt2[]" value="g.game_id"/>Game<br>
<input type="checkbox" name="opt2[]" value="g.part_id"/>Participation<br>
</fieldset>
<input type="checkbox" name="opt[]" value="papers r"/>Papers<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="r.title"/>Title<br>
<input type="checkbox" name="opt2[]" value="r.name"/>Name<br>
<input type="checkbox" name="opt2[]" value="r.issue_details">Issue Details<br>
</fieldset>
<center><input type="submit" id="filter" name="filter" value="filter"></center>
</div>
</div>
</form>
</body>
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
if($cat=='F')
{
	?>
<a href="w_faculty.php">Home</a>

<?php
}
?>
</html>