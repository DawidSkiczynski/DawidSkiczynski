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
            echo "<p>{$_SESSION['blad']}</p>";
            unset($_SESSION['blad']);
        }
    ?>
    <form method="post" action="logowanie.php">
        <label for="login">login</label>
        <input type="text" name="login"><br>
        <label for="haslo">haslo</label>
        <input type="password" name=haslo><br>
        <input type="submit" name="submit"><br>
        <a href=przypomnij.php>Przypomnij hasło za pomocą kodu</a><br>
        <a href=link.php>Przypomnij hasło za pomocą linku</a>
</body>
</html>