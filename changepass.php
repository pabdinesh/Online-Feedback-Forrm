<?php
include("connect.php");
$rollno=$_SESSION['rollno'];
if($_REQUEST['submit']!="")
{
	$newpass=$_REQUEST['newpass'];
	$conpass=$_REQUEST['conpass'];
	
if($newpass==$conpass)
{
	$oldpass=$_REQUEST['oldpass'];
$query=mysqli_query($connection,"select * from student where rollno='$rollno' and password='$oldpass'");
$fetch=mysqli_fetch_assoc($query);
$count=mysqli_num_rows($query);
if($count==1)
{
	mysqli_query($connection,"update student set password='$newpass' where rollno='$rollno'");
	header("location:logout.php");
}
}
else
{
	echo "<script>alert('New Passwords Not Matching');</script>";
}
}

?>
<?php
if($_SESSION['rollno']!="")
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
<br/>
<br/>
<br/>
<table>
<form action="" method="post" autocomplete="off">
<tr><th> Change Password</th></tr>
<tr><td><input type="password" name="oldpass" placeholder="Old Password"</td></tr>
<tr><td><input type="password" name="newpass" placeholder="New Password"</td></tr> 
<tr><td><input type="password" name="conpass" placeholder="Confirm Password"</td></tr>
<tr><td><input type="submit" name="submit" value="Change"/></td></tr>
</form>
</table>
<br/>
<a href="student_dashboard.php">Go Home</a>
</center>
<?php
}
else{
	header("location:index.php");
}