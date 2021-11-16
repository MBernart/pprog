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
            /* font-size: rem; */
        }

        td {
            padding: 1.2em;
        }
    </style>
</head>

<body>
    <?php
    require_once("skrypty/connect.php");
    $sql = "SELECT `users`.`id`, `users`.`name` as `name`, `surname`, `birthday`, `height`, `cities`.`name` as `city`
    FROM `users`
    INNER JOIN `cities`
    ON `users`.`cityid` = `cities`.`id`
    ";
    $result = $connection->query($sql);

    // $result->error_log;
    echo $connection->error;
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
    echo <<< HEAD
        <td style="text-align: center;">Id</td>
        <td style="text-align: center;">Imię</td>
        <td style="text-align: center;">Nazwisko</td>
        <td style="text-align: center;">Miasto</td>
        <td style="text-align: center;">Data urodzenia</td>
        <td style="text-align: center;">Wzrost</th>
        <td style="text-align: center;">USUWAŃSKO</td>
        <td style="text-align: center;">EDYCJA</td>

HEAD;
    foreach ($result as $row)
    {
        echo "<tr>";
        if ($row['height'] === NULL)
        {
            $row['height'] = '-';
        }
        $city = ucwords($row['city']);
        echo <<< ROW
        
        <td style="text-align: center;">$row[id]</td>
        <td style="text-align: center;">$row[name]</td>
        <td style="text-align: center;">$row[surname]</td>
        <td style="text-align: center;">$city</td>
        <td style="text-align: center;">$row[birthday]</td>
        <td style="text-align: center;">$row[height]</td>
        <td style="text-align: center;"><a href="skrypty/delete.php?id=$row[id]" style="color: Purple;   text-decoration: none;"><strong>Usuń<strong></a></td>
        <td style="text-align: center;"><a href="update.php?id=$row[id]" style="color: Purple;   text-decoration: none;"><strong>Aktualizuj<strong></a></td>
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
                    Miasto:
                </td>
                <td>
                    <!-- <input type="number" name="cityid"> -->
                    <!-- select -->
                    <select name="cityid" id="">
                        <?php
                        $sql = 'SELECT * FROM cities';
                        $result = $connection->query($sql);

                        foreach ($result as $row)
                        {
                            $name = ucwords($row['name']);
                            $id = $row['id'];
                            echo <<< CITY
                    <option value="$id">$name</option>
CITY;
                        }
                        ?>
                    </select>
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
                    <p style="color: red;">
                        <?php
                        if (isset($_GET['error']))
                        {
                            echo "<strong>$_GET[error]</strong>";
                        }
                        ?>
                    </p>
                </td>
            </tr>
        </table>
    </form>
    </main>
</body>

</html>