<?php
include("connect.php");
session_start();
if($_REQUEST['stu_create']!="")
{
	$name=$_REQUEST['stu_name'];
	$rollno=$_REQUEST['stu_rollno'];
	$dept=$_REQUEST['stu_dept'];
	$password=$_REQUEST['stu_pass'];
	mysqli_query($connection,"insert into student(rollno,password,name,dept) values ('$rollno','$password','$name','$dept')");
}
?>
<?php
if($_SESSION['admin']!="")
{
	?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<form action="" method="post" autocomplete="off">
<table >
<tr>
<th>Add a Student</th>
</tr>
<tr>
<td><input type="text" placeholder="Student Name" name="stu_name" id="stu_name"/></td>
</tr>
<tr>
<td><input type="text" placeholder="Student Roll No" name="stu_rollno" id="stu_rollno"/></td>
</tr>
<tr>
<td>
<select name="stu_dept">
<option value="" disabled selected>Select Department</option>
<option value="cse">CSE</option>
<option value="ece">ECE</option>
<option value="it">IT</option>
<option value="eee">EEE</option>
<option value="mech">MECH</option>
</select>
</td>
</tr>
<tr>
<td><input type="password" placeholder="Password" name="stu_pass" value="panimalar" id="stu_pass"/></td>
</tr>
<tr>
<td><input type="submit" name="stu_create" id="stu_create" value="Create"/></td	>
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