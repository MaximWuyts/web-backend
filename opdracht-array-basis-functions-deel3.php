<?php
$getallen = array(8, 7, 8, 7, 3, 2, 1, 2, 4);

$nieuweGetallen = array_unique($getallen);
rsort($nieuweGetallen);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht array functions deel3</title>
</head>
<body>
    <h1>opdracht array functions deel3</h1>
    <pre><li>oude getallen --> <?php echo var_dump($getallen) ?></li></pre>
    <pre><li>Nieuwe getallen --><?php echo var_dump($nieuweGetallen) ?></li></pre>
</body>
</html>