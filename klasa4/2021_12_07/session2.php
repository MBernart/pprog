<?php
session_start();
echo "Login is <i>" . $_SESSION['login'] . '</i></br>';
unset($_SESSION['login']);
// usuwa wszystkie zmienne sesyjne
session_destroy();
?>

<a href="session.php">link do pierwszej</a>