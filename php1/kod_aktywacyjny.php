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
        }
    ?>
    <br>
    <form method="post" action="poprawny kod.php">
    <label for="aktywacja">Podaj kod:</label>
    <input type="text" name="aktywacja"><br>
    <input type="submit" name="submit">
    </form>

</body>
</html>