<?php

include("../config/connection.php");

$id=$_GET['id'];

$sql="UPDATE events
SET status='Approved'
WHERE event_id='$id'";

if(mysqli_query($conn,$sql))
{

echo "<script>

alert('Event Approved Successfully');

window.location='approve_events.php';

</script>";

}

?>