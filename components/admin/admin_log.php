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
        <?php if ($_SESSION['message']): ?>
                <p class="msg"><?= $_SESSION['message']; ?></p>
        <?php endif; ?>
            <?php unset($_SESSION['message']); ?>   
        </form> 
        <a href="../../catalog.php">К каталогу</a>      
    </section>    
</body>
</html>