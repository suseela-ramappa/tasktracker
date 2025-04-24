<?php
include 'includes/db.php';
session_start();

$id = $_GET['id'];

// Optional: validate ownership here if needed
$conn->query("DELETE FROM tasks WHERE id=$id");

// Delay before redirecting to show the animation
header("refresh:2; url=dashboard.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting Task...</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
      
    </style>
</head>
<body>
    <div class="message-box">
        <h2>Deleting Task...</h2>
        <div class="loader"></div>
        <p>Redirecting to dashboard</p>
    </div>
</body>
</html>
