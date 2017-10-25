<?php

	function berekenKapitaal( $dataArray )
	{
		
		if ( $dataArray[ 'teller' ] <= $dataArray[ 'looptijd' ] )
		{
			$renteBedrag			=		floor( $dataArray['kapitaal'] * ( $dataArray['renteProcent'] / 100 ) );
			$dataArray['kapitaal']	+=		$renteBedrag;
			$dataArray['historiek'][ $dataArray[ 'teller' ] ]	=		'Het nieuwe bedrag bedraagt ' . $dataArray['kapitaal'] . '€ (waarvan ' . $renteBedrag . '€ onze rente is)';

			++$dataArray[ 'teller' ];

			return berekenKapitaal( $dataArray );
		}
		else
		{
			return $dataArray;
		}
	}

	$startKapitaal 	=	100000;
	$renteVoet		=	8;
	$aantalJaar		=	10;

	$winstHans = berekenKapitaal( array( 'kapitaal' => $startKapitaal, 
											'renteProcent' => $renteVoet, 
											'looptijd' => $aantalJaar,
											'teller'	=> 1,
											'historiek'	=>	array() ) );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht functions recursive deel1</title>
</head>
<body>
    
       
	<ul>
        <?php foreach( $winstHans['historiek'] as $value): ?>
            <li><?php echo $value ?></li>
        <?php endforeach ?>
    </ul>

</body>
</html>