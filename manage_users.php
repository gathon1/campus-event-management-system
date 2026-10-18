<?php
session_start();
include("../config/connection.php");

if(!isset($_SESSION['id']))
{
header("Location: ../login.php");
exit();
}

$result=mysqli_query($conn,"SELECT * FROM users");
?>

<!DOCTYPE html>

<html>

<head>

<title>Manage Users</title>

</head>

<body>

<h1>System Users</h1>

<table border="1" cellpadding="10">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Role</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['role']; ?></td>

</tr>

<?php

}

?>

</table>

</body>

</html>