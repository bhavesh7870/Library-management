<?php
include 'includes/db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['admin'] = $email;
    header("Location: admin/dashboard.php");
} else {
    echo "Invalid Credentials";
}
?>
