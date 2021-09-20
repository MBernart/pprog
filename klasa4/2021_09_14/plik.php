<html>
  <head>
    <title>Porównania, dekrementacje i inkrementacje oraz pliki</title>
  </head>
  <body>
    <?php 
	
	echo PHP_VERSION,"<br>"; // wyświetlanie wersji
	
	echo 2**10,"<br>"; // potęgowanie

	$x = 1;
	$y = 15;
	echo $x<=>$y,"<hr>"; // lewa mniejsza => -1; równe => 0; lewa większa => 1
	


	# Równa vs identyczna

	$x = 1;
	$y = 1.0;
	echo "Dla liczb \$x = 1 oraz \$y = 1.0 <br>";
	// równe
	if ($x==$y)	{
		echo "Równe";
	}
	else	{
		echo "Różne";
	}
	echo "<br>";

	// identyczne
	if ($x===$y)	{
		echo "Identyczne";
	}
	else	{
		echo "Nieidentyczne";
	}
	echo "<hr>";
	$x = 1;
	echo $x,"<br>"; 	// 1
	$x = $x++;
	echo $x,"<br>"; 	// 1
	$x = ++$x;
	echo $x,"<br>"; 	// 2
	$y = ++$x;
	echo $x,"<br>"; 	// 3
	echo $y,"<br>"; 	// 3
	$y = $x++; 
	echo $x,"<br>";		// 4
	echo $y,"<hr>" 		// 3
	?>
  </body>
</html>