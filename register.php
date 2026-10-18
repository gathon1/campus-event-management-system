<?php
include("config/connection.php");
?>
<?php

if(isset($_POST['register'])){

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql="INSERT INTO users(full_name,email,password,role)
VALUES('$fullname','$email','$password','Student')";

if(mysqli_query($conn,$sql))
{
echo "<script>alert('Registration Successful');</script>";
}
else
{
echo "<script>alert('Registration Failed');</script>";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>
</head>

<body>

<h1>Student Registration</h1>

<form action="" method="POST">

<label>Full Name</label><br>
<input type="text" name="fullname" required><br><br>

<label>Email Address</label><br>
<input type="email" name="email" required><br><br>

<label>Password</label><br>
<input type="password" name="password" required><br><br>

<input type="submit" name="register" value="Register">

</form>

<br>

<a href="index.php">Back Home</a>

</body>
</html>