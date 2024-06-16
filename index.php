<?php
session_start();
if (isset($_SESSION['userid'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登錄和註冊</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="authTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">登錄</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">註冊</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="authTabsContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form id="loginForm">
                                <div class="form-group">
                                    <label for="loginUsername">帳號</label>
                                    <input type="text" class="form-control" id="loginUsername" required>
                                </div>
                                <div class="form-group">
                                    <label for="loginPassword">密碼</label>
                                    <input type="password" class="form-control" id="loginPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">登錄</button>
                            </form>
                            <div id="login-error-message" class="mt-2 text-danger"></div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form id="registerForm">
                                <div class="form-group">
                                    <label for="registerUsername">帳號</label>
                                    <input type="text" class="form-control" id="registerUsername" required>
                                </div>
                                <div class="form-group">
                                    <label for="registerPassword">密碼</label>
                                    <input type="password" class="form-control" id="registerPassword" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">確認密碼</label>
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">註冊</button>
                            </form>
                            <div id="register-error-message" class="mt-2 text-danger"></div>
                            <div id="register-success-message" class="mt-2 text-success"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
