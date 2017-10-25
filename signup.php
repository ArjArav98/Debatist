<!DOCTYPE html>
	<!-- 
	* "signup.php" is the Signup page which the user is directed to when he/she clicks the 'SIGNUP' button in the login form on the HomePage. The user enters his/her username and password. Once the data has been successfully entered into the SQL database, the user is then redirected to the HomePage (homepage.html).
		-->
	<head>
		<title>Debate Web App - Signup Page</title>
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
			}
			
			#login-signup{
				width: 100%;
				margin: 22% 0 0 0;
			}
			.form-input{
				width: 15%;
				margin: .5% 41% .5% 40.5%;
				font-family: 'Saira SemiCondensed', sans-serif;
				font-size: 120%;
				padding: .5% 1% .5% 1%;
				border: none;
				border: 1px solid #00C69D;
				background-color: #000000;
				color: #00C69D;
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
			
			</div>
			
			<div id="login-body">
				<div id="login-signup">
					<form id="login-signup-form" action="signup.php" method="post">
						<input type="text" id="username-login" class="form-input" name="username-loginform" placeholder="USERNAME">
						<input type="password" id="password-login" class="form-input" name="password-loginform" placeholder="PASSWORD">
						<button type="submit" class="loginform-submit">SIGNUP</button>
					</form>
				</div>
			</div>
			
		</body>
		<?php 
			$servername="localhost";
			$user="root";
			$pass="";
			$dbname="DBSE";

			$username=$_POST['username-loginform'];
			$password=$_POST['password-loginform'];
			
			try{
			    $conn=new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
			    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	
				$sql_stmt="INSERT INTO USERS VALUES (?,?)";
				$sql=$conn->prepare($sql_stmt);
				$sql->bindParam(1, $username);
				$sql->bindParam(2, $password);

				$sql->execute();
				
				echo "<script>window.location.href='/Navneet Project/homepage.html';</script>";
			} catch (PDOException $e){
				echo $e->getMessage()."<br>";
			}
		?>
		
</html>
