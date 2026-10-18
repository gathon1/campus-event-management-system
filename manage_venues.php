<?php
session_start();
include("../config/connection.php");

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['add']))
{
    $name=$_POST['venue_name'];
    $location=$_POST['location'];
    $capacity=$_POST['capacity'];

    $check=mysqli_query($conn,"SELECT * FROM venues WHERE venue_name='$name'");

    if(mysqli_num_rows($check)>0)
    {
        echo "<script>alert('Venue already exists');</script>";
    }
    else
    {
        mysqli_query($conn,"INSERT INTO venues(venue_name,location,capacity)
        VALUES('$name','$location','$capacity')");

        echo "<script>alert('Venue Added Successfully');</script>";
    }
}

$result=mysqli_query($conn,"SELECT * FROM venues");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Venues</title>
</head>

<body>

<h2>Manage Venues</h2>

<form method="POST">

Venue Name<br>
<input type="text" name="venue_name" required><br><br>

Location<br>
<input type="text" name="location" required><br><br>

Capacity<br>
<input type="number" name="capacity" required><br><br>

<input type="submit" name="add" value="Add Venue">

</form>

<br><hr><br>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Venue</th>
<th>Location</th>
<th>Capacity</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['venue_id']; ?></td>
<td><?php echo $row['venue_name']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['capacity']; ?></td>
</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">Back Dashboard</a>

</body>
</html>