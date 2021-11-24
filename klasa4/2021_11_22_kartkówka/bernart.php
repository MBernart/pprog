<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBernart</title>
    <style>
        table,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require_once('skrypty/connection.php') ?>
    <table>
        <tr>
            <td>id</td>
            <td>a</td>
            <td>b</td>
            <td>dzialanie</td>
            <td>wynik</td>
            <td>data_obliczenia</td>
            <td>Hiperłącze</td>
        </tr>
        <?php
        $sql = "SELECT * FROM `kalkulator`";
        $result = $connection->query($sql);
        foreach ($result as $row) {
            echo <<< TABELA
            <tr>
            <td>$row[id]</td>
            <td>$row[a]</td>
            <td>$row[b]</td>
            <td>$row[dzialanie]</td>
            <td>$row[wynik]</td>
            <td>$row[data_obliczenia]</td>
            <td><a href="bernart.php?form_id=$row[id]">Hiperłącze</a></td>
        </tr>
TABELA;
        }
        ?>
    </table>

    <?php 
        if(isset($_GET['form_id']) || isset($_GET['id_dzialania']))
        {
            if (!isset($_GET['form_id']))
            {
                $_GET['form_id'] = $_GET['id_dzialania'];
            }
            $sql = "SELECT * FROM `kalkulator` WHERE `id`='$_GET[form_id]'";
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            $sql_dzialanie = "SELECT DISTINCT `dzialanie` FROM `kalkulator`";
            $dzialania = $connection->query($sql_dzialanie)
            ?>
            <form action="#" method="GET">
                id: <br>
                <input type="number" name="id_dzialania" value="<?php echo $_GET['form_id']; ?>"> <br><br>
                a: <br>
                <input type="text" name="a" value="<?php echo $row['a']; ?>"> <br><br>
                b: <br>
                <input type="text" name="a" value="<?php echo $row['b']; ?>"> <br><br>
                operacja: <br>
                <select name="dzialanie">
                    <?php
                        foreach ($dzialania as $dzialanie) {
                            if ($row['dzialanie'] == $dzialanie['dzialanie'])
                            {
                            echo "<option value='$dzialanie[dzialanie]' selected>$dzialanie[dzialanie]</option>";
                            }
                            else 
                            {
                                echo "<option value='$dzialanie[dzialanie]'>$dzialanie[dzialanie]</option>";

                            }
                        }
                    ?>
                </select><br><br>
                <input type="submit" value="Równa się">
            </form>
            <?php
            if (isset($_GET['id_dzialania'])){
                echo "<h3>$row[a] $row[dzialanie] $row[b] = $row[wynik]</h3>";
            }
        }
    ?>
</body>

</html>