<?php 
if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
    header("Location: dashboard.php");
}
// print_r($_SESSION);
include_once("lib/header.php");

?>
   <p><b>PLEASE REGISTER</b></p>
   <p>Please Fill All Field</p> <hr>

<form action="lib/processregister.php" method="post">
 <p>
<?php 
if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
    echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";

    session_destroy();
}
?>
</p>
<p>
<label> Fullname:</label> <input value="<?php if(isset($_SESSION['fullname'])){ echo $_SESSION['fullname'];}?>" type="text" name="fullname" placeholder="Fullname" >
</p>
<p>
<label> Email:</label> <input value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}?>"  type="email" name="email" placeholder="Email">
</p>
<p>
<label> Username:</label> <input  type="text" name="username" placeholder="Username" >
</p>
<p>
<label> Date Of Birth:</label> <input type="date" name="dob" placeholder="Date Of Birth" >
</p>
<p>
<label> Gender:</label> 
<select name="gender">
<option>--Select Gender--</option>
<option>Male</option>
<option>Female</option>
</select>
</p>
<p>
<label> Password:</label> <input type="password" name="password" placeholder="Password" >
</p>

<p>
<button type="submit">Submit</button></p>
</form>

<br>

<?php 
include_once("lib/footer.php")
?>