<?php 
    session_start();
    if (isset($_POST['submit'])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=email', 'root', '' );
            if (!checkEmail()) {         
                $_SESSION['message'] = 'Email adres is niet geldig.';
                header('location: contact-form.php'); 
            }
            if (trim($_POST['boodschap']) == "") {
                $_SESSION['message'] = 'Geen boodschap ingevuld.';
                header('location: contact-form.php');
            }
            $query = 'INSERT INTO tblmails (email, boodschap)
            VALUES (:email, :boodschap)';
            $preparedStatement = $db->prepare( $query );
            $preparedStatement->bindValue(':email', $_POST['email']);
            $preparedStatement->bindValue(':boodschap', $_POST['boodschap']);
            $check = $preparedStatement->execute();
            if ($check) {
                 if (isset($_POST['check'])) {
                    echo 'mail sent to self';        
                 }
            } else {
                echo 'Failed';
            }
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['boodschap'] = $_POST['boodschap'];
        } catch ( PDOException $e ) {
            header( 'location: ../registratie-form.php');
        }
    }
    function checkEmail() {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
?>