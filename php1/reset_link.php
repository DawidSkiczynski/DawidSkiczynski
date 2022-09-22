<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if(isset($_GET['submit'])){
            require_once('polacz.php');
            $login=$_GET['login'];
            $kod=rand(10,10000);
            $pol=new mysqli('localhost','root','','test');
            $login=trim($pol->real_escape_string($login));
            $kod=rand(10,10000);
            $_SESSION['nazwa']=$login;
            $sql="SELECT * FROM users WHERE login='$login'";
            $wynik=$pol->query($sql);
            $link="http://localhost/program%20php/reset_hasla_link.php?login=$login&kod=$kod";
            if($wynik->num_rows==1){
                $dod="UPDATE users SET kod='$kod' WHERE login='$login'";
                if(mysqli_query($pol, $dod)){
                    if(mail("tesciktegotypu@op.pl","reset hasła","kod do resetu hasła: $kod link do resetu hasła: $link")){
                        echo "wysłano link do resetu hasła";
                    }
                    else{
                        echo "nie udało się wysłać kodu";
                    }
                }
            }
            else{
                echo "źle";
            }
        }
        else{
            echo "błąd";
        }
    ?>
    
</body>
</html>