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
        $haslo2=$_POST['haslo2'];
        $email=$_POST['email'];
        $typ=$_POST['typ'];
        $pol=new mysqli('localhost','root','','test');
        $login=trim($login);
        $haslo=trim($haslo);
        $haslo2=trim($haslo2);
        $email=trim($email);
        $login=$pol->real_escape_string($login);
        $haslo=$pol->real_escape_string($haslo);
        $haslo2=$pol->real_escape_string($haslo2);
        $email=$pol->real_escape_string($email);
        $sql="SELECT * FROM users WHERE login='$login' AND email='$email'";
        $wynik=$pol->query($sql);
        if($wynik->num_rows==0){

        
            if($haslo==$haslo2){
                    $haslo=password_hash($haslo, PASSWORD_DEFAULT);
                    $dod="INSERT INTO users (login, haslo, email, typ) VALUES ('$login','$haslo','$email','$typ')";
                    if(mysqli_query($pol, $dod)){
                    echo "dodano konto";
                }
            }
             else{
                $_SESSION['blad']="hasła się nie zgadzają";
                header('location: rejestracja.php');
            }
        }
        else{
            $_SESSION['blad']="konto już istnieje";
            header('location: rejestracja.php');
        }
    }
    else{
        $_SESSION['blad']="prześlij formularz";
        header('location: rejestracja.php');
    }

    
    $pol->close();
    ?>

</body>
</html>