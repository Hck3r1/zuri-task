<?php include_once("lib/header.php");

// if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
//     header("Location: dashboard.php");
// }

?>
   <P>Login Here</P> <br> <hr>

<p>
<?php
if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
    echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";

    session_destroy();
}
?>
<h2>Login</h2>
<form action="lib/processlogin.php" method="post">
<p>
<?php 
if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
    echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";

    session_destroy();
}
?>
</p>
<label> Email:</label> <input value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}?>"  type="email" name="email" placeholder="Email">
</p>

<p>
<label> Password:</label> <input type="password" name="password" placeholder="Password" >
</p>
<p>
<button type="submit">Login</button></p>
</form>



</p>


<?php 
include_once("lib/footer.php")
?>