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
        if (!empty($_GET['name']) && !empty($_GET['nationality']) && !empty($_GET['age'])) {
            $name = ucwords(strtolower($_GET['name']));
            echo <<< L
            Imię: $name <br><br>
            Narodowość: $_GET[nationality]<br><br>
            Wiek $_GET[age]<br><br>
L;
        }
        else {
            echo "<br> Niepełne dane";
        }
    ?>
</body>
</html>