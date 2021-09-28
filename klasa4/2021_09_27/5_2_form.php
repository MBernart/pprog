<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figury geometryczne</title>
</head>

<body>
    <h3>Figury Geometryczne</h3>
    <?php
    if (!empty($_POST['error'])) {
        echo $_POST['error'];
    }
    ?>
    <form action="scripts/5_2_scripts.php" method="post">
        <input type="text" name="name" id="name" placeholder="Podaj imię"> <br>
        <input type="radio" name="figure" value="square" checked> Kwadrat <br>
        <input type="radio" name="figure" value="rectangle"> Prostokąt <br> <br>
        <input type="submit" value="Wybierz figurę">
    </form>
</body>

</html>