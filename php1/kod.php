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

        if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];
            unset($_SESSION['blad']);

        }

    ?>
    <form method="post" action="reset_hasla.php">
    <label for="kod">podaj kod:</label>
    <input type="text" name="kod"><br>
    <label for="haslo">Podaj nowe hasło:</label>
    <input type="text" name="haslo"><br>
    <input type="submit" name="submit">
    </form>
</body>
</html>