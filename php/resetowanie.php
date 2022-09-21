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
            require_once('polacz.php');
            $login=$_POST['login'];
            $pol=new mysqli('localhost','root','','test');
            $login=trim($pol->real_escape_string($login));
            $random=rand(10,10000);
            $sql="SELECT * FROM users WHERE login='$login'";
            $wynik=$pol->query($sql);
            if($wynik->num_rows==1){
                $dod="UPDATE users SET kod='$random' WHERE login='$login'";
                if(mysqli_query($pol, $dod)){
                    echo "dodano kod";
                    if(mail("informatyk4ai4@wp.pl","reset hasła","Twój kod resetu to: $random")){
                        echo "udało się";
                    }
                    else{
                        echo "nie udało się";
                    }
                }
            }
            else{
                echo "źle";
            }
        }
        else{
            echo "błąd";
        }

    ?>
</body>
</html>