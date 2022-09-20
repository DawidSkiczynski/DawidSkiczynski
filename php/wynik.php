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

    $pol=new mysqli('localhost','root','','powtorzenie');
    $wynik=mysqli_query($pol,"SELECT * FROM users");
    while($row=mysqli_fetch_array($wynik)){
        echo $row['login']." ". $row['haslo'];
        echo "<br>";
    }

    ?>
</body>
</html>