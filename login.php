<?php
include("config/connection.php");
session_start();

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password']))
        {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            if($user['role']=="Admin")
{
    header("Location:admin/dashboard.php");
}
elseif($user['role']=="Organizer")
{
    header("Location:organizer/dashboard.php");
}
else
{
    header("Location:student/dashboard.php");
}

            exit();
        }
        else
        {
            echo "<script>alert('Wrong Password');</script>";
        }
    }
    else
    {
        echo "<script>alert('User Not Found');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

<h1>Login</h1>

<form method="POST">

<label>Email</label><br>
<input type="email" name="email" required><br><br>

<label>Password</label><br>
<input type="password" name="password" required><br><br>

<input type="submit" name="login" value="Login">

</form>

</body>
</html>