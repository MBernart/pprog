<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Użytkownicy</title>
</head>

<body>
    <?php
    $connection = new mysqli('localhost', 'root', '', 'pprog_lekcja');
    $sql = "SELECT * FROM `users`";
    $result = $connection->query($sql);
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    // $rows = $result->fetch_assoc();
    echo "<pre>";
    foreach ($result as $row)
    {
        if ($row['height'] === NULL)
        {
            $row['height'] = '-';
        }
        echo <<< ROW
    >>  Id: $row[id]
        Imię: $row[name]
        Nazwisko: $row[surname]
        Wzrost: $row[height]
        <hr>
ROW;
        echo "<br><br>";
    }
    echo "</pre>";
    ?>
</body>

</html>