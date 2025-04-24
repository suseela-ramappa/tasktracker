<?php include 'includes/db.php'; session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    $conn->query("INSERT INTO tasks (user_id, task) VALUES ($user_id, '$task')");
}

$tasks = $conn->query("SELECT * FROM tasks WHERE user_id=$user_id");
?>
<h2>Welcome to TaskTrack</h2>
<form method="post">
    <input name="task" required placeholder="New Task">
    <button type="submit">Add</button>
</form>
<ul>
<?php while ($row = $tasks->fetch_assoc()): ?>
    <li>
        <?= $row['task'] ?> (<?= $row['status'] ?>)
        <?php if ($row['status'] == 'pending'): ?>
            <a href="complete_task.php?id=<?= $row['id'] ?>">✅</a>
        <?php endif; ?>
        <a href="delete_task.php?id=<?= $row['id'] ?>">🗑️</a>
    </li>
<?php endwhile; ?>
</ul>
<a href="logout.php">Logout</a>
<html>
    <header>
    <link rel="stylesheet" href="css/style.css">
</header>
    </html>