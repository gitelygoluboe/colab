<?php
    require_once 'podsql.php';
    echo '<script src="akk.js"></script>';
    if(isset($_POST['avatar'])&&
    isset($_POST['logav'])){
        $result = mysqli_query($link, 'UPDATE `users` SET `avatar`='.$_POST['avatar'].' WHERE `login` = \''.$_POST['logav'].'\';');
        echo '<script>
            proffileData[1] = '.$_POST['avatar'].';
            sessionStorage.setItem(\'proffileData\',JSON.stringify(proffileData));
            avatar_number = proffileData[1];
            document.getElementById("avatar").src = avatars[proffileData[1]];
        </script>';
    }
    if(isset($_POST['logFren'])&&
    isset($_POST['frenNo'])){
        $logFren = $_POST['logFren'];
        $frenNo = $_POST['frenNo'];
        $sql = mysqli_query($link,"SELECT * FROM `users` WHERE `login` = '".$logFren."';");
        $result = mysqli_fetch_array($sql);
        echo '<script>
            document.getElementById(\'profFriend\').style.display = \'block\';
            document.getElementById(\'logFren\').innerHTML = \''.$result[0].'\';
            document.getElementById(\'levFren\').innerHTML = \''.$result[3].'\'+\'-|-\';
            document.getElementById(\'sotFren\').innerHTML = \''.$result[4].'\'+\'$\';
            document.getElementById(\'avFren\').src = avatars['.$result[2].'];
            document.getElementById(\'fromper\').value = proffileData[0];
            document.getElementById(\'toper\').value = \''.$logFren.'\';
            document.getElementById(\'frenYes\').value = \''.$frenNo.'\';
            document.getElementById(\'logFriend\').value = \''.$logFren.'\';
            document.getElementById(\'logProffile\').value = proffileData[0];
            </script>';
        if($frenNo==1){
            echo '<script>
            document.getElementById(\'formAddFren\').style.display=\'none\';
            </script>';
        }
    }
    if(isset($_POST['per'])&&
    isset($_POST['fromper'])&&
    isset($_POST['toper'])&&
    isset($_POST['frenYes'])){
        $per = $_POST['per'];
        $fromper = $_POST['fromper'];
        $toper = $_POST['toper'];
        $frenYes = $_POST['frenYes'];
        $sql = mysqli_query($link,"SELECT `sot`, `level` FROM `users` WHERE `login` = '".$fromper."';");
        $rfrom = mysqli_fetch_array($sql);
        $y = 10;
        if($per>$rfrom[0] || $per<=0){
            echo '<script>alert(\'у вас недостаточно житов\');</script>';
        }
        else{
            $sql = mysqli_query($link,"UPDATE `users` SET `sot` = `sot`-".$per." WHERE `login` = '".$fromper."';");
            $x = 0.1 - $rfrom[1]/10000;
            if($frenYes==1){
                $x = 0;
            }
            $sql = mysqli_query($link,"UPDATE `users` SET `sot` = `sot`+".$per-$per*$x." WHERE `login` = '".$toper."';");
            $sql = mysqli_query($link,"UPDATE `users` SET `sot` = `sot`+".$per*$x." WHERE `login` = 'igor';");
            $sql = mysqli_query($link,"UPDATE `users` SET `level` = `level`+".$per/$y." WHERE `login` = '".$fromper."';");
            $sql = mysqli_query($link,"INSERT INTO `trans` (`from`,`to`,`sum`,`com`) VALUES('".$fromper."','".$toper."',".$per.",".$x.");");
            echo '<script>
            proffileData[2] += '.$per/$y.';
            proffileData[3] -= '.$per.';
            sessionStorage.setItem(\'proffileData\',JSON.stringify(proffileData));
            document.getElementById("level").innerHTML = proffileData[2]+\' -|-\';
            document.getElementById("dollar").innerHTML = proffileData[3]+\' $\';
            </script>';
        }
    }
    if(isset($_POST['findfriend'])){
        $friend = $_POST['findfriend'];
        $sql = mysqli_query($link,"SELECT * FROM `users` WHERE `login` = '".$friend."';");
        $result = mysqli_fetch_array($sql);
        echo '<script>document.getElementById(\'frendList\').innerHTML = \'\';</script>';
        if($result==0){
            echo '<script>document.getElementById(\'frendList\').innerHTML = \'результатов не найдено\';</script>';
        }
        else{
            echo '<script>
            var form = document.createElement(\'form\');
            form.method=\'post\';
            form.id=\'formNotFren\';
            document.getElementById(\'frendList\').appendChild(form);
            var inpSub = document.createElement(\'input\');
            inpSub.type = \'submit\';
            inpSub.value = \''.$friend.'\';
            inpSub.className = \'friend\';
            inpSub.id = \''.$friend.'\';
            document.getElementById(\'formNotFren\').appendChild(inpSub);
            var inpHid = document.createElement(\'input\');
            inpHid.type = \'hidden\';
            inpHid.name = \'logFren\';
            inpHid.value = \''.$friend.'\';
            document.getElementById(\'formNotFren\').appendChild(inpHid);
            var inpHidFren = document.createElement(\'input\');
            inpHidFren.type = \'hidden\';
            inpHidFren.name = \'frenNo\';
            inpHidFren.value = \'0\';
            if(friendsData.indexOf(\''.$friend.'\') != -1){
                inpHidFren.value = \'1\';
            }
            document.getElementById(\'formNotFren\').appendChild(inpHidFren);
            var forme = document.createElement(\'form\');
            forme.method=\'post\';
            forme.id=\'formFren\';
            document.getElementById(\'frendList\').appendChild(forme);
            var inpSube = document.createElement(\'input\');
            inpSube.type = \'submit\';
            inpSube.value = \'друзья\';
            inpSube.className = \'friend\';
            document.getElementById(\'formFren\').appendChild(inpSube);
            var inpHide = document.createElement(\'input\');
            inpHide.type = \'hidden\';
            inpHide.name = \'oiuhgf\';
            inpHide.value = \'sdfghn\';
            document.getElementById(\'formFren\').appendChild(inpHide);
            </script>';
        }
    }
    if(isset($_POST['logFriend'])&&
    isset($_POST['logProffile'])){
        $x = mysqli_query($link,"SELECT * FROM `users` WHERE `login`='".$_POST['logProffile']."';");
        $res = mysqli_fetch_array($x);
        if(900>$res[4]){
            echo '<script>alert(\'у вас недостаточно житов\');</script>';
        }
        else{
            $fren = $_POST['logFriend'];
            $prof = $_POST['logProffile'];
            $sql1 = "UPDATE `friends` SET `".$fren."` = 1 WHERE `NUN` = '".$prof."';";
            $sql2 = "UPDATE `friends` SET `".$prof."` = 1 WHERE `NUN` = '".$fren."';";
            $result = mysqli_query($link,$sql1);
            $result = mysqli_query($link,$sql2);
            $result = mysqli_query($link,"UPDATE `users` SET `sot` = `sot`+900 WHERE `login`='igor';");
            $result = mysqli_query($link,"UPDATE `users` SET `sot` = `sot`-900 WHERE `login`='".$prof."';");
            echo '<script>
            friendsData.push(\''.$fren.'\');
            sessionStorage.setItem(\'friendsData\',JSON.stringify(friendsData));
            document.getElementById(\'frendList\').innerHTML = \'\';
            frendListing();
            </script>';
        }
    }

?>
