<!DOCTYPE html>
<html lang="en" dir="ltr"> <!-- dir="ltr" => plik zapisujemy od lewej do prawej -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h3>Pocztek strony</h3>
	<?php
		include "plik_z_zawartoscia.php"; // załatuje plik, a jak go nie będzie => warning => pójdzie dalej
		
		require "plik_z_zawartoscia.php"; // załaduje plik, a jak go nie będzie to spadnie z rowerka => fatal error => dalszy kod się nie wykona
		
		// nie załaduje pliku
		require_once "plik_z_zawartoscia.php"; // require_once nie wykona się, gdy został wcześniej załdowany za pomocą zwykłego require

		// załaduje się
		require "plik_z_zawartoscia.php";

		echo __FILE__,"<br>"; // wyświetla dokładną ścieżkę, w której znajduje się plik`
	?>
	<h3>Koniec strony</h3>
</body>

</html>