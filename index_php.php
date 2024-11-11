<?php
    require_once 'podsql.php';
    $i = 0;
    if (isset($_POST['login'])&&
    isset($_POST['pass'])) {
        $login = $_POST['login'];
        $password = $_POST['pass'];
        $result = mysqli_query($link,'SELECT * FROM users;');
        while ($sqli = mysqli_fetch_array($result)) {
            if($sqli[0]==$login){
                $i = 1;
            }
        }
        if($i==1){
            $result = mysqli_query($link,'SELECT * FROM users WHERE login = \''.$login.'\';');

            while($sql=mysqli_fetch_array($result)){
                if($sql[1] == $password){
                    $r = mysqli_query($link,'SELECT `NUN`,`'.$sql[0].'` FROM `friends`;');
                    while($fren = mysqli_fetch_array($r)){
                        if($fren[1]==1){
                            echo '<script>
                                friends.push(\''.$fren[0].'\');
                            </script>';
                        }
                    }
                    echo '<script>
                        login(\''.$sql[0].'\','.$sql[2].','.$sql[3].','.$sql[4].');    
                    </script>';
                }
                else{
                    echo '<script>alert(\'пароль не подходит\');</script>';
                }
            }
        }  
        else{
            echo '<script>alert(\'логин не существует\');</script>';
        }
    }
    if(isset($_POST['logi'])&&
    isset($_POST['passi'])&&
    isset($_POST['name'])&&
    isset($_POST['code'])){
        $login = $_POST['logi'];
        $password = $_POST['passi'];
        $name = $_POST['name'];
        $code = $_POST['code'];
        $result = mysqli_query($link,'SELECT * FROM users;');
        while($sql = mysqli_fetch_array($result)){
            if($sql[0]==$login){
                echo '<script>alert(\'такой логин уже существует\');</script>';
            }
            else{
                //отправить электронное письмо
            }
        }
    }
?>