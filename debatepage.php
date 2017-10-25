<!-- 
	* "debatepage.php" is the page on which is the user lands after he/she has successfully logged in. This page displays a list of debate preparation files which the user has created. The user can then access or edit these files by clicking on them (that is, on each individual div). The user is then directed to "textpage.php" which takes the user to the appropriate FilePage/TextPage.
		
	* Also, The user will also be able to add new topics by entering data into a form at the bottom of the page. When the form is submitted, the user is taken to "debateAdd.php" which again takes the user to the appropriate file page. The reason why we have two different ways of going to the file page is because of the different mechanisms we employ to go the file page. 
		
	* Clicking on a div merely takes us to an existing file page, while submitting the form creates a new file and then goes to the file page.
	-->

<?php
	$servername="localhost";
	$user="root";
	$pass="";
	$dbname="DBSE";
	
	$q = $_REQUEST["q"];
?>

<!DOCTYPE html>
	<head>
		<title>Debate Web App - Debate Page</title>
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
				width: 60%;
				margin: 1.5% 18.5% .5% 17.5%;
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
			</style>
		</head>
		
		<body>
			
			<div class="navbar">
			
				<p id="navbar-p">Debate Preparation Web App</p>
				<p id="navbar-p">Hey, <?php echo $q; ?>!</p>
			
			</div>
			
			<div id="debate-topics-body">
				
				<?php
					//We generate a list of the user's debate preparation files
					try{
					    $conn=new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
					    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						
						$sql_stmt="SELECT* FROM TOPICS WHERE INSTR(TOPIC_USERS,'$q')>0";
	
			  		  	$stmt = $conn->query($sql_stmt);
			   		 	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
							foreach($results as $row){
									echo "<div class='debate-topic' onclick='linkToPage(".$row['TOPICNO'].")'>
											<p class='debate-topic-title''>".$row['TOPIC_TITLE']."</p>
										</div>";
							}
						} catch(PDOException $e) {
							echo $e->getMessage()."<br>";
					}
				?>
			</div>
			
			<!-- Other than accesing the name of the new file on the FilePage, we would also require the username of the current user. This is why we have a little PHP in the form tag below. -->
			<form id="newTopicForm" action=<?php echo "'debateAdd.php?q=$q'"; ?> method="post">
				<input type="text" name="newTopicName" placeholder="Add New Debate Topic" class="loginform-input">
				<button type="submit" class="loginform-submit">ADD</button>
			</form>
			
		</body>
		<script>
			//We use JavaScript to redirect the user to the appropriate FilePage when he/she clicks on a div. So, to go to the file page, we require both the TOPICNO of the file in the SQL Table and the username of the current user.
			function linkToPage(num){
				var user=<?php echo "'$q'"; ?>;
				window.location.href='/Navneet Project/textpage.php?q=&u=&v=&num='+num+'&user='+user+'';
			}
		</script>
		
</html>
