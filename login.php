<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>日記｜ログイン</title>
</head>
<body>
    <header>
        <h2>ログイン</h2>
    </header>
    <main>
        <div id="wrap">
           <form action="./login_check.php" method="post">
                <div id="login">
                    ユーザー名<br><input type="text" name="username" required><br>
                    パスワード<br><input type="password" name="password" required>
                </div>
                <?php if(isset($_SESSION['error'])){ ?>
                    <p style="color: red;"><?= $_SESSION["error"] ?></p>
                <?php } ?>
                <button type="submit">ログイン</button>
                <div id="register">
                    <a href="register.php">新規登録</a>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>