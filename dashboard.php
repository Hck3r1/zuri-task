<?php
// if(!isset($_SESSION['loggedin'])){
//     header("Location:../login.php");
// }
include_once("lib/header.php");
?>
        <p>Dashboard</p> <br> <hr>

    LoggedIn User ID: <?php echo $_SESSION['loggedin'];?>


    <br>

<?php 
include_once("lib/footer.php")
?>