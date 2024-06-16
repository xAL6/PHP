<?php
include 'db.php';
include 'logger.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        $token = bin2hex(random_bytes(16));
        setcookie("auth_token", $token, time() + (86400 * 30), "/");
        $updateTokenSql = "UPDATE users SET token=? WHERE id=?";
        $updateStmt = $conn->prepare($updateTokenSql);
        $updateStmt->bind_param("si", $token, $row['id']);
        $updateStmt->execute();

        echo "Success";
        logActivity("login", $row['username']);
    } else {
        echo "密碼錯誤";
    }
} else {
    echo "用戶不存在";
}

$stmt->close();
$conn->close();
?>
