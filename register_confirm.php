<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $ps_len = strlen($password);

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>日記｜登録内容確認</title>
</head>
<body>
    <header>
        <h2>登録内容確認</h2>
    </header>
    <main>
        <div id="wrap">
            <div>下記の内容で登録しますがよろしいですか？</div>
            <table>
                <tbody>
                <tr><th>ユーザ名</th><td><?= htmlspecialchars($username) ?></td></tr>
                <tr><th>メールアドレス</th><td><?= htmlspecialchars($email) ?></td></tr>
                <tr><th>パスワード</th><td><?= str_repeat('*', $ps_len) ?></td></tr>
                </tbody>
            </table>
            <div>
                <form action="register_complete.php" method="post">
                    <button type="submit">登録</button>
                </form>
                <form action="register.php" method="post">
                    <button type="submit">修正</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>