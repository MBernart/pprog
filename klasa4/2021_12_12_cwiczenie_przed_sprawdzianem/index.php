<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
            display: flex;
            width: 100vw;
            justify-content: space-around
        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 1em;
        }
    </style>
</head>

<body>
    <?php
    $connection = new mysqli('localhost', 'root', '', 'pprog_2021_12_12');
    ?>
    <header>
        <a href="?jedzenie">
            <h1>Jedzenie</h1>
        </a>
        <a href="?usun">
            <h1>Usun</h1>
        </a>
    </header>

    <?php
    if (isset($_GET['delete_id']))
    {
        $sql = "DELETE FROM `rodzaj` WHERE `id_rodzaj` = $_GET[delete_id]";
        $connection->query($sql) or die();
        echo "<h3>Poprawnie usunięto rodzaj o id = $_GET[delete_id] </h3>";
    }

    ?>
    <?php
    if (isset($_GET['update']))
    {
        $sql = "UPDATE `jedzenie` SET `nazwa`='$_POST[nazwa]',`id_rodzaj`='$_POST[id_rodzaj]'
                 WHERE `id` = $_POST[id]";
        $connection->query($sql) or die();
        echo "<h3>Poprawnie zaktualizowano jedzenie o id = $_POST[id] </h3>";
    }

    ?>
    <?php
    if (isset($_GET['jedzenie']))
    {
        $sql = "SELECT `id`, `nazwa`, `rodzaj`, `data_utworzenia`
                FROM `jedzenie` 
                JOIN `rodzaj` ON `jedzenie`.`id_rodzaj` = `rodzaj`.`id_rodzaj`";
        $result = $connection->query($sql);
    ?>
        <table>
            <tr>
                <th>ID</th>
                <th>nazwa</th>
                <th>rodzaj</th>
                <th>data utworzenia</th>
                <th>update</th>
            </tr>
            <?php foreach ($result as $row)
            {
            ?>
                <tr>
                    <td><?php print $row['id'] ?></td>
                    <td><?php print $row['nazwa'] ?></td>
                    <td><?php print $row['rodzaj'] ?></td>
                    <td><?php print $row['data_utworzenia'] ?></td>
                    <td><a href="?update_id=<?php echo $row['id'] ?>">Aktualizuj</a></td>
                </tr>
        <?php
            }
            echo "</table>";
        }
        ?>

        <?php
        if (isset($_GET['usun']))
        {
            $sql = "SELECT `id_rodzaj`, `rodzaj` FROM `rodzaj`";
            $result = $connection->query($sql);
        ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>rodzaj</th>
                    <th>delete</th>
                </tr>
                <?php foreach ($result as $row)
                {
                ?>
                    <tr>
                        <td><?php print $row['id_rodzaj'] ?></td>
                        <td><?php print $row['rodzaj'] ?></td>
                        <td><a href="?delete_id= <?php print $row['id_rodzaj'] ?>">Usun</a></td>
                    </tr>
            <?php
                }
                echo "</table>";
            }
            ?>
            <?php
            if (isset($_GET['update_id']))
            {
                $sql = "SELECT `id`, `nazwa`, `jedzenie`.`id_rodzaj`, `rodzaj`, `data_utworzenia`
                FROM `jedzenie` 
                JOIN `rodzaj` ON `jedzenie`.`id_rodzaj` = `rodzaj`.`id_rodzaj`
                WHERE `id` = $_GET[update_id]";
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();
            ?>

                <form action="?jedzenie&update" method="post">
                    ID: <br>
                    <input type="number" name="id" value="<?php print $row['id'] ?>"><br><br>
                    nazwa: <br>
                    <input type="text" name="nazwa" value="<?php print $row['nazwa'] ?>"><br><br>
                    rodzaj: <br>
                    <select name="id_rodzaj">
                        <?php
                        $sql = "SELECT * FROM `rodzaj`";
                        $rodzaje = $connection->query($sql);
                        foreach ($rodzaje as $rodzaj)
                        {
                            if ($rodzaj['id_rodzaj'] == $row['id_rodzaj'])
                            {
                        ?>
                                <option value="<?php print $rodzaj['id_rodzaj']; ?>" selected><?php echo $rodzaj['rodzaj']; ?></option>
                            <?php
                            }
                            else
                            {
                            ?>
                                <option value="<?php print $rodzaj['id_rodzaj']; ?>"><?php echo $rodzaj['rodzaj']; ?></option>

                        <?php
                            }
                        }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Wyślij">
                </form>
            <?php

            }

            ?>


</body>

</html>