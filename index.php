<?php
	include_once('class/login.class.php');
	include_once('class/catalog.class.php');
	$user = new users();
	$action = $_GET['action'];
	if ($action == 'login') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$status = $user::login($username, $password);
		if ($status) {
			header('Location: catalog.php?id_active='.users::getInfoUser()['id'].'');
		}
		else header('location: login.php');
	}
	else if ($action == 'logout') {
		$user::logout();
	}
	else if ($action == 'search') {
		Catalog::showCatalog($_GET('name'), $_GET('filter'));
	}
	
	else if ($action == 'register') {
		$status = $user->register();
		if (!$status) {
			header('Location: register.php');
		}
		else {
			header('Location: catalog.php?id_active='.users::getInfoUser()['id'].'');
		}
	}
	
	else if ($action == 'unlike') {
		Catalog::unlike($_GET['product_id']);
	}
	
	else if ($action=='like') {
		Catalog::like($_GET['product_id']);
	}
	
	else if ($action == 'getuserdata') {
		session_start();
		if (users::logged()) {
			echo '<span class="user-logged">Hi, '.users::getInfoUser()['name'].'!<br>
					<a class="user" href="index.php?action=logout"><b>logout</b></a></span>';
		}
		else echo '<span class="user"><a href="login.php" style="color:black;">Login or Register</a></span>';
	}
	
	else if ($action == 'menu') {
		require('menu.php');
	}
	
	else if ($action == 'showcatalog') {
		require('showCatalog.php');
	}
	
	else if ($action == 'redirornot') {
		session_start();
		if (users::logged()) {
			echo 'true';
		}
		else echo 'false';
	}
	
	else if ($action == 'login-err') {
		session_start();
		if(isset($_SESSION['error'])){
			echo '<span class="error"><strong>'.$_SESSION['error'].'</strong></span>';
			session_destroy();
		}
	}
	
	else if ($action == 'register-err') {
		session_start();
		if(isset($_SESSION['error'])){
			echo '<span class="error"><strong>'.$_SESSION['error'].'</strong></span>';
			session_destroy();
		}
	}
	
	else if ($action == 'buy') {
		session_start();
		if (users::logged()) {
			header('Location: confirm.php?id_product='.$_GET['id_product'].'&user_active='.$_GET['user_active']);
		}
		else {
			header('Location: login.php');
		}
	}
	
	else if ($action == 'confirm') {
		$res = Catalog::purchasing();
		header('Location: catalog.php');
	}

	else if ($action == 'showsales') {
		require('showSales.php');
	}

	else if ($action == 'showpurchases') {
		require('showPurchases.php');
	}
	
	else if($action == 'showproduct'){
		require('showProduct.php');
	}
	
	else if($action == 'addProduct'){
		$res = Catalog::addProduct();
		header('Location: product.php');
	}
	
	else if($action == 'edit'){
		header('Location: editProduct.php?id_product='.$_GET['id_product']);
	}
	
	else if ($action=='confirmEdit')	{
		$res = Catalog::confirmEdit();
		header('Location: product.php?id_active='.users::getInfoUser()['id']);
	}
	
	else if($action == 'delete'){
		$res = Catalog::delete();
	}
?>