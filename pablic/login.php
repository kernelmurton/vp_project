<?php
    session_start();
    $user_id=htmlspecialchars($_POST['user_id'],ENT_QUOTES,'UTF-8');
    $conn_err=htmlspecialchars($_POST['conn_err'],ENT_QUOTES,'UTF-8');
    $bind_err=htmlspecialchars($_POST['bind_err'],ENT_QUOTES,'UTF-8');
?>

<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<title>ログインページ</title>
<body>
<div class="loginbox">
    <form action="../src/exe/login_exe.php" method="POST">
        <h1>ログイン</h1>
        <div class="textbox">
            <input type="text" placeholder="ログイン名" name="user_id" id="user_id" required>
        </div>
        <div class="textbox">
            <input type="text" placeholder="パスワード" name="pass" id="pass" required>
        </div>
        <input type="submit" value="ログイン">
    </form>
</div>
<?php

    if(isset($conn_err)) echo $conn_err;
    if(isset($bind_err)) echo $bind_err;
    
?>
</body>
</html>
