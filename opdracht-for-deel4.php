<?php

	$maxTafels		=	10;
    $maxProduct		=	10;
    
	$tafels	=	array();

	for( $i = 0; $i <= $maxTafels; ++$i )
	{
		$producten	=	array();

		for( $j = 0; $j <= $maxTafels; ++$j )
		{
			$producten[]	=	$i * $j;
		}

		$tafels[ $i ]	=	$producten;

	}

?>
	

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Oplossing for: deel4</title>
		<style>
			
			.oneven
			{
				background-color	:	lightgreen;
			}

		</style>
    </head>
    <body>
		
		<h1>Oplossing for: deel4</h1>

		<table>
			
			<thead>
				<th>Tafel</th>

				<?php for ( $j = 0; $j <= $maxTafels; ++$j): ?>
					
					<th><?= $j ?></th>
					
				<?php endfor ?>
			</thead>

			<tbody>
			<?php foreach ($tafels as $tafel => $producten): ?>
				<tr>
					<td><?= $tafel ?></td>
					<?php foreach ($producten as $product ): ?>
						<td class="<?= ( $product % 2 > 0 ) ? 'oneven' : '' ?>"><?= $product ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
			</tbody>

		</table>

    </body>
</html>