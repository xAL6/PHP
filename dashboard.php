<?php
include 'includes/authenticate.php';
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>儀表板</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>歡迎, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>您已成功登錄。</p>
    <a href="includes/logout.php" class="btn btn-danger">登出</a>
</div>
</body>
</html>
