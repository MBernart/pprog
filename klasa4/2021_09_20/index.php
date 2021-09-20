<!DOCTYPE html>
<html lang="pl" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formularze</title>
</head>

<body>
	<h3>Dane uzytkownika</h3>
	<form>
		<input type="text" name="name" placeholder="Imię"> <br><br>
		<input type="text" name="surname" placeholder="Nazwisko"> <br><br>
		<input type="submit" value="Wypełnij dane">
	</form>
	<?php
	echo "<br>";
	if (isset($_GET['name']) && !empty($_GET['surname']))
	{	
		// echo $_GET['name']," ",$_GET['surname'];
		echo <<< L
		Imię i nazwisko: $_GET[name] $_GET[surname]
L;
	}
	else
	{
		echo "Wypełnij dane";
	}
	?>
</body>
</html>