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
    <form method="get" action="zmiana_hasla_link.php">
    <label for="nowe">Podaj nowe haslo:</label>
    <input type="text" name="nowe"></br>
    <input type="submit" name="submit">
    </form>
    <?php
        $kodzik=$_GET['kod'];
        $_SESSION['kodzik']=$kodzik;

    ?>
</body>
</html>