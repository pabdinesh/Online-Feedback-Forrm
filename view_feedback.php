<?php
include("connect.php");
session_start();
?>
<?php
	if($_SESSION['admin']!="")
	{?>
	<script src="jquery.min.js"></script>
<table>
<tr>
<th colspan="3"> Recent Feedbacks </th>
</tr>
<td colspan="3">


<select name="event_select" onchange="feedback(this.value);">
<option value="" disabled selected>Select an Event</option>
<?php
$qu=mysqli_query($connection,"select * from event");
while($fe=mysqli_fetch_assoc($qu))
{
	?>
<option value="<?php echo $fe['id'];?>"><?php echo $fe['name'];?></option>
<?php } ?>
</select>
</td>
</tr>
<?php $event_id=$_REQUEST['event_select']; ?>

</table>
<div id="fgefgwerg">
</div>
<script>
function feedback(eveid)
{
	

				$.ajax({
            type: "POST",
            data: {eventid:eveid},
            url: "get_event.php",
            success: function(data){

          	$("#fgefgwerg").html(data);

                }
            });
}
</script>
<?php
}
else
{
	header("location:admin.php");
}
?>