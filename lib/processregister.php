<?php session_start();

$errorCount = 0;

$fullname = $_POST['fullname'] != "" ? $_POST['fullname'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$username = $_POST['username'] != "" ? $_POST['username'] : $errorCount++;
$dob = $_POST['dob'] != "" ? $_POST['dob'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['fullname'] = $fullname;
$_SESSION['email'] = $email;
$_SESSION['username'] = $username;
$_SESSION['dob'] = $dob;
$_SESSION['gender'] = $gender;

if($errorCount > 0){
    $_SESSION["error"] = "You have " . $errorCount . " errors in your form";
    header("Location: ../register.php");
}else{

        $allUsers = scandir("../db/");
        $countAll = count($allUsers);
       
        $userId = ($countAll-1);

    $userArray = [
        'id' => $userId,
         'fullname' => $fullname,
         'email' => $email,
         'username' => $username,
         'dob' => $dob,
         'gender' => $gender,
         'password' => password_hash($password,PASSWORD_DEFAULT), 
    ];
   
    for ($counter = 0; $counter < $countAll ; $counter++) { 
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            $_SESSION["error"] = "Registration Failed , User Already exist";
    header("Location:../register.php");
           die();
        }
    }

    file_put_contents("../db/". $email .  ".json", json_encode($userArray));
    $_SESSION["message"] = "Registration Successful , Login Please" ;
    header("Location:../login.php");
}


?>