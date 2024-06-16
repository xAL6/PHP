<?php
include 'db.php';
include 'logger.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // 檢查用戶名是否已經存在
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "該帳號已被使用";
    } else {
        // 如果用戶名不存在，則插入新用戶
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "註冊成功";
            logActivity("register", $username);
        } else {
            echo "註冊失敗: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "無效的請求方法";
}
?>
