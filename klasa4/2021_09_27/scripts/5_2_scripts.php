<?php
print_r($_POST);
echo "<br>";
if (empty($_POST["name"])) {
?>
    <script>
        history.back();
    </script>
<?php
} else {
    $figure = $_POST['figure'];
    switch ($_POST['figure']) {
        case 'square':
            header("Location: square.php");
            exit();
            break;
        case 'rectangle':
            header("Location: rectangle.php");
            break;
        default:
            echo "I dont know this figure!";
            break;
    }
}
