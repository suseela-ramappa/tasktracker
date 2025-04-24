<?php
include 'includes/db.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $created_at = date("Y-m-d H:i:s");

    if (!empty($title)) {
        $stmt = $conn->prepare("INSERT INTO tasks (user_id, task_title, task_description, created_at, status) VALUES (?, ?, ?, ?, 'pending')");
        $stmt->bind_param("isss", $user_id, $title, $description, $created_at);

        if ($stmt->execute()) {
            echo "<script>alert('Task added successfully!'); window.location='dashboard.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Title is required');</script>";
    }
}
?>

<!-- Add Task Form -->
<html>
    <header>
    <link rel="stylesheet" href="css/style.css">
</header>
    </html>
<form method="post" style="max-width: 500px; margin: 0 auto;">
    <h2>Add New Task</h2>
    <input type="text" name="title" placeholder="Task Title" required>
    <textarea name="description" placeholder="Task Description" rows="4"></textarea>
    <button type="submit">Add Task</button>
</form>
