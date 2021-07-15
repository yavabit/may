<?php session_start();
    if (isset($_SESSION['login'])) {
        header('Location: admin_info.php');
    }
?>
<!DOCTYPE html>
<html lang="ru en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/admin_log.css">
    <title>Admin</title>
</head>
<body>
    <section class="admin-log">
        <form action="admin.php" method="POST">
        <label for="login"> Логин</label>
            <input type="text" name="login" id="login" autofocus>
        <label for="pass">Пароль</label>
            <input type="password" name="pass" id="pass">
        <button type="submit">Войти</button>
        <?php if ($_SESSION['message'] && !isset($_SESSION['login'])): ?>
                <p class="msg"><?= $_SESSION['message']; ?></p>
        <?php endif; ?>
            <?php unset($_SESSION['message']); ?>
        <button class="forgot">Забыли пароль?</button>
        </form>
        <a href="../../catalog.php">К каталогу</a>

    </section>
    <div class="forgot_pass">
        <h2>Восстановление пароля</h2>
        <p>Для восстановления пароля необходимо связаться с разработчиком сайта. Во избежание несанкционированного получения доступа
        связаться необходимо владельцу сайта или доверенному лицу, с правами подтверждающими владение сайтом.
        </p>
        <p>Пожалуйста, напишите на указанные контакты:
        <a href="mailto: toscha.zhilenkov@yandex.ru">toscha.zhilenkov@yandex.ru</a><br>
        <a href="mailto: toscha.zhilenkov@gmail.com">toscha.zhilenkov@gmail.com</a><br>
        <a href="https://www.instagram.com/yava_web/">Instagram</a>
        </p>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="forgot_pass.js"></script>
</body>
</html>