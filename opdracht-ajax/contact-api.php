<?php 
    session_start();

    if (isset($_POST['email'])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=email', 'root', '' );
            if (!$_POST['email'] || trim($_POST['email']) == "") {       
                $ajax['message'] = 'Geen emailadres ingevuld.';
                $ajax['type'] = 'error';
                echo json_encode($ajax);
                return;
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $ajax['message'] = 'Geen geldig emailadres ingevuld.';
                $ajax['type'] = 'error';
                echo json_encode($ajax);
                return;
            }
            if (trim($_POST['boodschap']) == "") {
                $ajax['message'] = 'Geen boodschap ingevuld.';
                $ajax['type'] = 'error';
                echo json_encode($ajax);
                return;
            }
            $query = 'INSERT INTO tblmails (email, boodschap)
            VALUES (:email, :boodschap)';
            $preparedStatement = $db->prepare( $query );
            $preparedStatement->bindValue(':email', $_POST['email']);
            $preparedStatement->bindValue(':boodschap', $_POST['boodschap']);
            $check = $preparedStatement->execute();
            if ($check) {
                $ajax['type'] = 'success';
                $ajax['message'] = 'Bedankt! Uw bericht is verzonden.';   
                if (isset($_POST['check'])) {
                
                $ajax['message'] = 'Bedankt! Uw bericht is naar ons en uzelf verzonden.';   
                }
                echo json_encode($ajax);
            } else {
                $ajax['message'] = 'Er is iets misgegaan, probeer later opnieuw.';
                $ajax['type'] = 'error';
                echo json_encode($ajax);
            }
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['boodschap'] = $_POST['boodschap'];
        } catch ( PDOException $e ) {
            $$ajax['message'] = 'Er is iets misgegaan, probeer later opnieuw.';
            $ajax['type'] = 'error';
            echo json_encode($ajax);
        }
    }
?>