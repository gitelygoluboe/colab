<?php 
    require_once 'podsql.php';
    if(isset($_POST['whoPer'])){
        $who = $_POST['whoPer'];
        $sql = mysqli_query($link,"SELECT * FROM `trans`;");
        $i = 0;
        while($r = mysqli_fetch_array($sql)){
            if($r[0]==$who || $r[1]==$who){
                $x = $r[3]*100;
                $t = $r[2]-$r[2]*$r[3];
                $sigma = (int) $t;
                echo '
                '.$r[0].' ➖▶ 
                <span style="color:green">'.$r[2].'$</span> - 
                <span style="color:red">'.$x.'%</span> = 
                <span style="color:green">'.$sigma.'$</span> ➖▶ '.$r[1].'<br><br>';
                $i++;
            }
        }
        if($i==0){
            echo 'переводы исчезли или их нет';
        }
        echo '<script>
        document.getElementById(\'history\').style.display = \'none\';
        document.getElementById(\'historyper\').style.display = \'block\';
        </script>';
    }
?>