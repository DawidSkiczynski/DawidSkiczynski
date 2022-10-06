<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image[]" multiple><br>
    <input type="submit" name="submit">
</form>
<style>
.img{
    width: 150px;
    height: 150px;
}
</style>
<?php

    if(isset($_POST['submit'])){
        $tmp_name=$_FILES['image']['tmp_name'];
        $name=$_FILES['image']['name'];
        foreach($name as $i=>$w){
            $txt=['jpg','png'.'jpeg','gif'];
            $tab=explode('.',$name[$i]);
            $zlytyp=end($tab);
            $typ=strtolower($zlytyp);
            if(in_array($typ,$txt)){
                $original="img/$name[$i]";
                $small=imagecreatetruecolor(640,480);
                $source=imagecreatefromjpeg($original);
                $size=getimagesize($original);
                imagecopyresized($small,$source,0,0,0,0,640,480,$size[0],$size[1]);
                imagejpeg($small,"img/$name[$i]");
                //move_uploaded_file($tmp_name[$i], "img/$name[$i]");
                echo "<img src=img/$name[$i]>";
            }
            else{
                echo "błąd";
            }
        }
    }

?>
</body>
</html>