<?php 

$htmlString =   '<html><head><title>Dit is een test</title></head><body>Tekst</body></html>';

$voorbeeldArray    =   array(  'Cola' => 'Zero', 
                        'Sprite' => 'Lemon' );


function drukArrayAf( $array )
{

    $dataArray  =   array();

    end( $GLOBALS );
    $naamArray = key( $GLOBALS );

    foreach ( $array as $key => $value)
    {
        $dataArray[]    =   $naamArray . '[' . $key . '] heeft waarde ' . $value;
    }

    return $dataArray;
}

$resultaat  =   drukArrayAf( $voorbeeldArray );



function validateHtmlTag( $html )
{
    $openingTag =   '<html>';
    $closingTag =   '</html>';

    $isValid    =   FALSE;

    if ( strpos( $html, $openingTag ) === 0 )
    {
        $estimatedClosingHTMLTAGPosition = strlen( $html ) - strlen( $closingTag );

        if ( stripos( $html, $closingTag ) == $estimatedClosingHTMLTAGPosition )
        {
            $isValid    =   TRUE;
        }
    }

    return $isValid;
}

$validHTML  =   validateHtmlTag( $htmlString );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht funtions array deel2</title>
</head>
<body>
    

        <h2>Array afdrukken</h2>
        <ul>
            <?php foreach ( $resultaat as $value ): ?>
                <li><?= $value ?></li>
            <?php endforeach ?>
        </ul>

        <h2>HTML valideren</h2>
        <p>De string <code><?= htmlentities( $htmlString ) ?></code> is <?= ( $validHTML ) ? 'wel' : 'niet' ?> geldig.</p>
        

</body>
</html>