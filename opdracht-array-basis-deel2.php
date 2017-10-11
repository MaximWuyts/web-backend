<?php

$getallen            = array(1,2,3,4,5);

$vermenigvuldiging   =  array_product($getallen);

$getallenReverse     =  array_reverse($getallen);


$oneven;

foreach ($getallen as $item)
{
    if ( $item % 2 != 0 )
    {
       $oneven[]   =   $item;
    }
}

$somArray =  array();

   foreach( $getallen as $key => $getal )
   {
      $getal1  =  $getal;
      $getal2  =  $getallenReverse[ $key ];

      $somArray[] =  $getal1  + $getal2;
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>arrays basis deel2</title>
</head>
<body>
<h1>arrays basis deel2</h1>

      <p>Array 1</p>

      <ul>
         <?php foreach ($getallen as $key => $item): ?>
            <li>[<?= $key ?>]: <?= $item ?></li>
         <?php endforeach ?>
      </ul>

      <p>Array 2 (reverse)</p>

      <ul>
         <?php foreach ($getallenReverse as $key => $item): ?>
            <li>[<?= $key ?>]: <?= $item ?></li>
         <?php endforeach ?>
      </ul>

      <p>Product van de getallen uit array 1: <?= $vermenigvuldiging ?></p>

      <p>De oneven getallen: </p>
      <ul>
          <?php foreach ($oneven as $key => $item): ?>
            <li>[<?= $key ?>]: <?= $item ?></li>
         <?php endforeach ?>
      </ul>

      <p>De getallen van beide arrays met elkaar opgeteld: </p>
      <ul>
          <?php foreach ($somArray as $key => $item): ?>
            <li>Som van values met key [<?= $key ?>]: <?= $item ?></li>
         <?php endforeach ?>
      </ul>
</body>
</html>