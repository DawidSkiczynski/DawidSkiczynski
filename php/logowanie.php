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
        if(isset($_POST['submit'])){
            require_once ('polacz.php');
            $login=$_POST['login'];
            $haslo=$_POST['haslo'];
            $pol=new mysqli('localhost','root','','test');
            $login=$pol->real_escape_string($login);
            $haslo=$pol->real_escape_string($haslo);
            $sql="SELECT * FROM users WHERE login='$login'";
            $wynik=$pol->query($sql);
            if($wynik->num_rows==1){
                $wiersz=$wynik->fetch_row();
                $haslo2=$wiersz[1];
                if($haslo==$haslo2){
                    $_SESSION['dziala']="dziala";
                    header('location: user-content.php');
                }
                else{
                    $_SESSION['blad']="błędny login lub hasło";
                    header('location: zaloguj.php');
                }
            }
            else{
                $_SESSION['blad']="błędny login lub hasło";
                header('location: zaloguj.php');
            }
        }   
        else{
            $_SESSION['blad']="błędny login lub hasło";
            header('location: zaloguj.php');
        }
        $pol->close();
    ?>
</body>
</html>