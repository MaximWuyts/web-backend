<?php 


$getallen = array();
$getallen2 = array();
$i = 0;

while($i < 100)
{
    $getallen[] = $i;
    ++$i;
}

$reeks = implode(', ',$getallen);

$j = 0;

while($j < 100)
{
    if($j % 3 == 0 && $j > 40 && $j < 80)
    {
        $getallen2[] = $j;
    }
    ++$j;
}

$reeks2 = implode(', ',$getallen2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<pre>
Reeks 1 --> <?php echo $reeks; ?>
</pre>
<pre>
Reeks 2 --> <?php echo $reeks2; ?>
</pre>

   
</body>
</html>