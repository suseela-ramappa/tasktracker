<?php
include 'includes/db.php';
session_start();

$id = $_GET['id'];

// Update task status to 'completed'
$conn->query("UPDATE tasks SET status='completed' WHERE id=$id");

// Delay before redirecting to show the animation
header("refresh:2; url=dashboard.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Completed</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="message-box">
        <h2>Task Completed Successfully!</h2>
        <div class="loader"></div>
        <p>Redirecting to dashboard...</p>
    </div>
</body>
</html>
