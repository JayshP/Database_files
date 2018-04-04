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
/* Style The Dropdown Button */
.menu {
	display:inline-block;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<title>Log-In Form</title>
</head>
<?php
function test()
{
if(isset($_GET['filter']))
{
$o=$_GET['opt'];
$a=$_GET['p'];
$s=$_GET['search'];
$n=count($o);
$x=$o[0];
for($i=1; $i < $n; $i++)
{	
$x="$x,$o[$i]";
}
//echo $x;
$op=$_GET['opt2'];
$ng=count($op);
$y=$op[0];
for($i=1; $i < $ng; $i++)
{	
$y="$y,$op[$i]";
}
//echo $y;
$sql="select ".$y." from ".$x."";
echo $sql;
echo $a,$s;
}
}
test();
?>
<body>
<form action="filter.php" method="get">
<div class="menu" style="display:inline-block;">
<div class="dropdown">
  <button class="dropbtn">Personal</button>
  <div class="dropdown-content">
    <input type="radio" name="personal p" value="name">Name<br>
    <input type="radio" name="personal p" value="id">Id<br>
    <input type="radio" name="personal p" value="username">Username<br>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Hostel Info</button>
  <div class="dropdown-content">
  <input type="radio" name="hostel h" value="id">Id<br>
    <input type="radio" name="hostel h" value="flat">Flat<br>
    <input type="radio" name="hostel h" value="block">Block<br>
    <input type="radio" name="hostel h" value="year">Year<br>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Clubs</button>
  <div class="dropdown-content">
  <input type="radio" name="clubs cl" value="id">Id<br>
    <input type="radio" name="clubs cl" value="Club">Club<br>
    </div>
	</div>
	<div class="dropdown">
  <button class="dropbtn">Cultural Activities</button>
  <div class="dropdown-content">
  <input type="radio" name="cultural_act cu" value="id">Id<br>
    <input type="radio" name="cultural_act cu" value="Event">Event<br>
	<input type="radio" name="cultural_act cu" value="Activities">Activities<br>
	<input type="radio" name="cultural_act cu" value="Part">Participation<br>
    </div>
</div>
<input type="text" name="search"><input type="submit" name="search1" value="Search">
</div>
</form>
<form action="filter.php" method="get" style="width:220px;">
<div class="filter" style="width:220px;">
<input type="checkbox" name="opt[]" value="personal p"/></b>Personal</b><br>
<fieldset>
<input type="checkbox" name="opt2[]" value="p.name"/>Name <br>
<input type="checkbox" name="opt2[]" value="p.address"/>Address<br>
<input type="checkbox" name="opt2[]" value="p.f_nam"/>Father's Name<br>
<input type="checkbox" name="opt2[]" value="p.city"/>City
<input type="checkbox" name="opt2[]" value="p.phone_no"/>Ph No.<br>
<input type="checkbox" name="opt2[]" value="p.E_mail"/>E Mail<br>
<input type="checkbox" name="opt2[]" value="p.username"/>Username<br>
<input type="checkbox" name="opt2[]" value="p.DOB"/>Date Of birth<br>
</fieldset>
<input type="checkbox" name="opt[]" value="hostel_info h"/>Hostel<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="h.block"/>Block <br>
<input type="checkbox" name="opt2[]" value="h.flat"/>Flat<br>
<input type="checkbox" name="opt2[]" value="h.year"/>Year<br>
</fieldset>
<input type="checkbox" name="opt[]" value="clubs cl"/>Clubs<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="cl.club_id"/>Club<br>
</fieldset>
<input type="checkbox" name="opt[]" value="cultural_act cu"/>Cultural<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="cu.event_id"/>Event<br>
<input type="checkbox" name="opt2[]" value="cu.activity_id"/>Activity<br>
<input type="checkbox" name="opt2[]" value="cu.part_id"/>Participation<br>
</fieldset>
<input type="checkbox" name="opt[]" value="games g"/>Games<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="g.event_id"/>Event<br>
<input type="checkbox" name="opt2[]" value="g.game_id"/>Game<br>
<input type="checkbox" name="opt2[]" value="g.part_id"/>Participation<br>
</fieldset>
<input type="checkbox" name="opt[]" value="papers pr"/>Papers<br>
<fieldset>
<input type="checkbox" name="opt2[]" value="pr.title"/>Title<br>
<input type="checkbox" name="opt2[]" value="pr.name"/>Name<br>
<input type="checkbox" name="opt2[]" value="pr.issue_details">Issue Details<br>
</fieldset>
<input type="submit" id="filter" name="filter" value="filter">
</div>
</form>
</body>
</html>