<?php
session_start();
$servername = "localhost" ;
$username = "root";
$password = "";
$dbname = "sunil";

//require_once 'dbconfig.php';
 
    $usrid = $_POST['user'];
    $passwrd = $_POST['pass'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    $stmt = $conn->prepare("select UserId, Password from userinfo where UserId = :urid  AND Password = :pswrd" );
    $stmt->bindParam(':urid',$usrid);
    $stmt->bindParam(':pswrd',$passwrd);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if(count($results) == 2 ){
        //var_dump($results);exit;
	$_SESSION['username'] = $results['UserId'];
	header('location:Homepage.php');
	exit;
	} 
        else{
	$errMsg .= 'Username and Password are not found<br>';
	}
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
    
   /* function usernameCheck() {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $stmt = $con->prepare("SELECT Username FROM userinfo WHERE UserId = $usrid AND Password = $passwrd ");
    $stmt->bindParam(':name', $username);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        echo "exists!";
    } else {
        echo "non existant";
    }
}*/
    
    ?>