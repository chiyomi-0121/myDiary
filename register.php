<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        $username = null;
    }

    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }else{
        $email = null;
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>日記｜新規登録</title>
</head>
<body>
    <header>
        <h2>新規登録</h2>
    </header>
    <main>
        <div id="wrap">
           <form action="register_confirm.php" method="post">
                <ul>
                    <li>
                        <label>ユーザ名</label>
                        <input type="text" name="username" value="<?= $username ?>" required>
                    </li>
                    <li>
                        <label>メールアドレス</label>
                        <input type="email" name="email" value="<?= $email ?>" required>
                    </li>
                    <li>
                        <label>パスワード</label>
                        <input type="password" name="password" required>
                    </li>
                </ul>
                <button type="submit">確認画面へ</button>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>
<?php 
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
?>