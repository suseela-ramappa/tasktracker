<?php include 'includes/db.php'; session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    header("Location: login.php");
}
?>
<html>
    <header>
    <link rel="stylesheet" href="css/style.css">
</header>
    </html>
<form method="post">
<label>Enter your Username</label>
    <input name="username" required placeholder="Username">
    <label>Enter your email</label>
    <input name="email" required placeholder="Email">
    <label>Enter your password</label>
    <input name="password" type="password" required placeholder="Password">
    <button type="submit">Register</button>
</form>
