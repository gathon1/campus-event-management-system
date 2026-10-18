<?php
session_start();
include("../config/connection.php");

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit();
}

$sql="SELECT * FROM events";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>
<title>Approve Events</title>
</head>

<body>

<h1>Approve Events</h1>

<table border="1" cellpadding="10">

<tr>

<th>Title</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a href="approve.php?id=<?php echo $row['event_id']; ?>">

Approve

</a>

</td>

</tr>

<?php

}

?>

</table>

</body>

</html>