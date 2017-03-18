<?php
	include('connect.class.php');
	if(!class_exists('users')) {
		class users {
			public static function login ($credential, $password) {
				session_start();
				$password = base64_encode($password);
				if (!filter_var($credential, FILTER_VALIDATE_EMAIL) === false)
					$query = "SELECT * FROM users WHERE email='$credential' and password='$password'";
				else $query = "SELECT * FROM users WHERE username='$credential' and password='$password'";
				$result = mysqli_query(Connect::connectdb(), $query) or die(mysqli_error(Connect::connectdb()));
				$count = mysqli_num_rows($result);
				$result = mysqli_fetch_assoc($result);
				if ($count == 1){
					$_SESSION['login'] = true;
					$_SESSION['username'] = $result['username'];
					$_SESSION['name'] = $result['name'];
					return true;
				}else{
					$fmsg = "Username atau kata sandi salah.";
					$_SESSION['error'] = $fmsg;
					return false;
				}
			}
		
			public function register () {
				session_start();
				$username = $_POST['username'];
				$password = $_POST['password'];
				$password = base64_encode($password);
				$email = $_POST['email'];
				$name = $_POST['name'];
				$address = $_POST['address'];
				$postal = $_POST['postal'];
				$phone = $_POST['phone'];
				$query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
				$result = mysqli_query(Connect::connectdb(), $query);
				$count = mysqli_num_rows($result);
				if ($count == 1) {
					$msg = "Sudah ada username atau email yang sama";
					$_SESSION['error'] = $msg;
					return false;
				}
				else {
					$query = "INSERT INTO users (name, username, email, password, 
					address, postal, phone, likes) VALUES ('$name', '$username', '$email', '$password', 
					'$address', '$postal', '$phone', ';')";
					$result = mysqli_query(Connect::connectdb(), $query);
					session_start();
					$_SESSION['login'] = true;
					$_SESSION['username'] = $username;
					return true;
				}
			}
		
			public static function logout () {
				session_start();
				session_destroy();
				header('Location: login.php');
			}
		
			public static function logged () {
				if(isset($_SESSION['username'])) {
					return true;
				} else {
					false;
				}
			}
		
			public static function getInfoUser () {
				if (isset($_SESSION['username'])) {
					$username = $_SESSION['username'];	
					$query = "SELECT id, name, email, address, postal, phone FROM users WHERE username='$username' LIMIT 1";
					$result = mysqli_query(Connect::connectdb(), $query);
					$row = mysqli_fetch_assoc($result);
					return $row;
				}
			}
		}
	}