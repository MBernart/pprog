<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Użytkownicy</title>
    <style>
        table,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 1.5rem;
        }

        td {
            padding: 1.2em;
        }
    </style>
</head>

<body>
    <?php
    require_once("skrypty/connect.php");
    $sql = "SELECT * FROM `users`";
    $result = $connection->query($sql);
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    // $rows = $result->fetch_assoc();
    // echo "<pre>";
    if (isset($_GET['deletedUser']))
    {
        echo "<strong><p style='font-size: 2em'>Poprawnie usunięto 
        użytkownika z ID=$_GET[deletedUser]</p></strong>";
        echo '<br>';
    }
    elseif (isset($_GET['addedUser']))
    {
        echo "<strong><p style='font-size: 2em'>Poprawnie Dodano 
        użytkownika: $_GET[addedUser]</p></strong>";
        echo '<br>';
    }
    echo "<main style='display: flex;'>";

    echo "<table style='margin-right: 20px'>";
    foreach ($result as $row)
    {
        echo "<tr>";
        if ($row['height'] === NULL)
        {
            $row['height'] = '-';
        }
        echo <<< ROW
        
        <td>Id: $row[id]</td>
        <td>Imię: $row[name]</td>
        <td>Nazwisko: $row[surname]</td>
        <td>Wzrost: $row[height]</td>
        <td><a href="skrypty/delete.php?id=$row[id]">Usuń</a></td>
ROW;
        echo '</tr>';
    }
    echo "</table>";
    ?>
    <br><br>
    <form action="skrypty/insert.php" method="post">
        <table>
            <tr>
                <th colspan="2">Dodawanie użytkownika</th>
            </tr>
            <tr>
                <td> Podaj imię: </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>
                    Podaj nazwisko: </td>
                <td><input type="text" name="surname"> <br><br></td>
            </tr>
            <tr>
                <td>
                    Data urodzenia:</td>
                <td><input type="date" name="birthday">
                </td>
            </tr>
            <tr>
                <td>
                    Wzrost:</td>
                <td><input type="number" name="height" min="100" max="300">
                </td>
            </tr>
            <tr style="justify-content: center;">
                <td colspan="2">
                    <input type="submit" value="Dodaj">
                </td>
            </tr>
        </table>
    </form>
    </main>
</body>

</html>