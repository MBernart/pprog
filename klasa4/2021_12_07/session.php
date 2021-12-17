<?php
session_start();
echo "<h2>Strona druga</h2>";
if (isset($_SESSION['login']))
{
    echo "$_SESSION[login] <br>";
}
else
{
    echo "loginu nie zdefiniowano <br>";
}
$_SESSION['login'] = 'test_login';

?>
<a href="session2.php">druga</a>