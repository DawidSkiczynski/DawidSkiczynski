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
            $kod=$_POST['aktywacja'];
            $sql="SELECT * FROM users WHERE kod='$kod'";
            $pol=new mysqli('localhost','root','','test');
            $wynik=$pol->query($sql);
            if($wynik->num_rows==1){
                $dod="UPDATE users SET aktywne='tak' WHERE kod='$kod'";
                $dod1="UPDATE users SET kod='0' WHERE kod='$kod'";
                $pol->query($dod);
                $pol->query($dod1);
                echo "konto zostało aktywowane";
            }
            else{
                $_SESSION['blad']="zły kod";
                header("location: kod_aktywacyjny.php");
            }
        }

    ?>
</body>
</html>