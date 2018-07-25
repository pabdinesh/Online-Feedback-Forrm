<?php
include("connect.php");
session_start();
$rollno=$_SESSION['rollno'];
$event_id=$_SESSION['event_id'];
$q1=mysqli_query($connection,"select * from event_register where id=$event_id and rollno='$rollno'");
$f1=mysqli_fetch_assoc($q1);
$c1=mysqli_num_rows($q1);
if($c1==0)
{
mysqli_query($connection,"insert into event_register(id,rollno) values ($event_id,'$rollno')");
$query=mysqli_query($connection,"select * from event_count where id='$event_id'");
$fetch=mysqli_fetch_assoc($query);
$count=mysqli_num_rows($query);
if($count==0)
{
mysqli_query($connection,"insert into event_count (id,count) values ($event_id,'1')");
header("location:student_dashboard.php");
}
else
{
	$count=$fetch['count'];
	$count=$count+1;
	mysqli_query($connection,"update event_count set count='$count'");
	header("location:student_dashboard.php");
}
}
else{
	header("location:student_dashboard.php");
}
?>
