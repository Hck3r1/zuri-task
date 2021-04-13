<?php
include_once("lib/header.php");
?>
   

<h2>Password Reset</h2>
<br>
<form action="lib/processforgot.php" method="post">

<p>
<?php 
if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
    echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";

    session_destroy();
}
?>
</p>
</p>
<label> Email:</label> <input value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}?>"  type="email" name="email" placeholder="Email">
</p>
<br>
<p>
<button type="submit">Submit</button></p>
</form>


<?php 
include_once("lib/footer.php")
?>