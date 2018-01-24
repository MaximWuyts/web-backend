<?php
    
$message = false;
try{
    
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root','');
    //Verbinding maken met database
    
    $brouwerQueryString = 'SELECT brnaam, brouwernr FROM brouwers';
    
    $brouwersStatement = $db->prepare($brouwerQueryString);
    $brouwersStatement->execute();
    
    
    $message['text'] = 'De connectie is gelukt.';
    
    
    $brouwers = array();
    
    while($row = $brouwersStatement->fetch(PDO::FETCH_ASSOC)){
        $brouwers[] = $row;
    }
    
    
    if(isset($_GET['brouwernr'])){
        $geselecteerdeBrouwer = $_GET['brouwernr'];
        
        $bierenQueryString = 'SELECT bieren.naam
                                FROM bieren 
                                WHERE bieren.brouwernr = :brouwernr';
        $bierenStatement = $db->prepare($bierenQueryString);
        
        $bierenStatement->bindValue(':brouwernr', $_GET['brouwernr']);
    }
    else{
        $bierenQueryString = 'SELECT bieren.naam
                                FROM bieren';
        $bierenStatement = $db->prepare($bierenQueryString);
    }
    $bierenStatement->execute();
    
    $bierenHeader = array();
    $bierenHeader[] = 'Aantal';
    
     for ($columnNumber = 0; $columnNumber  < $bierenStatement->columnCount( );  ++$columnNumber) 
    { 
        $bierenHeader[] = $bierenStatement->getColumnMeta( $columnNumber )['name'];
    }
    $bieren = array();
    
    while($row = $bierenStatement->fetch(PDO::FETCH_ASSOC)){
        $bieren[]= $row['naam'];
    }
}
catch (PDOException $e){
    $message['type'] = 'error';
    $message['text'] = 'De connectie is niet gelukt. ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}
			.success
			{
				background-color:lightgreen;
			}
			.error
			{
				background-color:red;
			}
			.even
			{
				background-color:lightgrey;
			}
		</style>
</head>
<body>
    <p><?php echo $message['text'] ?></p>
    
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
		
		<select name="brouwernr">
			<?php foreach ($brouwers as $key => $brouwer): ?>
				<option value="<?= $brouwer['brouwernr'] ?>" <?= ( $geselecteerdeBrouwer == $brouwer['brouwernr'] ) ? 'selected' : '' ?>><?= $brouwer['brnaam'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Geef mij alle bieren van deze brouwerij">
	</form>
	

	<table>
		
		

		<thead>
			<tr>
				<?php foreach ($bierenHeader as $columnName): ?>
					<th><?= $columnName ?></th>
				<?php endforeach ?>
			</tr>
		</thead>

		<tbody>
		
			<?php foreach ($bieren as $key => $biernaam): ?>
				<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
					<td><?= ( $key + 1 ) ?></td>
					<td><?= $biernaam ?></td>
				</tr>
			<?php endforeach ?>

		</tbody>

	</table>
</body>
</html>