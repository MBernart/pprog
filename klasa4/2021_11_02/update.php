<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php require_once("skrypty/connect.php");
    $sql = "SELECT `users`.`id`, `users`.`name` as `name`, `surname`, `cityid`, `birthday`, `height`, `cities`.`name` as `city`
    FROM `users`
    INNER JOIN `cities`
    ON `users`.`cityid` = `cities`.`id`
    WHERE `users`.`id` = $_GET[id]";
    $result = $connection->query($sql);
    $userdata = $result->fetch_assoc();
    echo <<< USERDATA
    <form action="skrypty/update.php" method="post">

    ID: <br>
    <input type="number" name="id" value=$userdata[id] readonly> <br><br>
    Imię: <br>
    <input type="text" name="name" value=$userdata[name]> <br><br>
    Nazwisko: <br>
    <input type="text" name="surname" value=$userdata[surname]> <br><br>
    Miasto: <br>
    <select name="cityid" id="">
USERDATA;
    ?>
    <?php
    $sql = 'SELECT * FROM cities';
    $cities = $connection->query($sql);

    foreach ($cities as $row)
    {
        $name = ucwords($row['name']);
        $id = $row['id'];
        $selected = '';
        if ($id == $userdata['cityid'])
        {
            $selected = 'selected';
        }
        echo $connection->error;
        echo "<option value='$id' $selected>$name</option>";
    }

    echo <<< USERDATA
    </select> <br><br>
    Data urodzenia: <br>
    <input type="date" name="birthday" id="" value=$userdata[birthday]> <br><br>
    Wzrost: <br>
    <input type="number" name="height" id="" value=$userdata[height]> <br><br> 
    <input type="submit">
    </form>
USERDATA;

    ?>
</body>

</html>