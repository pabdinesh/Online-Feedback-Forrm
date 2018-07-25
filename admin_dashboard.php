<?php
include("connect.php");
?>
<style>
table{
	height:75px;
}

</style>
<?php
if($_SESSION['admin']!="")
{
	?>
	<center>
<font color="white">
<h1> Welcome to Admin Panel</h1>
</font>	
<a href="admin_logout.php">Exit Session</a>
<br/>
<br/>
<br/>
<br/>
<br/>
<table>
<tr>
<th><a href="add_student.php" style="text-decoration: none;">Add a Student</a></th>
</table>
<br/>
<table>
<tr>
<th><a href="event_create.php" style="text-decoration: none;">Create an Event</a></th>
</tr>
</table><br/>
<table>
<tr>
<th><a href="view_feedback.php"style="text-decoration: none;">View Feedbacks</a></th>
</tr>
</table><br/>
<table>
<tr>
<th><a href="view_stats.php"style="text-decoration: none;">View Registration Count Stats</a></th>
</tr>
</table><br/>
</center>
<?php
}
else
{
	header("location:admin.php");	
}
?>	