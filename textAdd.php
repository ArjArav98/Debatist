<!--
* "textAdd.php" is the file to which the user is directed to when he/she presses the SAVE button in the form in the FilePage/TextPage (textpage.php). The information from the form is sent to this file and updates the necessary row in the TOPICS table in the SQL database. The user is then redirected to the FilePage/TextPage.
	-->

<?php
$servername="localhost";
$user="root";
$pass="";
$dbname="NAVNEET";


$q = $_REQUEST["q"];
$userCurrent = $_REQUEST["user"];

try{
	$conn=new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$topicname=$_POST['debateTitle'];
	$users=$_POST['debateUsers'];
	$text=$_POST['debateText'];

	$sql_stmt="UPDATE TOPICS SET TOPIC_TITLE=?, TOPIC_USERS=?, TOPIC_TEXT=? WHERE TOPICNO=?";
	
	$sql=$conn->prepare($sql_stmt);
	$sql->bindParam(1, $topicname);
	$sql->bindParam(2, $users);
	$sql->bindParam(3, $text);
	$sql->bindParam(4, $q);
	$sql->execute();
	
	echo "<script>window.location.href='/Navneet Project/debatepage.php?q=$userCurrent';</script>";
} catch (PDOException $e){
	echo $e->getMessage()."<br>";
}
?>