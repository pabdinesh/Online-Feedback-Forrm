<?php
include("connect.php");
session_start();
	?>
	<?php
	if($_SESSION['admin']!="")
	{?>
	<script src="jquery.min.js"></script>
<form>
<table >
<tr>
<th colspan="2"> Registration Status</th>
</tr>
<br/><br/><br/>
<tr>
<td colspan="2"><select name="event_selec" onchange="stats(this.value);">
<option value="" disabled selected>Select an Event</option>
<?php
$qu1=mysqli_query($connection,"select * from event");
while($fe1=mysqli_fetch_assoc($qu1))
{
	?>
<option value="<?php echo $fe1['id'];?>"><?php echo $fe1['name'];?></option>
<?php } ?>
</select>
</td>
</tr>
</table>
<div id="tav">
</div>
</form>
</center>
<script>

function stats(evenid)
{


				$.ajax({
            type: "POST",
            data: {eventid:evenid},
            url: "get_stats.php",
            success: function(data){

          	$("#tav").html(data);

                }
            });
}
</script>
	<?php
	}
	else
	{ header("location:admin.php");
}
?>