<?php
include("connect.php");
session_start();
$dept=$_SESSION['dept'];
$rollno=$_SESSION['rollno'];
$query=mysqli_query($connection,"select * from event where dept='$dept' and date >= CURRENT_TIMESTAMP");
$query2=mysqli_query($connection,"select * from event where dept='$dept' and date < CURRENT_TIMESTAMP");
$query1=mysqli_query($connection,"select name from student where rollno='$rollno'");
$fetch1=mysqli_fetch_assoc($query1);
$name=$fetch1['name'];
	
?>
<?php
if($_SESSION['rollno']!="")
{
	?>
<center>
<font color="white"><h1 align="center">Welcome <?php echo $name?></h1></font>
<a href="profile.php">View Profile</a><br/><br/>	
<a href="logout.php">Logout</a>	<br/>
<br/>
<table border=1px solid>
<tr>
<th colspan="6"> Available Events</th>
</tr>
<tr>
<th>S.No</th>
<th> Event Name </th>
<th> Event Type </th>
<th> Date </th>
<th> Time </th>
<th> Willingness</th>

<?php
$sno=1;
 while($fetch=mysqli_fetch_assoc($query))
 {
	
	?>
<tr>
<td><?php echo $sno; ?></td>
<td><?php echo $fetch['name']?></td>
<td><?php echo $fetch['event_type']?></td>
<td><?php echo $fetch['date']?></td>
<td><?php echo $fetch['time']?></td>
<td>
<a href="opinion.php">Register<?php $_SESSION['event_id']=$fetch['id'];?></a></td>	

</tr>
<?php
 $sno++;
 }
	 ?>

</table>
<br/>
<table border=1px solid>
<tr>
<th colspan="6">Completed Events</th>
</tr>
<tr>
<th>S.No</th>
<th> Event Name </th>
<th> Event Type </th>
<th> Date </th>
<th> Time </th>
<th> Say Feedback</th>
</tr>
<?php
 while($fetch2=mysqli_fetch_assoc($query2))
 {
	 $sno1=1;
	 ?>
<tr>
<td><?php echo $sno1; $sno1=$sno1+1;?></td>
<td><?php echo $fetch2['name']?></td>
<td><?php echo $fetch2['event_type']?></td>
<td><?php echo $fetch2['date']?></td>
<td><?php echo $fetch2['time']?></td>	
<td><a href="feedback.php">Feedback<?php $_SESSION['event_id']=$fetch2['id'];?></a></td>
</tr>
<?php
 }
	 ?>
</table>
</center>
<?php }
else
{
	header("location:index.php");
}?>

