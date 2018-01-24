<?php
    
$message = false;
$deleteConfirm = false;
$deleteId =	false;
$brouwersEdit = false;
try{
    
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root','');
    //Verbinding maken met database
    
    if ( isset( $_POST[ 'confirm-delete' ] ) )
		{
			$deleteConfirm	=	true;
			$deleteId		=	$_POST[ 'confirm-delete' ];
		}
    
    if(isset($_POST['confirm-edit'])){
        $brouwersEdit = query($db, 'SELECT * FROM brouwers WHERE brouwernr = :browernr', array(':brouwernr' => $_POST{'confirm-edit'}));
    }
        
    
    if(isset($_POST['edit'])){
        $updateQuery = 'UPDATE brouwers
									SET brnaam 			=	:brnaam,
											adres		=	:adres,
											postcode	=	:postcode,
											gemeente	=	:gemeente,
											omzet		=	:omzet
									WHERE brouwernr	= :brouwernr
									LIMIT 1';
        
        $statement = $db->prepare($updateQuery);
        $statement->bindValue(":brouwernr", $_POST['brouwernr']);
        $statement->bindValue(":brnaam", $_POST[ 'brnaam']);	
        $statement->bindValue(":adres", $_POST['adres']);	
        $statement->bindValue(":postcode", $_POST['postcode']);
        $statement->bindValue(":gemeente", $_POST['gemeente']);	
        $statement->bindValue(":omzet", $_POST['omzet']);
        
        $updateSuccessful = $statement->execute();
        if($updateSuccessful){
            $message['type'] = 'success';
            $message['text'] = 'Update op de brouwer '. $_POST['brnaam'] . 'is succesvol uitgevoerd.';
        }
        else{
            $message['type'] = 'error';
            $message['text'] = 'Update op de brouwer '. $_POST['brnaam'] . 'kon niet worden uitgevoerd.';
        }
    }
    if(isset($_POST['delete'])){
        
        $deleteQuery = 'DELETE FROM brouwers
									WHERE brouwernr = :brouwernr';
        
        $deleteStatement = $db->prepare($deleteQuery);
        $deleteStatement->bindValue(':brouwernr', $_POST['delete']);
        $isDeleted = $deleteStatement->execute();
        
        if($isDeleted){
            $message['type'] = 'success';
            $message['text'] = 'De record is succesvol verwijderd.';
        }
        else{
            $message['type'] = 'error';
            $message['text'] = 'De record kon niet verwijderd worden. Reden: ' . $deleteStatement->errorInfo()[2];
        }
    }
    $brouwersQuery = 'SELECT * FROM brouwers';
    $brouwersStatement = $db->prepare($brouwersQuery);
    $brouwersStatement->execute();
    $brouwersFieldnames = $brouwersQuery['fieldnames'];
    $brouwers = $brouwersQuery['data'];
}
    
    catch( PDOException $e ){
        $message['type']	=	'error';
		$message['text']	=	'De connectie is niet gelukt.';
	}
    
    function query($db, $query, $tokens = false){
        $statement = $db->prepare($query);
        
        if ( $tokens )
		{
			foreach ( $tokens as $token => $tokenValue )
			{
				$statement->bindValue( $token, $tokenValue );
			}
		}
        $statement->execute();
        
        $fieldnames = array();
        
        for($fieldNumber = 0; $fieldNumber < $brouwersStatement->columnCount(); ++$fieldNumber){
        $brouwersFieldnames[] = $brouwersStatement->getColumnMeta($fieldNumber)['name'];
            
        $data = array();
    
    
    
        while($row = $brouwersStatement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
        }
            
        $returnArray['fieldnames'] = $fieldnames;
        $returnArray['data'] = $data;
        
        return $returnArray;
}
        
        
        
    }
    
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
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
			.delete-button
			{
				background-color	:	transparent;
				border				:	none;
				padding				:	0px;
				cursor				:	pointer;
			}
		</style>
	</head>
<body>

	<h1>Oplossing Delete</h1>

	<?php if ( $message ): ?>
		<div class="modal <?= $message[ "type" ] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>
	
	<?php if($brouwersEdit): ?>
	    <div>
	        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <ul>
                <?php foreach($brouwersEdit['data'][0] as $fieldname => $value): ?>
                <?php if ($fieldname != "brouwernr"): ?>
                    <li>
                        <label for="<?= $fieldname ?>"><?=$fieldname ?></label>
                        <input type="text" id="<?=$fieldname ?>"name="<?= $fieldname ?>" value="<?= $value?>">
                    </li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
            <input type="hidden" value="<?= $brouwersEdit['data'][0]['brouwersnr'] ?>" name="brouwernr">
            <input type="submit" name="edit" value="wijzigen">
	            
	        </form>
	    </div>
	
	<?php if ( $deleteConfirm ): ?>
		<div>
			Bent u zeker dat u deze record wilt verwijderen?
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

				<button type="submit" name="delete" value="<?= $deleteId ?>">
					Absoluut zeker!
				</button>

				<button type="submit">
					Ongedaan maken
				</button>

			</form>
		</div>
	<?php endif ?>
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<table>
			
			<thead>
				<tr>
					<th>#</th>
					<?php foreach ($brouwersFieldnames as $fieldname): ?>
						<th><?= $fieldname ?></th>
					<?php endforeach ?>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?> <?= ( $brouwer['brouwernr'] === $deleteId ) ? 'confirm-delete' : ''  ?>">
						
						<td><?= ++$key ?></td>

						<?php foreach ($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
							<button type="submit" name="confirm-delete" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="icon-delete.png" alt="Delete button">
							</button>
						</td>
						<td>
						    <button type="submit" name="confirm-edit" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
						        <img src="icon-edit.png" alt="Edit button">
						    </button>
						</td>
						
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>

</body>
</html>