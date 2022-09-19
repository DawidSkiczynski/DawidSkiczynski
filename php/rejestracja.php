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
<form method="post" action="zarejestruj.php">
<label for="login">login</label>
<input type="text" name="login"><br>
<label for="haslo">haslo</label>
<input type="password" name="haslo"><br>
<label for="haslo2">Powtórz hasło</label>
<input type="password" name="haslo2"><br>
<label for="email">email</label>
<input type="text" name="email"><br>
<label for="typ"> Typ konta:</label>
<label for="typ">Admin</label>
<input type="radio" name="typ" value="admin">
<label for="typ">User</label>
<input type="radio" name="typ" value="user"><br>
<input type="submit" name="submit">
</form>
</body>
</html>