<?php
include("connect.php");
session_start();
if($_REQUEST['create_event']!="")
{
	$eventname=$_REQUEST['event_name'];
	$eventtype=$_REQUEST['event_type'];
	$eventdept=$_REQUEST['event_dept'];
	$date=$_REQUEST['event_date'];
	$time=$_REQUEST['event_time'];
	mysqli_query($connection,"insert into event(name,event_type,dept,date,time) values ('$eventname','$eventtype','$eventdept','$date','$time')");
}
?>
<?php
if($_SESSION['admin']!="")
{
	?>
<center>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<form action="" method="post" autocomplete="off">
<table>
<tr>
<th>Create an Event</th>
</tr>
<tr>
<td><input type="text" placeholder="Event Name" name="event_name" id="event_name"/></td>
</tr>
<tr>
<td>
<select name="event_type">
<option value="" disabled selected>Select Event Type</option>
<option value="symposium">Symposium</option>
<option value="workshop">Workshop</option>
<option value="seminar">Seminar</option>
<option value="ppt">Paper Presentation</option>
</tr>
<tr>
<td>
<select name="event_dept">
<option value="" disabled selected>Select Event Department</option>
<option value="cse">CSE</option>
<option value="ece">ECE</option>
<option value="it">IT</option>
<option value="eee">EEE</option>
<option value="mech">MECH</option>
</select>
</td>
</tr>
<tr>
<td><input type="text" name="event_date" placeholder="Select Event Date" onfocus="(this.type='date')"></td>
</tr>
<tr>
<td><input type="text" name="event_time" placeholder="Select Event Time" onfocus="(this.type='time')"></td>
</tr>
<tr>
<td><input type="submit" name="create_event" id="create_event" value="Create"/></td>
</tr>
</table>
</form>
<a href="admin_dashboard.php">Go Home</a>
</center>
<?php
}
else
{
	header("location:admin.php");
}
?>