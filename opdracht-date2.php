<?php 

	
setlocale( 'LC_ALL', 'nld_nld' );
	
$timestamp	=	mktime( 22, 35, 25, 01, 21, 1904 );

$date	=	strftime('%d %B %Y, %H:%M:%S %p', $timestamp);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht date </title>
    </head>
    <body>

		<h1>opdracht date deel2</h1>

		<p><?=  $date ?></p>

    </body>
</html>