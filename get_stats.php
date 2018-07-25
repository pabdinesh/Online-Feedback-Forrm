<?php
include("connect.php");
session_start();
$eventid=$_REQUEST['eventid'];

$qry=mysqli_query($connection,"select * from event_count where id='$eventid'");

?>
<?php
if($_SESSION['admin']!="")
{?>
<center>
<table>

<?php

while($res=mysqli_fetch_assoc($qry))
{
	
	?>
	<tr>
<th><font size="25pt"><?php echo $res['count'];?></font></th> 
</tr>
	<?php
}
?>

</table>
<a href="admin_dashboard.php">Go Home</a>
</center>
<?php
}
else
{
	header("lcoation.php");
}
?>