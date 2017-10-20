<!-- 
* "textpage.php" is the file to which the user is directed to from both the "debateAdd.php" and the "debatepage.php" files. It is the page on which the information of each individual file is displayed for the user to see and edit. This page consists of a form. This form, in turn, consists of 2 Text Areas and 1 input tag.

* The Text Areas take in the title and the actual text fo the file while the input tag takes in the list of users who can access this file. The SAVE button will direct the user to the "textAdd.php" file. 

* The PHP file gets the title, users list and text of this file from the SQL Table and displays it in the text areas and input tag.
	-->

<?php
	$servername="localhost";
	$user="root";
	$pass="";
	$dbname="NAVNEET";
	
	$num = $_REQUEST["num"];
	$userCurrent = $_REQUEST["user"];

	$topicname="";
	$users="";
	$text="";
	
	try{
		$conn=new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql_stmt="SELECT TOPIC_TITLE, TOPIC_USERS, TOPIC_TEXT FROM TOPICS WHERE TOPICNO=$num";

		$stmt = $conn->query($sql_stmt);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($results as $row){
			$topicname=$row['TOPIC_TITLE'];
			$users=$row['TOPIC_USERS'];
			$text=$row['TOPIC_TEXT'];
		}
	} catch (PDOException $e){
		echo $e->getMessage()."<br>";
	}
?>

<!DOCTYPE html>
	<head>
		<title>Debate Web App - Text Page</title>
		<link href="https://fonts.googleapis.com/css?family=Bangers|Saira+Semi+Condensed:600" rel="stylesheet">    
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
			body, html, p, form, input{
				margin: 0;
				padding: 0;
			}
			body, html{
				background-color: #000000;
			}
			html{
				overflow-y: scroll;
			}
			.navbar{
				height: 52px;
				width: 100%;
				position: fixed;
				background-color: #232323;
				font-family: 'Saira SemiCondensed', sans-serif;
				top: 0;
				z-index: 10;
			}
			
			#navbar-p{
				color: #00C69D;
				width: 99.6%;
				text-align: center;
				font-size: 150%;
				padding-top: .5%;
				background-color: #232323;
				padding-bottom: .15%;
			}
			
			#debate-topics-body{
				margin-top: 15%;
				display: block;
			}
			.debate-topic{
				width: 83%;
				margin: 2% 5%;
				border: 1px solid #00C69D;
				padding: 1% 3%;
				display: block;
				cursor: pointer;
			}
			.debate-topic-title{
				font-size: 140%;
				color: #00C69D;
				font-family: "Saira Semi Condensed", sans-serif;
			}
			
			.loginform-input{
				width: 80%;
				margin: .5% 8.5% .5% 7.5%;
				font-family: 'Saira SemiCondensed', sans-serif;
				font-size: 120%;
				padding: .5% 1% .5% 1%;
				border: none;
				border: 1px solid #00C69D;
				background-color: #000000;
				color: #00C69D;
				resize: none;
			}
			.loginform-submit{
				width: 17.25%;
				margin: .5% 41% .5% 40.5%;
				border: none;
				border: 1px solid #00C69D;
				color: #00C69D;
				background-color: black;
				font-family: 'Saira SemiCondensed', sans-serif;
				font-size: 125%;
				padding: .5% 0 .5% 0;
				cursor: pointer;
				transition: all 0.15s;
			}
			.loginform-submit:hover{
				background-color: #00C69D;
				color: black;
			}
			
			#debate-text-form{
				margin-top: 10%;
			}
			
			#title-input{
				font-size: 160%;
				height: 50px;
			}
			#text-input{
				height: 370px;
				margin-bottom: 2%;
			}
			#users-input{
				font-size: 120%;
			}
			</style>
		</head>
		
		<body>
			
			<div class="navbar">
			
				<p id="navbar-p">Debate Preparation Web App</p>
				<p id="navbar-p"><?php echo $topicname; ?></p>
			
			</div>
			
			<form id="debate-text-form" action=<?php echo "'textAdd.php?q=$num&user=$userCurrent'";?> method="post">
				<textarea class="loginform-input" id="title-input" name="debateTitle" placeholder="Title Goes Here..."><?php echo $topicname; ?></textarea>
				<input type="text" class="loginform-input" id="users-input" name="debateUsers" placeholder="Users go here..." value=<?php echo "'$users'"; ?>>
				<textarea class="loginform-input" id="text-input" name="debateText" placeholder="Text Goes Here..."><?php echo $text; ?></textarea>
				<button type="submit" class="loginform-submit">SAVE</button>
			</form>
			
		</body>
		<script>
		</script>
		
</html>