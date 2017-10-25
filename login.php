<?php
/*
* The "login.php" file is the file to which the form from the login page sends the data entered by the user. The PHP accesses the SQL database in the server and validates the information. If the login details are valid, then the user is directed to his/her "Debate Home Page" (debatepage.php). If not, then an alert is shown and the user is redirected back to the login page.
*/

$servername="localhost";
$user="root";
$pass="";
$dbname="DBSE";

$username=$_POST['username-loginform'];
$password=$_POST['password-loginform'];

try{
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	$sql_stmt="SELECT* FROM USERS WHERE USERNAME='$username' and PASSWORD='$password'";
	$sql=$conn->query($sql_stmt);
	$number_of_rows = $sql->rowCount();
	
	if($number_of_rows==1){
		echo "<script>alert('Login Successful!');</script>";
		echo "<script>window.location.href='/Navneet Project/debatepage.php?q=$username';</script>";
	}
	else{
		echo "<script>alert('Invalid username and password! :/');</script>";
		echo "<script>window.location.href='/Navneet Project/homepage.html';</script>";
	}
} catch (PDOException $e){
	echo $e->getMessage()."<br>";
}
?>
