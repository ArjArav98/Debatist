<!--
* "debateAdd.php" is the PHP file which the user is directed to when he/she adds a new Debate Topic on the DebatePage (debatepage.html). The title entered in the form there is accessed here and is inserted into the SQL database. The PHP then gets the TOPICNO number and the username of the current user and redirects the user to the FilePage (textpage.php).
	-->

<?php
$servername="localhost";
$user="root";
$pass="";
$dbname="DBSE";

$q = $_REQUEST["q"];

try{
	$conn=new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$topicname=$_POST['newTopicName'];

	$sql_stmt="INSERT INTO TOPICS VALUES (TOPICNO, ?,'','')";
	$sql=$conn->prepare($sql_stmt);
	$sql->bindParam(1, $topicname);
	$sql->execute();

	$sql_stmt="SELECT MAX(TOPICNO) FROM TOPICS";
	
	$stmt = $conn->query($sql_stmt);
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach($results as $row){
		$num=$row['MAX(TOPICNO)'];
	}
	echo "<script>window.location.href='/Navneet Project/textpage.php?q=$topicname&u=&v=&num=$num&user=$q';</script>";
	
} catch (PDOException $e){
	echo $e->getMessage()."<br>";
}
?>
