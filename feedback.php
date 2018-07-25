<?php
error_reporting(E_ALL && E_PARSE);
session_start();
$connection=mysqli_connect("localhost","root","","feedback_system");
$_SESSION['dept'];
$_SESSION['rollno'];

if($_REQUEST['submit']!="")
{
$qno1=$_REQUEST['qno1'];
$qno2=$_REQUEST['qno2'];
$qno3=$_REQUEST['qno3'];
$qno4=$_REQUEST['qno4'];
$comment=$_REQUEST['comment'];
$cd=0;
	if(!preg_match("/^[A-Za-z0-9]*$/",$comment))
	{ $err="Invalid Symbols in Comment";	
		$cd=1;}
session_start();
$event_id=$_SESSION['event_id'];
$average=(($qno1+$qno2+$qno3+$qno4)/4);
if($average==3)
{$rating="Excellent";}
else if($average==2)
{$rating="Average";}
else
{	$rating="Not Nice";}
$rollno=$_SESSION['rollno'];
$conn=mysqli_query($connection,"select event_id,student_rollno from event_feedback where event_id='$event_id'and student_rollno='$rollno'");
$fetch=mysqli_fetch_assoc($conn);
$count=mysqli_num_rows($conn);
if($count==0 && $cd==0)
{
mysqli_query($connection,"insert into event_feedback (event_id,student_rollno,comment,overall)values ($event_id,'$rollno','$comment','$rating')");
header("location:student_dashboard.php");
}
}
?>
<style>
body{
background-color:LightGray;	
background-image: url("bg.jpg");
 height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
*
{
 text-align:center;
font-family: 'Playfair Display', serif;
font-weight:bold;
}
table{
    border-collapse: collapse;
width:50%;
height:75%;			
text-align: center;
margin:auto;
padding:40px;
vertical-align: center;
	border:1px groove LightGray;	
	padding-top:50%;
	background:LightGray;		
	}
th {
    background-color:slateblue;
    color: white;	
	}
input type=[text]
{
	width:100%;
	height:100%;
}
a
{ color:white;}
</style>
<?php
if($_SESSION['rollno']!="")
{
	?>
<center>
<font color="white">
<h1> Event Feedback </h1><br/>
</font>
<font color="Gray">
<?php
if($err!="")
{?>
<div id="" ><table style="width:auto;height:auto; color:red; font-weight:bold; background-color:white"><tr><td><img src="error.jpg" height="20"><?php echo $err?></td></tr></table></div>
<br/>
<?php } ?>
<form action="" method="post" name="feedback">
<table>
<tr>
<th colspan="4"> Feedback Form</th>
</tr>
<tr>
<td colspan="4">1.How Organised was the Event?</td>
</tr>
<tr>
<td><input type="radio" name="qno1" value="3"/>Extremely Organised</td>
<td><input type="radio" name="qno1" value="2"/>Somewhat Organised</td>
<td><input type="radio" name="qno1" value="1"/>Not At All Organised</td>
</tr>
<tr>
<tr/>
<td colspan="4">
2.How Friendly was the Staff?</td></tr><tr>
<td><input type="radio" name="qno2" value="3">Extremely Friendly</td>
<td><input type="radio" name="qno2" value="2">Somewhat Friendly</td>
<td><input type="radio" name="qno2" value="1">Not At All Friendly</td>
</tr>
<tr/>
<tr>
<td colspan="4">3.How Helpful was the Event?</td>
</tr>
<tr>
<td><input type="radio" name="qno3" value="3">Extremely Helpful</td>
<td><input type="radio" name="qno3" value="2">Somewhat Helpful</td>
<td><input type="radio" name="qno3" value="1">Not At All Helpful</td>
</tr>
<tr/>
<tr>
<td colspan="4">4.Was the event length too long too short or about right?</td>
</tr>
<tr>
<td><input type="radio" name="qno4" value="3">Too Long</td>
<td><input type="radio" name="qno4" value="2"> About Right</td>
<td><input type="radio" name="qno4" value="1"> Too Short</td>
</tr>
<tr/>
<tr>
<td colspan="4">5.Is there anything else you’d like to share about the event?</td>
</tr>
<tr>
<td colspan="4">
<textarea name="comment" rows="3" cols="40"></textarea>
</td>

</tr>
<tr>
<th colspan="4">
<input type="submit" name="submit" value="Submit"/>
</th>
</tr>
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
?>