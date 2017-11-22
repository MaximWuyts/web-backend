<?php 
$cursus         = false;
$voorbeelden 	= false;
$oplossingen 	= false;
$search 		= false;
if (isset($_GET['link'])) 
{
    switch($_GET['link'])
    {
        case 'cursus':
            $cursus 	= 	true;
            break;
        case 'voorbeelden':
            $voorbeelden 	= 	true;
            $map			=	'voorbeelden';
            $bestandenArray 	= 	getBestanden( $map );
            break;
        case 'oplossingen':
        
            $oplossingen 	=	true;
            $map			=	'oplossingen';
            $bestandenArray 	= 	getBestanden( $map );
            break;
    }
}

if ( isset ( $_GET['search-query'] ) ) 
{
    $search = true;

    $voorbeeldenBestanden = getBestanden( 'voorbeelden' );
    $oplossingenBestanden = getBestanden( 'oplossingen' );

    $alleBestanden	=	array_merge( $voorbeeldenBestanden, $oplossingenBestanden );

    $resultaten	=	array();
    $zoekString =	$_GET['search-query'];

    foreach ($alleBestanden as $bestand)
    {
        $zoekStringGevonden = strpos( $bestand, $zoekString );

        if ( $zoekStringGevonden !== false )
        {
            $resultaten[]	=	$bestand;
        }
    }
}
function showList ( $map )
{
    $bestandenArray = scandir ('../' . $map . '/');
    array_shift( $bestandenArray );
    array_shift( $bestandenArray );
    return $bestandenArray;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Herhalingsopdracht 1</title>

    <style>
			iframe
			{
				width:1000px;
				height:750px;
			}
	</style>

</head>
<body>

    <ul>
        <li><a href="oplossing-herhalingsopdracht-01-deel1.php?link=cursus">Cursus</a></li>
        <li><a href="oplossing-herhalingsopdracht-01-deel1.php?link=voorbeelden">Voorbeelden</a></li>
        <li><a href="oplossing-herhalingsopdracht-01-deel1.php?link=oplossingen">Oplossingen</a></li>
    </ul>
<form action="oplossing-herhalingsopdracht-01-deel1.php" method="GET">

<label id="search-query">Zoek naar:</label>
<input type="text" name="search-query" id="search-query">

<input type="submit">

</form>

<?php if ( $cursus ): ?>
<iframe src="../web-backend-inleiding.pdf"></iframe>
<?php endif ?>

<?php if ( $voorbeelden || $oplossingen ): ?>
<ul>
    <?php foreach ( $bestandenArray as $bestand ): ?>
        <li><a href="../<?php echo $map ?>/<?php echo $bestand ?>"><?php echo $bestand ?></a></li>
    <?php endforeach ?>
</ul>
<?php endif ?>

<?php if ( $search ): ?>
<ul>
    <?php foreach ( $bestandenArray as $bestand ): ?>
        <li><?php echo $bestand ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>


</body>
</html>