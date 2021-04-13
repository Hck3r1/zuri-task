<?php session_start();


$errorCount = 0;

$username = $_POST['username'] != "" ? $_POST['username'] : $errorCount++;


if($errorCount > 0){
    $_SESSION["error"] = "You have " . $errorCount . " errors in your form";
    header("Location: ../password.php");
}else{
    $allUsers = scandir("../db/");
    $countAll = count($allUsers);

    for ($counter = 0; $counter < $countAll ; $counter++) { 
        $currentUser = $allUsers[$counter];
        
        if($currentUser == $username . ".json"){
            print_r($currentUser);
            die();
            
            $userString = file_get_contents("../db/".$currentUser); 
        
            $userObject = json_decode($userString);
            $passwordDB = $userObject->password;

            


    }
}

 }
    


?>