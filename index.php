
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>TaskTrack | Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Welcome to TaskTrack</h1>
    <p>Your personal task manager</p>
    <a href="register.php" class="btn">Register</a>
    <a href="login.php" class="btn">Login</a>
</body>
</html>
