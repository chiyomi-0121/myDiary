<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    $diaryId = $_POST['id'];
    $_SESSION['id'] = $diaryId;

    $statement = $dbh->prepare('SELECT * FROM diarydata WHERE diaryId = :id');
    $statement->execute([
        'id' => $diaryId,
    ]);
    $diary = $statement->fetch();

    if(empty($diary)){
        redirect('./diary/list.php');
    }
    
    $createDate = $diary['createDate'];
    $title = $diary['title'];
    $content = $diary['content'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>毎日日記｜日記削除</title>
</head>
<body>
    <header>
        <h2>日記削除</h2>
    </header>
    <main>
        <div id="wrap">
            <a href="list.php">戻る</a>
            <div>下記の内容を削除しますがよろしいですか?</div>
            <table>
                <tbody>
                    <tr><th>日付</th><td><?= nl2br(htmlspecialchars($createDate)) ?></td></tr>
                    <tr><th>タイトル</th><td><?= nl2br(htmlspecialchars($title)) ?></td></tr>
                    <tr><th>内容</th><td><?= nl2br(htmlspecialchars($content)) ?></td></tr>
                </tbody>
            </table>
            <form action="delete_complete.php" method="post">
                <button type="submit">削除</button>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>