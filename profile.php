<?php
include("connect.php");
session_start();
$dept=$_SESSION['dept'];
$rollno=$_SESSION['rollno'];
$query=mysqli_query($connection,"select * from student where rollno='$rollno' and dept='$dept'");
$fetch=mysqli_fetch_assoc($query);
$name=$fetch['name'];
?>
<?php
if($_SESSION['rollno']!="")
{?>
<center>
<img src="profile.png">
<table>
<tr>
<th colspan="2"> Profile Details</th>
</tr>
<tr>
<td> Name</td>
<td><?php echo $name;?></td>
</tr>
<tr>
<td>Roll No </td>
<td><?php echo $rollno;?></td>
</tr>
<tr>
<td>Department</td>
<td><?php echo $dept;?></td>
</tr>
<tr>
<td colspan="2">
<a  href="changepass.php">Change Password</a>
</td>
</tr>
</table>
<br/>
<a href="student_dashboard.php">Go Home </a>
</center>
<?php }
else
{
	header("location:index.php");
}?>