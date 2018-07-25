<?php
include("connect.php");
if($_REQUEST['submit']!="")
{
$rollno=$_REQUEST['rollno'];
$pass=$_REQUEST['pass'];
$query=mysqli_query($connection,"select dept,rollno from student where rollno='$rollno' and password='$pass'");
$fetch=mysqli_fetch_assoc($query);
$count=mysqli_num_rows($query);
if($count==1)
{
session_start();
$_SESSION['dept']=$fetch['dept'];
$_SESSION['rollno']=$fetch['rollno'];
header("location:student_dashboard.php");
}
else
{$err1="Invalid Login Credentials";}
}	
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<center>
<img src="logo.png" width="10%" >
<br/>
<br/>
<?php
if($err1!="")
{?>
<div id="" ><table style="width:auto;height:auto; color:red; font-weight:bold; background-color:white"><tr><td><img src="error.jpg" height="20"><?php echo $err1?></td></tr></table></div>
<?php } ?>
<br/>
<table>
<form action="" method="post">
<tr>
<th>Student Login</th>
</tr>
<tr>
<td><input type="text" placeholder="Roll No" name="rollno" id="rollno" autocomplete="off"/></td>
</tr>
<tr>
<td><input type="password" placeholder="Password" name="pass" id="pass" autocomplete="off"/></td>
</tr>
<tr>
<th align="center"><input type="submit" name="submit" value="Login" id="submit"/></th>
</tr>
</form>
</table>
<br/>
<br/>
</center>