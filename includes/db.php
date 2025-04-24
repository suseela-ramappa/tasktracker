<?php
$conn = new mysqli("localhost", "root", "", "tasktrack");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
