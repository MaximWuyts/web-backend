<?php
$jaartal = 1995;

if(( ( $jaartal % 4 == 0 ) && ( $jaartal % 100 != 0 ) ) || ( $jaartal % 400 == 0 )){
    $jaar = 'het is een schrikkeljaar';
}


else{
    $jaar = 'het is geen schrikkeljaar';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht conditionals statements if else deel1</title>
</head>
<body>
    <h1>opdracht conditionals statements if else deel1</h1>
    <p>--> <?php echo $jaar ?></p>
</body>
</html>