<?php
session_start();
include("../config/connection.php");

if(!isset($_SESSION['id']))
{
header("Location: ../login.php");
exit();
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Admin Dashboard</title>

</head>

<body>

<h1>Admin Dashboard</h1>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<hr>

<ul>

<li><a href="approve_events.php">Approve Events</a></li>

<li><a href="manage_venues.php">Manage Venues</a></li>

<li><a href="reports.php">Reports</a></li>

<li><a href="analytics.php">Analytics</a></li>

<li><a href="../logout.php">Logout</a></li>

</ul>

</body>

</html>