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
            $haslo=$_POST['haslo'];
            $kod=$_POST['kod'];
            $pol= new mysqli('localhost','root','','test');
            $sql="SELECT * FROM users WHERE kod='$kod'";
            $wynik=$pol->query($sql);
            if($wynik->num_rows==1){
                $dod="UPDATE users SET haslo='$haslo' WHERE kod='$kod'";
                if(mysqli_query($pol, $dod)){
                    echo "hasło zostało zresetowane";
                    $upd="UPDATE users SET kod='0'";
                    $pol->query($upd);

                }
            }
            else{
                $_SESSION['blad']="podano zły kod";
                header("location: kod.php");
            }
        }

    ?>
</body>
</html>