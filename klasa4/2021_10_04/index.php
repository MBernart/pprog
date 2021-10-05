<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Średni wiek</title>
</head>

<body>

    <?php
    if (!isset($_POST['person']))
    {
        // echo <<< FORMCOUNTPERSON

    ?>
        <h3>Liczba osoób w rodzinie</h3>

        <form method="POST">
            <input type="number" name="person" placeholder="Podaj liczbę osób"></input><br> <br>
            <input type="submit" value="Zatwierdź">
        </form>
    <?php
        // FORMCOUNTPERSON;
    }
    ?>
    <?php
    if (!empty($_POST['person']))
    {
        echo "<h3>Liczba osób w rodzinie <i>$_POST[person]</i></h3>";

        echo "<form method=\"post\">";
        for ($i = 1; $i < $_POST["person"] + 1; $i++)
        {
            echo <<< FORMGETAGE
        <input type="number" name="personAge$i" placeholder="Podaj wiek osoby $i">
        <br><br>
FORMGETAGE;
        }
        echo "<input type=\"submit\" value=\"Zatwierdź\"><br><br>";
        echo "<button name=\"buttonAvg\">Oblicz średni wiek</button>";

        echo "</form>";
    }

    if (isset($_POST['buttonAvg']))
    {
        $sum = 0;
        $count = 0;
        echo "<br><pre>";
        print_r($_POST);
        echo "<br></pre>";
        foreach ($_POST as $key => $value)
        {
            if ($key != "buttonAvg")
            {
                $sum += $value;
                $count++;
            }
        }
        $avg = $sum / $count;
        echo "Średni wiek: " . number_format($avg, 2);
    }
    ?>
</body>

</html>