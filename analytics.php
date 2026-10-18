<?php
session_start();
include("../config/connection.php");

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit();
}

$users=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$events=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM events"));
$approved=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM events WHERE status='Approved'"));
$registrations=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM registrations"));
$attendance=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM attendance"));
?>

<!DOCTYPE html>
<html>

<head>
<title>System Analytics</title>
</head>

<body>

<h1>System Analytics</h1>

<table border="1" cellpadding="10">

<tr>
<th>Statistic</th>
<th>Total</th>
</tr>

<tr>
<td>Total Users</td>
<td><?php echo $users; ?></td>
</tr>

<tr>
<td>Total Events</td>
<td><?php echo $events; ?></td>
</tr>

<tr>
<td>Approved Events</td>
<td><?php echo $approved; ?></td>
</tr>

<tr>
<td>Total Registrations</td>
<td><?php echo $registrations; ?></td>
</tr>

<tr>
<td>Attendance Records</td>
<td><?php echo $attendance; ?></td>
</tr>

</table>

<br>

<a href="dashboard.php">Back Dashboard</a>

</body>

</html>