<?php session_start(); 

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;


if($errorCount > 0){
    $_SESSION["error"] = "You have " . $errorCount . " errors in your form";
    header("Location: ../login.php");
}else{
    $allUsers = scandir("../db/");
        $countAll = count($allUsers);

        for ($counter = 0; $counter < $countAll ; $counter++) { 
            $currentUser = $allUsers[$counter];
    
            if($currentUser == $email . ".json"){
                $userString = file_get_contents("../db/".$currentUser); 
             $userObject = json_decode($userString) ;
             $passwordDB = $userObject->password;
             

             $passwordFromUser = password_verify($password, $passwordDB);

             if($passwordDB == $passwordFromUser){
                 $_SESSION['loggedin'] = $userObject->id;

                    header("Location: ../dashboard.php");
                  die();
             }

           
            }
        }
        $_SESSION["error"] = "Invalid Email or Password";
        header("Location:../login.php");
               die();
}

?>