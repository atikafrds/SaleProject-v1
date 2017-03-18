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
		<div class="login">
			<h2>Please register</h2>
			<hr><br><div id="login-err"></div>
			<form name="register" onsubmit="return validateForm()" method="POST" action="index.php?action=register">
				<div class="error" id="register-err"></div>
				
				<div class="errormessage" id="inputnamelog"></div>
				<label>Full Name</label>
				<input type="text" name="name" id="name" class="form-control" value=""><br><br>
				
				<div class="errormessage" id="inputunamelog"></div>
				<label>Username</label>
				<input type="text" name="username" id="username1" class="form-control"value=""><br><br>
				
				<div class="errormessage" id="inputemaillog"></div>
				<label>Email</label>
				<input type="text" name="email" id="email" class="form-control" value=""><br><br>
				
				<div class="errormessage" id="inputpass"></div>
				<label>Password</label>
				<input type="password" name="password" id="password1" class="form-control" value=""><br><br>
				
				<div class="errormessage" id="inputpasslog"></div>
				<label>Confirm Password</label>
				<input type="password" name="confirm-password" id="confirm-password" class="form-control" value=""><br><br>
				
				<div class="errormessage" id="inputaddresslog"></div>
				<label>Full Address</label>
				<input type="text" name="address" id="address" class="form-control" value=""><br><br>
				
				<div class="errormessage" id="inputpostlog"></div>
				<label>Postal Code</label>
				<input type="text" name="postal" id="postal" class="form-control"><br><br>
				
				<div class="errormessage" id="inputphonelog"></div>
				<label>Phone Number</label>
				<input type="text" name="phone" id="phone" class="form-control"><br><br>
				
				<input class= "btn" type="submit" value="REGISTER">
			</form>
			<br>
			<h4>Already registered? Login <a href="login.php">here</a></h4>  
		</div>
		
	<script type="text/javascript" src="js/validation.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
</body>
</HTML>
