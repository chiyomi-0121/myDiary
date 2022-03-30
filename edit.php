<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();
    
    $userId = $_SESSION['userId'];

    if(isset($_SESSION['error'])){
        $errors = $_SESSION['error'];
    }

    $_SESSION['userId'] = $userId;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>毎日日記｜日記を書く</title>
</head>
<body>
    <header>
        <h2>日記を書く</h2>
    </header>
    <main>
        <div id="wrap">
            <form action="edit_confirm.php" method="post">
                <table>
                    <tbody>
                        <tr>
                            <th><label for="title">タイトル</label></th>
                            <td><input type="text" name="title" id="title" value=""></td>
                        </tr>
                        <tr>
                            <th><label for="content">日記内容</label></th>
                            <td><textarea name="content" id="content" value="" style="resize: none; width: 200px;height: 100px"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <?php 
                    if(isset($errors)){
                        foreach ($errors as $error){
                ?>
                            <p style="color: red;"><?= $error ?></p>
                <?php
                        }
                    } 
                ?>
                <button type="submit">投稿</button>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <div>(*´ω｀*)ﾊﾔﾙ</div>
    </footer>
</body>
</html>
<?php 
    unset($_SESSION['error']);
?>