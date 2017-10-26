<?php

$artikels = array(

            array(
            'titel' => 'Oostende schorst Franck Berrier om disciplinaire redenen',
            'paragraaf' => 'Franck Berrier komt voorlopig niet meer in actie voor KV Oostende. 
                            De kustploeg heeft de spelmaker voor onbepaalde tijd en met onmiddellijke ingang geschorst.',
            'afbeelding' => '763.jpg',
            'bafbeeldingbeschrijving' => 'franck berrier in actie',
            ),
            array(
            'titel' => '“Marsman” Dries Mertens opnieuw bedolven onder superlatieven: “Hij is van een buitenaards niveau”',
            'paragraaf' => 'Dries Mertens deed gisteren op de Italiaanse velden opnieuw monden openvallen.
                            Op bezoek bij Genoa (2-3-zege)
                            legde de nummer 14 van Napoli er nog maar eens twee in het mandje waardoor de superlatieven in Italië werden boven gehaald.' ,
            'afbeelding' => 'artikel2.jpg', 
            'afbeeldingbeschrijving' => 'dries mertens in actie',
            ),
            array(
                'titel' => 'Van de glorie in LA naar de bank bij Antwerp: zou Van Damme zich keuze voor ‘Great Old’ al beklagen?',
                'paragraaf'=>  'Jelle Van Damme zal zich zijn start bij Antwerp ongetwijfeld anders voorgesteld hebben.
                                De 34-jarige verdediger kon nog geen enkele basisstek veroveren en kwam in de clash tegen Club Brugge niet van de bank.
                                Het verschil is groot met zijn periode bij LA Galaxy:
                                enkele maanden geleden was hij nog een van de uitblinkers in de Verenigde Staten, waar hij als God in Frankrijk leefde. ',
                 'afbeelding' => 'artikel3.jpg',
                 'afbeeldingbeschrijving' => 'jelle van damme in actie',
            )

            );


$individueelArtikel		=	false;
$nietBestaandArtikel	=	false;


if ( isset ( $_GET['id'] ) )
{
    $id = $_GET['id'];

    // Controleren of de opgevraagde key (=id) bestaat in de array $artikels
    if ( array_key_exists( $id , $artikels ) )
    {
        $artikels 			= 	array( $artikels[$id] );
        $individueelArtikel	=	true;
    }
    else
    {
        $nietBestaandArtikel	=	true;
    }		
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht get</title>
    <style>
		body
		{
			font-family:"Segoe UI";
			color:#423f37;
		}

		.container
		{
			width:	1024px;
			margin:	0 auto;
		}

		img
		{
			max-width: 100%;
		}

		.multiple
		{
			float:left;
			width:288px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:#EEEEEE;
		}

		.multiple:nth-child(3n+1)
		{
			margin-left:0px;
		}

		.multiple:nth-child(3n)
		{
			margin-right:0px;
		}

		.single img
		{
			float:right;
			margin-left: 16px;
		}


	</style>
</head>

<body>
    <h1>De krant van vandaag</h1>
    

    <?php if ( !$nietBestaandArtikel ): ?>
    <div class="container">
        <?php foreach ( $artikels as $id => $artikel ): ?>
            <article class="<?php echo ( !$individueelArtikel ) ? 'multiple': 'single' ; ?>">
                <h1><?php echo $artikel['titel'] ?></h1>
                
                <img src="img/<?php echo $artikel['afbeelding'] ?>" alt="<?php echo $artikel['afbeeldingBeschrijving'] ?>">
                <p><?php echo ( !$individueelArtikel ) ? str_replace ( "\r\n", "</p><p>", substr( $artikel['paragraaf'], 0, 50 ) ) . '...': str_replace ( "\r\n", "</p><p>",$artikel['paragraaf'] ) ; ?></p>
                <?php if ( !$individueelArtikel ): ?>
                    <a href="oplossing-get-deel1.php?id=<?php echo $id ?>">Lees meer</a>
                <?php endif ?>
            </article>
        <?php endforeach ?>
    </div>
<?php else: ?>
    <p>Het artikel met id <?php echo $id ?> bestaat niet. Probeer een ander artikel.</p>
<?php endif ?>
</body>
</html>