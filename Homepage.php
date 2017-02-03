<?php
session_start();
// var_dump($_SESSION);exit;
if(!isset($_SESSION['username']) || $_SESSION['username']==""){
   header("Location:login3.php");
   exit;
   
}
?>
<!DOCTYPE HTML>
<html>
    <body>
        
        <?php
echo " <h2> welcome to home page ! </h2> " ;
//echo $_session['username'];
?>
<form method ="POST" action="logout.php">
    <input id="buttn" type="submit" name="submt" value="Log-Out">
</form>
    </body>
</html>