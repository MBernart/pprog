<html>
  <head>
    <title>Zmienne</title>
  </head>
  <body>
    <?php 
		echo '<p>Hello World</p>'; // Hello World
		echo '<p>Hello World</p>'; // Hello World
		$name = "Janusz";
		echo '<i>w apostrofach</i> <b>imię: $name</b><br>'; // w apostrofach imię: $name
		echo "<i>w cudzysłowie</i> <b>Imię: $name</b><br>"; // w cudzysłowie Imię: Janusz
		
		// systemy liczbowe - całkowite
		$liczba_binarna = 0b1011;
		echo "0b1011 = $liczba_binarna<br>"; // 0b1011 = 11
		$liczba_oktalna = 011;
		echo "011 = $liczba_oktalna<br>"; // 011 = 9
		$liczba_hexadecymalna = 0x11;
		echo "0x11 = $liczba_hexadecymalna<br>"; // 0x11 = 17

		// . - operator konkatenacj - łączy i wyświetla
		// , - operator interpolacji - wyświetla po kolei

		// typy zmiennoprzecinkowe
		$x = 10.5;
		echo gettype($x)."<br>"; // double
		
		// logiczne
		$prawda = true;
		$falsz = false;
		echo "prawda = $prawda <br>"; // prawda = 1
		echo "fałsz = $falsz <br>"; // fałsz =

		// skladnia heredoc
		echo <<< etykieta
			Imię: $name <br>
			Poznań <hr>
etykieta;
		
		// skladnia nowdoc - wyświetla literały
		echo <<< 'etykieta'
			Imię: $name <br>
			Poznań <hr>
etykieta;
		echo "Nazwa zmiennej z imieniem: \$name";

	 ?> 
  </body>
</html>