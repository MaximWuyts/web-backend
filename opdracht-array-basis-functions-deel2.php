<?php
$dieren = array('hond','kat','luipaard','egel','vis','spin');


sort($dieren);

$zoogdieren  = array('dolfijn','aap','mens');
$dierenLijst = array_merge($dieren,$zoogdieren);
$aantal = count($dierenLijst);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht array functions deel1</title>
</head>
<body>
    <h1>opdracht array functions deel1</h1>
    <?php echo ' elementen in de complete array --> ' . $aantal ?>
    <p><pre><?php echo var_dump($dierenLijst) ?></pre></p>
</body>
</html>