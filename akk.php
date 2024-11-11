<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>villager</title>
    <link rel="icon" href="images/icon.webp"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <section class="nav" id="nav"><br><br><br><br>
        <div id="frendList"></div>
        <div class="fsearch">
            <form method="post" style="width: 100%;">
                <input name="findfriend" type="search" class="search"/>
            </form>
        </div>
        <div class="fren">friends</div>
    </section>
    <section class="proffile"><b>
        <img src="images/icon.webp" width="70" height="70" class="avatar" id="avatar" onclick="smenAv();"/>
        <div id="log" class="inf" style="text-align: center;">login</div><br>
        <div id="level" class="inf">~~~ -|-</div><br>
        <div id="dollar" class="inf">~~~ $</div>
        <form method="post">
            <input type="hidden" name="avatar" id="hiddAv">
            <input type="hidden" name="logav" id="hidAv">
            <input type="submit" value="✔" class="subAv" id="subAv" style="display: none;">
        </form>
    </b></section>
    <form method="post">
        <input type="hidden" name="whoPer" id="whoPer" value="0">
        <button type="submit" class="history" id="history" style="height: 73px;font-size: 24px">
            <span style="color:green">переводы </span><br>
            <span style="color: red;">$ </span>
            <span>◀▶ </span>
            <span style="color: green;">$</span>
        </button>
    </form>
    <div class="history" id="historyper" style="display: none;" onclick="history(0)">
        <?php
            require_once 'akk_php_his.php';
        ?>
    </div>
    <section class="profFriend" id="profFriend" style="display: none;">
        <img src="images/icon.webp" width="20" height="20" id="avFren">
        <div id="logFren">login</div>
        <div id="levFren">~~-|-</div>
        <div id="sotFren">~~~$</div>
        <form method="post">
            <input type="number" name="per" class="inper" onfocus="perIn()" onfocusout="perOut()">
            <input type="hidden" name="fromper" id="fromper">
            <input type="hidden" name="toper" id="toper">
            <input type="hidden" name="frenYes" id="frenYes">
            <div class="pomper" id="pomper" style="display: none;"></div>
            <input id="perevod" type="submit" value="перевести" class="otper" style="display: none;">
        </form>
        <form method="post" id="formAddFren">
            <input type="hidden" name="logFriend" id="logFriend">
            <input type="hidden" name="logProffile" id="logProffile">
            <input type="submit" value="+ 900$" class="addFren">
        </form>
    </section>
    <p style="text-align: center;">
        <a href="i.html" class="infor">если что то не понимаешь, то тебе сюда</a>
    </p>
    <?php
        require_once 'akk_php.php';
    ?>
</body>
</html>