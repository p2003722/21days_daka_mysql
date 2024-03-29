<?php
require 'permission/xcx.php';
require 'permission/user.php';
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更改密码</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="icon" href="/image/favicon.ico">
</head>
<body>
    <div class="login-form">
    <h1>更改密码</h1>
    <form action="password_process.php" method="post" id="passwordForm">
        <input type="hidden" id="username" name="username" value="<?php echo $user['username']; ?>">
        <label for="password">原密码：</label>
        <input type="password" id="password" name="password" required>
        <label for="password">新密码：</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">确定</button>
    </form>
        <a href="index.php" class="register-link">返回主页</a>
    </div>
    
    <script>
        // 在表单提交前进行密码哈希
        document.getElementById("passwordForm").addEventListener("submit", function(event) {
            event.preventDefault(); // 阻止表单默认提交行为
    
            var password = document.getElementById("password").value;
    
            // 使用SHA512哈希函数对密码进行哈希
            var hashedPassword = CryptoJS.SHA512(password).toString();
    
            // 将编码后的密码赋值回表单字段
            document.getElementById("password").value = hashedPassword;
    
            var new_password = document.getElementById("new_password").value;
    
            // 使用SHA512哈希函数对密码进行哈希
            var hashedPassword = CryptoJS.SHA512(new_password).toString();
    
            // 将编码后的密码赋值回表单字段
            document.getElementById("new_password").value = hashedPassword;
            // 提交表单
            this.submit();
        });
    </script>
    
</body>
</html>
