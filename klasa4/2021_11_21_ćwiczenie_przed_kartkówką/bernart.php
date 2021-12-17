<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,
        tr,
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        td {
            padding: 1em;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    require_once('skrypty/connection.php');
    if (isset($_GET['message']))
    {
        echo "<h3>$_GET[message]</h3>";
    }
    ?>
    <a href="bernart.php?studenci=">studenci</a> <br>
    <a href="bernart.php?dodaj_studenta">dodaj studenta</a>
    <br><br>
    <?php
    if (isset($_GET['studenci']))
    {
        $sql = "
            SELECT `studenci`.`id`, `imie`, `nazwisko`, `obywatelstwo`
            FROM `studenci`
            JOIN `obywatelstwo`
            ON `studenci`.`obywatelstwo_id` = `obywatelstwo`.`id`";
        $result = $connection->query($sql);
        echo $connection->error;
    ?>
        <table>
            <tr>
                <td>imię</td>
                <td>nazwisko</td>
                <td>obywatelstwo</td>
                <td>Usuwanie</td>
            </tr>

            <?php
            foreach ($result as $row)
            {
                echo <<< ROW
            <tr>
                <td>$row[imie]</td>
                <td>$row[nazwisko]</td>
                <td>$row[obywatelstwo]</td>
                <td><a href="skrypty/delete.php?id_studenta=$row[id]">Usuń</a></td>
            </tr>

ROW;
            }
            echo "</table>";
        }

        if (isset($_GET['dodaj_studenta']))
        {
            ?>
            <form method="POST" action="skrypty/insert.php">
                imie: <br>
                <input type="text" name="imie"> <br><br>
                nazwisko: <br>
                <input type="text" name="nazwisko" id=""> <br><br>
                obywatelstwo: <br>
                <select name="obywatelstwo_id" id="">
                    <?php
                    $sql = "SELECT * FROM `obywatelstwo`";
                    $result = $connection->query($sql);
                    foreach ($result as $row)
                    {
                        echo "<option value='$row[id]'>$row[obywatelstwo]</option>";
                    }
                    ?>

                </select> <br><br>
                <input type="submit">
            </form>

        <?php
        }
        ?>
</body>

</html>