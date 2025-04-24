<?php include 'includes/db.php'; session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $res->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>
<html>
    <header>
    <link rel="stylesheet" href="css/style.css">
</header>
    </html>
<form method="post">
    <label>Enter your email</label><br>
    <input name="email" required placeholder="Email">
    <label>Enter your password</label><br>
    <input name="password" type="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
