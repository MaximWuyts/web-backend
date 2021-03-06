<?php
    session_start();
    $registrationFormName = "registratie-from.php";
    if(isset($_POST['generate-password'])){
        $generatePassword = generatePassword(16, true, true);
        $_SESSION['registration']['email'] = $_POST['email'];
        $_SESSION['registration']['password'] = $generatePassword;
        header('location: ' . $registrationFormName);
    }
    elseif(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $_SESSION['registration']['email'] = $email;
        $_SESSION['registration']['password'] = $password;
        $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if(!$isEmail){
            $emailError = new Message("error", "Dit is geen geldig e-mail adres.");
            header('location: ' . $registrationFormName);
        }
        elseif($password ==""){
            new Message("error", "Dit is geen geldig paswoord.");
            header('location: ' . $registrationFormName);
        }
        else{
            $connection = new PDO('mysql:host=localhost;dbname=oefSecurity', 'root', '' );
            $db = new Database($connection);
            $userData = $db->query( 'SELECT * 
                                        FROM users 
                                        WHERE email = :email', 
                                    array(':email' => $email ) );
            if(isset($userData['data'][0])){
                $userExistsError = new Message("error", "De gebruiker met het e-mailadres " . $email . "komt reeds voor in onze database." );
                header('location: ' . $registrationFormName);
            }
            else{
                $newUser = User::CreateNewUser($connection, $email, $password);
                if($newUser){
                    $registrationFormName = new Message("success", "Welkom, u bent vanaf nu geregistreerd in onze app.");
                    header('location: registratie-dashboard.php');
                }
            }
        }
    }
    function generatePassword($length,
                                $numeric= TRUE,
                                $alphanumeric = FALSE,
                                $alphanumericUppercase = FALSE,
                                $specialChars = FALSE){
    
        $passwordDump = '';
        
        $passwordCharacters = array(); 

        if ($numeric) {
            $passwordCharacters['numeric'] = array(0,1,2,3,4,5,6,7,8,9);
        }	
        
        if ($alphanumeric) {
            $passwordCharacters['alphanumericString'] = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        }	
        
        if ($alphanumericUppercase) {
            $passwordCharacters['alphanumericUppercaseString'] = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        }	
        
        if ($specialChars) {
            $passwordCharacters['specialChars'] = array('+','-','*','/','$','%','@','#','_');
        }
        $characterCount = 0;
        while($characterCount < $length){
            $arrayCount = 0;
            foreach ($passwordCharacters as $value) {
                
                    if ($characterCount < $length) { 
                    
                        $randomCharacter = rand(0,(count($value)-1)); 
                        
                        $passwordDump .= $value[$randomCharacter];
                        
                        $characterCount++; 
                    }
                    
                    $arrayCount++; 
                }
            }
            
            $passwordDump = str_shuffle($passwordDump); 
            
            return $passwordDump; 
        }
    
    
?>