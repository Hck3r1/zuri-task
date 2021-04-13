<?php session_start();


$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$_SESSION['email'] = $email;


if($errorCount > 0){
    $_SESSION["error"] = "You have " . $errorCount . " errors in your form";
    header("Location: ../password.php");
}else{
    
    $allUsers = scandir("../db/");
    $countAll = count($allUsers);

    for ($counter = 0; $counter < $countAll ; $counter++) { 
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            $userString = file_get_contents("../db/".$currentUser); 
            $userObject = json_decode($userString);
            $passworduser = $userObject->username;
            $passwordDB = $userObject->password;
            $passwordMail = $userObject->email;
            $subject = "Password Reset Link";
            $message = "Your Password Reset Link have been initaiated, ignore if it was'nt sent by you, otherwise Visit: localhost/myspace/Menez/zuri/cms/reset.php";
            $headers = "From: no-reply@cms.ng" . "\r\n" . "CC: menez@cms.ng";

          // $send = mail($email,$subject,$message,$headers);

           if($email == $passwordMail){            
    $_SESSION["message"] = "Reset Link have been sent to your email: ". $passworduser;
    header("Location:../reset.php");
           }else{
            
    $_SESSION["error"] = "Somthing went wrong, reset link wasn't sent to email: ". $email;
    header("Location:../forgot.php");
           }

           die();

        }
    }
    $_SESSION["error"] = "Email not registered ERR:". $email;
    header("Location:../forgot.php");

}

?>