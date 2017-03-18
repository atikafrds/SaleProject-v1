<?php
	require('connect.php');
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = base64_encode($password);
		$email = $_POST['email'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$postal = $_POST['postal'];
		$phone = $_POST['phone'];
		$query = "INSERT INTO users (name, username, email, password, 
		address, postal, phone) VALUES ('$name', '$username', '$email', '$password', 
		'$address', '$postal', '$phone')";
		$result = mysqli_query($connection, $query);
		if ($result)
			$msg = "User Created Successfully";
		else $msg = "user registration failed";
	}
?>