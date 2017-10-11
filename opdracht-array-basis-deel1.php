<?php

$dieren = array('kat','hond','tijger','koe','paard','luipaard','stinkdier','nijlpaard','egel','zebra');

$voertuigen =  array('landvoertuigen'  => array('vespa', 'fiets'),

'watervoertuig'   => array('surfplank', 'vlot'),

'luchtvoertuig'   => array('luchtballon','straaljager'),
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>arrays basis deel1</title>
</head>
<body>
    <h1>arrays basis deel1</h1>
    <ul>
    <li><pre><?php var_dump ( $dieren )  ?></pre></li>
	<li><pre><?php var_dump ( $voertuigen )  ?></pre></li>
    
    </ul>
</body>
</html>