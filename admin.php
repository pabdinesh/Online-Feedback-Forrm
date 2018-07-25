<?php
include("connect.php");
if($_REQUEST['submit']!="")
{
	$username=$_REQUEST['username'];
		$password=$_REQUEST['pass'];
	if($username=="admin" && $password=="12345")
	{	$_SESSION['admin']=admin;
header('location:admin_dashboard.php');
		
	}	
else
{$err="Invalid Login Credentials";}
}
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<center>
<img src="logo.png" width="10%">
<br/>
<br/>
<?php
if($err!="")
{?>
<div id="" ><table style="width:auto;height:auto; color:red; font-weight:bold; background-color:white"><tr><td><img src="error.jpg" height="20"><?php echo $err?></td></tr></table></div>
<?php } ?>
<br/>
<table>
<form method="post" action="">
<tr>
<th>Admin Login</th>
</tr>
<tr>
<td><input type="text" placeholder="Username" name="username" id="username" autocomplete="off"/></td>
</tr>
<tr>
<td><input type="password" placeholder="Password" name="pass" id="pass" autocomplete="off"/></td>
</tr>
<tr>
<th><input type="submit" name="submit" value="Login"/></th>
</tr>
</form>
</table> 