<html>
<head>
	<title>
		Sale Project
	</title>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"></link>
	<link type="text/css" rel="stylesheet" href="css/style.css"></link>
</head>
<body>
	<h1><img src="images/sale.png"></img></h1><br>
	<div id="userdata" class="user-logged"></div>
	<ul id="menu">
	</ul> 
	<br>
	<div class="title">
		<h2>Please confirm your purchase</h2>
		<hr>
	</div><br>
	<div class="catalog-list">
		<?php 
			require('showConfirm.php');
		?>
	</div>
	<script type="text/javascript" src="js/catalog.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
</body>
</HTML>