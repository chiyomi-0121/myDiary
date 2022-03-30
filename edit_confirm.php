<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_SESSION['userId'];

    if(empty($_POST['title'])){
        $errors[] = 'タイトルは必須項目です。';
    }

    if(empty($_POST['content'])){
        $errors[] = '投稿内容は必須項目です。';
    }else{
        if(140 < mb_strlen($_POST['content'], 'UTF-8')){
            $errors[] = '投稿内容は140文字以内で記述してください。';
        }
    }

    if(isset($errors)){
        $_SESSION['error'] = $errors;
        redirect('./diary/edit.php');
    }

    $_SESSION['userId'] = $userId;
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['content'] = $_POST['content'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>毎日日記｜確認</title>
</head>
<body>
    <header>
        <h2>確認</h2>
    </header>
    <main>
        <div id="wrap">
            <div>下記の内容で投稿しますがよろしいですか？</div>
            <table>
                <tbody>
                <tr><th>タイトル</th><td><?= nl2br(htmlspecialchars($title)) ?></td></tr>
                <tr><th>投稿内容</th><td><?= nl2br(htmlspecialchars($content)) ?></td></tr>
                </tbody>
            </table>
            <form action="edit_complete.php" method="post">
                <button type="submit">投稿</button>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>