<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    $statement = $dbh->prepare('SELECT * FROM `userdata`');
    $statement->execute();
    $userdatas = $statement->fetchAll();

    $_SESSION['username'] = $_POST['username'];

    foreach($userdatas as $userdata){
        if($userdata['userName'] == $_POST['username'] && password_verify($_POST['password'], $userdata['password'])){
            $_SESSION['userId'] = $userdata['userId'];
            redirect('./diary/home.php');
        }
    }

    $_SESSION['error'] = 'ユーザ名またはパスワードが間違っています';
    redirect('./diary/login.php');
    
?>