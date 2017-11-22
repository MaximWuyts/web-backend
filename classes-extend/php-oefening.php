<?php
	
	function __autoload( $className )
	{
		require_once( $className . '-class.php' );
	}

	// ANIMAL CLASS
	$kat	=	new Animal('Dumbo', 'male', 60);
	$hond	=	new Animal('Pluto', 'male', 100);
	
	
	$kat->changeHealth(-10);

	$dolfijn	=	new Animal('Fizz', 'female', 90);

	// LION CLASS (extends ANIMAL)
	$leeuw1 	= 	new Lion('Simba', 'male', 100, 'Witte leeuw');
	$leeuw2 	= 	new Lion('Jul', 'female', 50, 'Grijze leeuw');

	// ZEBRA CLASS (extends ANIMAL)
	$zebra1 = new Zebra('Donkey', 'male', 120, 'Witte zebra');
	$zebra2 = new Zebra('Debsie', 'female', 10, 'Zwarte zebra');

	
?>


<!DOCTYPE html>
<html>
<head>
	<title>opdracht classes extend</title>
</head>
	<body>
	

		<h1>opdracht classes extend</h1>
		
		
		<p><?php echo $hond->getName() ?> is van het geslacht <?php echo $hond->getSex() ?> en heeft momenteel <?php echo $hond->getHealth() ?> levenspunten</p>

		<p><?php echo $kat->getName() ?> is van het geslacht <?php echo $kat->getSex() ?> en heeft momenteel <?php echo $kat->getHealth() ?> levenspunten</p>

		<p><?php echo $dolfijn->getName() ?> is van het geslacht <?php echo $dolfijn->getSex() ?> en heeft momenteel <?php echo $dolfijn->getHealth() ?> levenspunten</p>


	<h1>Specifieke dierenklassen die gebaseerd zijn op de Animal klasse</h1>

	<h2>Leeuwen</h2>

		<p>tijger1's (soort: <?php echo $leeuw1->getSpecies() ?>) special move: <?php echo $leeuw1->doSpecialMove() ?></p>
		<p>Scar's (soort: <?php echo $leeuw2->getSpecies()  ?>) special move: <?php echo $leeuw2->doSpecialMove() ?></p>


	<h2>Zebras</h2>

		<p>Zekes's (soort: <?php echo $zebra1->getSpecies() ?>) special move: <?php echo $zebra1->doSpecialMove() ?></p>
		<p>Zekes's (soort: <?php echo $zebra2->getSpecies()  ?>) special move: <?php echo $zebra2->doSpecialMove() ?></p>


	</body>
</html>