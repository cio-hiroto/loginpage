<?php

require_once '../classes/UserLogic.php';

session_start();

$err = $_SESSION;

$err = [];

if(!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = 'メールアドレスを記入してください';
}
if(!$password = filter_input(INPUT_POST, 'password')) {
    $err['password'] = 'パスワードを記入してください';
}


if (count($err) > 0) {
    $_SESSION = $err;
    header('Location: login.php');
    return;
}
echo 'ログインしました';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録完了画面</title>
</head>
<body>
<?php if (count($err) > 0) : ?>
<?php foreach($err as $e) : ?>
    <p><?php echo $e ?></p>
    <?php endforeach ?>
    <?php else : ?>
    <p>ユーザー登録が完了しました。</p>
    <?php endif ?>
    <a href="./login.php">戻る</a>

</body>
</html>