<HTML>
<head>
	<div id="forredir"></div>
	<title>
		Sale Project
	</title>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"></link>
	<link type="text/css" rel="stylesheet" href="css/style.css"></link>
</head>
<body>
	<h1><img src="images/sale.png"></img></h1>
	<br>
		<div class="login">
			<h2>Please login</h2>
			<hr><br>
				<form name="login" onsubmit="return validateLogin()" method="POST" action="index.php?action=login">
					<div class="error" id="login-err"></div>
					
					<div class="errormessage" id="inputunamelog"></div>
					<label>Email or Username</label>
					<input class="form-control" type="text" id="username" name="username"></input><br><br>
					
					<div class="errormessage" id="inputpasslog"></div>
					<label>Password</label>
					<input class="form-control" type="password" name="password" id="password"></input><br><br>
					
					<input class= "btn" type="submit" value="LOGIN">
				</form>
				<br>
				<h4>Don't have an account yet? Register <a href="register.php">here</a></h4>
		</div>
		
	<script type="text/javascript" src="js/validation.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
</body>
</HTML>
