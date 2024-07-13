# 後端登入系統

利用PHP和MySQL構建的用戶註冊和登入系統,包括以下功能：
- 用戶註冊
- 用戶登入
- 用戶登出
- 記住我功能
- 日誌記錄（包括IP地址、瀏覽器信息等）

## 結構

```
backend
│
├── /css
│   └── styles.css
├── /js
│   └── scripts.js
├── /includes
│   ├── db.php
│   ├── register.php
│   ├── login.php
│   ├── logout.php
│   ├── authenticate.php
│   └── logger.php
├── /logs
│   └── activity.log
├── index.php
└── dashboard.php
```

## 使用

1. **克隆倉庫**
    ```bash
    git clone https://github.com/xAL6/backend.git
    ```

2. **導入資料庫**
    - 打開MySQL 命令行
    - 創建資料庫 `user_auth`：
    ```sql
    CREATE DATABASE user_auth;

    USE user_auth;

    CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(50) NOT NULL,
      `password` varchar(255) NOT NULL,
      `token` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `username` (`username`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```

3. **配置文件**
    - 確保 `includes/db.php` 文件中數據庫設置正確：
    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_auth";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }
    ?>
    ```

4. **設置寫入權限**
    - 確保 `logs` 目錄具有寫入權限：
        - 在Windows中，右鍵點擊 `logs` 文件夾，選擇“屬性”。
        - 轉到“安全”選項卡，點擊“編輯”。
        - 選擇 `IIS_IUSRS` 或 `Everyone`，並勾選“允許”列中的“寫入”權限。
        - 點擊“應用”然後“確定”。

## 使用

1. **啟動**
    - 啟動 Apache 和 MySQL 服務。

2. **訪問**
    - 在瀏覽器中打開：http://localhost/backend


