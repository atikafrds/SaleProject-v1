<?php 
	if(!class_exists('Connect')) {
		class Connect {
			public static function connectdb () {
				$connection = mysqli_connect('localhost', 'tbd', 'qwertyuiop');
				if (!$connection){
					die("Database Connection Failed" . mysqli_error($connection));
				}
				$select_db = mysqli_select_db($connection, 'tbddb');
				if (!$select_db){
					die("Database Selection Failed" . mysqli_error($connection));
				}
				return $connection;
			}
		}
	}
?>