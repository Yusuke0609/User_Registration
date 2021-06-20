<?php
ini_set('display_errors', "On");
error_reporting(E_ERROR | E_PARSE | E_WARNING);

$errors = [];
$result = false;

$data = [];
$data['user_name'] = !empty($_POST['user_name'])? $_POST['user_name']: '';
$data['email'] = !empty($_POST['email'])? $_POST['email']: '';
$data['password'] = !empty($_POST['password'])? $_POST['password']: '';

if(!empty($_POST)) {
    if(empty($_POST['user_name'])){
        $errors['user_name'] = '名前を入力してください。';
    }
    if(empty($_POST['email'])) {
        $errors['email'] = 'メールアドレスを入力してください。';
    }
    if(empty($_POST['password'])) {
        $errors['password'] = 'パスワードを入力してください。';
    }
    if(empty($errors)){
        $result = true;
    }
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ユーザー登録</h1>

        <?php if($result): ?>
            <p class="success">処理を完了致しました。</p>
        <?php else: ?>
            <div class="container">
                <form action="rv01_regi.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputName">名前</label>
                        <input
                        name="user_name"
                        type="text"
                        placeholder="名前"
                        id="exampleInputName"
                        class="<?php echo !empty($errors['user_name'])? 'error': 'ok'?>"
                        value="<?php echo $data['user_name'] ?>"
                        >
                        <p class="error" style="color:red"><?php echo $errors['user_name'] ?></p>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">メールアドレス</label>
                        <input
                        name="email"
                        type="email"
                        placeholder="メールアドレス"
                        id="exampleInputEmail"
                        class="<?php echo !empty($errors['email'])? 'error': 'ok'?>"
                        value="<?php echo $data['email'] ?>"
                        >
                        <p class="error" style="color:red"><?php echo $errors['email'] ?></p>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">パスワード</label>
                        <input
                        name="password"
                        type="password"
                        placeholder="パスワード"
                        id="exampleInputPassword"
                        class="<?php echo !empty($errors['password'])? 'error': 'ok'?>"
                        value="<?php echo $data['password'] ?>"
                        >
                        <p class="error" style="color:red"><?php echo $errors['password'] ?></p>
                    </div>
                        <button type="submit">登録</button>
                </form>
            </div>
        <?php endif ?>
</body>
</html>