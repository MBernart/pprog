<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Podaj imię"> <br><br>
        <input type="text" name="surname" placeholder="Podaj nazwisko"> <br><br>
        <input type="number" name="length" id=""> <br><br>
        <input type="submit" value="Zatwierdź" name="button">
    </form>
    <?php
    if (isset($_POST['button']))
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        require "scripts/functions.php";
        if (isset($_POST['name']) && isset($_POST['surname']) && (isset($_POST['length'])))
        {
            echo NameFormatter($_POST['name'] . " " . $_POST['surname'], $_POST['length']);
        }
    }
    ?>
</body>

</html>