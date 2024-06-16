<?php
session_start();
if (!isset($_SESSION['userid']) || !isset($_COOKIE['auth_token'])) {
    header("Location: ../index.php");
    exit();
}

include 'db.php';

$token = $_COOKIE['auth_token'];
$sql = "SELECT * FROM users WHERE id=? AND token=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $_SESSION['userid'], $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    session_unset();
    session_destroy();
    setcookie("auth_token", "", time() - 3600, "/");
    header("Location: ../index.php");
    exit();
}

$stmt->close();
$conn->close();
?>
