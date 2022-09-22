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


            $kodzik=$_SESSION['kodzik'];
            $nowe=$_GET['nowe'];
            $pol=new mysqli('localhost','root','','test');
            $sql="SELECT * FROM users WHERE kod='$kodzik'";
            $wynik=$pol->query($sql);
                if($wynik->num_rows==1){
                $dod="UPDATE users SET haslo='$nowe' WHERE kod='$kodzik'";
                $pol->query($dod);
                $dod1="UPDATE users SET kod='0'";
                $pol->query($dod1);
            }
            else{
                echo "nie poprawny kod";
            }


    ?>

</body>
</html>