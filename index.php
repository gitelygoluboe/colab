<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>villager</title>
    <link rel="icon" href="images/icon.webp"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body style="display: grid;">
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <section class="login"><br>
        <form style="text-align: center;" method="post">
            <input class="inp" type="text" name="login" placeholder="введите логин"><br><br>
            <input class="inp" type="password" name="pass" placeholder="введите пароль"><br><br>
            <input  type="submit" value="login" class="sub"><br><br>
        </form>
        <button onclick="register();" id="reg_but" class="sub">зарегестрируйтесь</button><br>
        <form method="post" id="register" style="display: none;text-align: center   ;"><br>
            <input class="inp" type="text" name="logi" max="10" placeholder="придумайте логин"><br><br>
            <input class="inp" type="password" name="passi" max="8" placeholder="придумайте пароль"><br><br>
            <input type="text" name="name" class="inp" max="15" placeholder="введите имя"><br><br>
            <input type="text" name="code" class="inp id" placeholder="login друга"><br><br>
            <input type="submit" value="отправить запрос" class="sub">
        </form>
    </section>
    <script src="javascript.js"></script>
    <?php
        require_once 'index_php.php';
    ?>
</body>
</html>