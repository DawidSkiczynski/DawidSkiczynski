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

        if($_SESSION['typ']=='admin'){
            echo "zalogowano na konto admina";
        }
        else if($_SESSION['typ']=='user'){
            $_SESSION['blad']="brak uprawnień";
            header("location: content.php");
        }

    ?>

</body>
</html>