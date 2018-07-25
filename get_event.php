<?php
include("connect.php");
session_start();
$eventid=$_REQUEST['eventid'];

$qry=mysqli_query($connection,"select * from event_feedback where event_id='$eventid'");

?>
<?php
if($_SESSION['admin']!="")
{?>
<center>
<table>
<tr>
<th>S.No</th>
<th>Student Name</th>
<th>Comment</th> 
<th>Overall Rating</th>
</tr>
<?php
$sno=1;
while($res=mysqli_fetch_assoc($qry))
{
	$rollno=$res['student_rollno'];
	$res1=mysqli_query($connection,"select name from student where rollno='$rollno'");
	$fetch=mysqli_fetch_assoc($res1);
	$s?>
	<tr>
<td><?php echo $sno;?></td>
<td><?php echo $fetch['name'];?></td>
<td><?php echo $res['comment'];?></td> 
<td><?php echo $res['overall'];?> </td>
</tr>

	<?php
$sno++;
	}
?></table>
<a href="admin_dashboard.php">Go Home</a>
</center>
<?php
}
else
{
	header("location.php");
}
?>