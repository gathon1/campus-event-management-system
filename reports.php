<?php
session_start();
include("../config/connection.php");

if(!isset($_SESSION['id']))
{
header("Location: ../login.php");
exit();
}

$sql="SELECT users.full_name,
events.title,
registrations.status,
registrations.registration_date
FROM registrations
JOIN users ON registrations.student_id=users.id
JOIN events ON registrations.event_id=events.event_id
ORDER BY registrations.registration_date DESC";

$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Reports</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
margin:0;
}

.header{
background:#0d6efd;
color:white;
padding:20px;
text-align:center;
}

.container{
width:95%;
margin:auto;
margin-top:30px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

th{
background:#0d6efd;
color:white;
padding:12px;
}

td{
padding:10px;
text-align:center;
}

.back{
display:inline-block;
margin-top:20px;
padding:10px 15px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>

</head>

<body>
    <?php include("../includes/navbar.php"); ?>

<div class="header">

<h1>Registration Report</h1>

</div>

<div class="container">

<table border="1">

<tr>

<th>Student</th>
<th>Event</th>
<th>Status</th>
<th>Date Registered</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['registration_date']; ?></td>

</tr>

<?php } ?>

</table>

<a class="back" href="dashboard.php">Back Dashboard</a>

</div>

</body>
</html>